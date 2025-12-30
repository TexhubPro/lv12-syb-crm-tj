if (!window.__texhubAccordion) {
    window.__texhubAccordion = true;

    const setPanelHeight = (panel, height) => {
        panel.style.height = height;
    };

    const openItem = (item) => {
        const panel = item.querySelector('[data-accordion-panel]');
        const trigger = item.querySelector('[data-accordion-trigger]');
        if (!panel || !trigger) return;

        item.dataset.state = 'open';
        trigger.setAttribute('aria-expanded', 'true');

        const targetHeight = panel.scrollHeight + 'px';
        setPanelHeight(panel, targetHeight);
        panel.addEventListener('transitionend', () => {
            if (item.dataset.state === 'open') {
                setPanelHeight(panel, 'auto');
            }
        }, { once: true });
    };

    const closeItem = (item) => {
        const panel = item.querySelector('[data-accordion-panel]');
        const trigger = item.querySelector('[data-accordion-trigger]');
        if (!panel || !trigger) return;

        item.dataset.state = 'closed';
        trigger.setAttribute('aria-expanded', 'false');

        if (panel.style.height === 'auto') {
            setPanelHeight(panel, panel.scrollHeight + 'px');
        }

        requestAnimationFrame(() => {
            setPanelHeight(panel, '0px');
        });
    };

    const initAccordions = () => {
        document.querySelectorAll('[data-accordion]').forEach((accordion) => {
            if (accordion.dataset.bound === 'true') return;
            accordion.dataset.bound = 'true';

            accordion.querySelectorAll('[data-accordion-item][data-state="open"]').forEach((item) => {
                const panel = item.querySelector('[data-accordion-panel]');
                if (panel) setPanelHeight(panel, panel.scrollHeight + 'px');
            });
        });
    };

    document.addEventListener('click', (event) => {
        const trigger = event.target.closest('[data-accordion-trigger]');
        if (!trigger) return;

        const accordion = trigger.closest('[data-accordion]');
        if (!accordion) return;

        const item = trigger.closest('[data-accordion-item]');
        if (!item) return;

        const isOpen = item.dataset.state === 'open';
        const multiple = accordion.dataset.multiple === 'true';

        if (!multiple) {
            accordion.querySelectorAll('[data-accordion-item][data-state="open"]').forEach((openItemEl) => {
                if (openItemEl !== item) closeItem(openItemEl);
            });
        }

        if (isOpen) {
            closeItem(item);
        } else {
            openItem(item);
        }
    });

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAccordions, { once: true });
    } else {
        initAccordions();
    }
}

if (!window.__texhubAlertClose) {
    window.__texhubAlertClose = true;
    document.addEventListener('click', (event) => {
        const closeBtn = event.target.closest('[data-alert-close]');
        if (!closeBtn) return;

        const alertEl = closeBtn.closest('[data-alert]');
        if (!alertEl) return;

        alertEl.style.display = 'none';
    });
}

if (!window.__texhubButtonRipple) {
    window.__texhubButtonRipple = true;

    const styleId = 'texhub-button-ripple-style';
    if (!document.getElementById(styleId)) {
        const style = document.createElement('style');
        style.id = styleId;
        style.textContent = `
                .texhub-ripple {
                    position: absolute;
                    border-radius: 9999px;
                    transform: scale(0);
                    background: currentColor;
                    opacity: 0.25;
                    animation: texhub-ripple 600ms ease-out;
                    pointer-events: none;
                }
                @keyframes texhub-ripple {
                    to { transform: scale(1); opacity: 0; }
                }
            `;
        document.head.appendChild(style);
    }

    document.addEventListener('click', (event) => {
        const button = event.target.closest('[data-ripple]');
        if (!button || button.hasAttribute('disabled') || button.getAttribute('aria-disabled') === 'true') return;

        const rect = button.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height) * 2;
        const ripple = document.createElement('span');
        ripple.className = 'texhub-ripple';
        ripple.style.width = `${size}px`;
        ripple.style.height = `${size}px`;
        ripple.style.left = `${event.clientX - rect.left - size / 2}px`;
        ripple.style.top = `${event.clientY - rect.top - size / 2}px`;

        button.appendChild(ripple);
        ripple.addEventListener('animationend', () => ripple.remove(), { once: true });
    });
}

if (!window.__texhubCheckboxIndeterminate) {
    window.__texhubCheckboxIndeterminate = true;
    const applyIndeterminate = () => {
        document.querySelectorAll('input[type="checkbox"][data-indeterminate="true"]').forEach((el) => {
            el.indeterminate = true;
        });
    };
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', applyIndeterminate, {
            once: true
        });
    } else {
        applyIndeterminate();
    }
}

if (!window.__texhubInputClear) {
    window.__texhubInputClear = true;
    document.addEventListener('click', (event) => {
        const btn = event.target.closest('[data-input-clear]');
        if (!btn) return;
        const root = btn.closest('[data-input-root]');
        if (!root) return;
        const input = root.querySelector('input');
        if (!input) return;
        input.value = '';
        input.dispatchEvent(new Event('input', {
            bubbles: true
        }));
        input.dispatchEvent(new Event('change', {
            bubbles: true
        }));
        input.focus();
    });
    document.addEventListener('input', (event) => {
        const input = event.target instanceof HTMLInputElement ? event.target : null;
        if (!input) return;
        const root = input.closest('[data-input-root]');
        const btn = root?.querySelector('[data-input-clear]');
        if (!btn) return;
        btn.classList.toggle('hidden', !input.value);
    });

    document.addEventListener('click', (event) => {
        const toggle = event.target.closest('[data-input-toggle]');
        if (!toggle) return;
        const root = toggle.closest('[data-input-root]');
        const input = root?.querySelector('input');
        if (!input) return;

        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        toggle.querySelector('[data-eye-on]')?.classList.toggle('hidden', !isPassword);
        toggle.querySelector('[data-eye-off]')?.classList.toggle('hidden', isPassword);
    });
}

if (!window.__texhubOtpInput) {
    window.__texhubOtpInput = true;

    const updateValue = (root) => {
        const inputs = Array.from(root.querySelectorAll('[data-otp-input]'));
        const hidden = root.querySelector('[data-otp-hidden]');
        const value = inputs.map((input) => input.value).join('');
        if (hidden) {
            hidden.value = value;
            hidden.dispatchEvent(new Event('input', {
                bubbles: true
            }));
            hidden.dispatchEvent(new Event('change', {
                bubbles: true
            }));
        }
        const display = root.querySelector('[data-otp-display]') || root.parentElement?.querySelector(
            '[data-otp-display]');
        if (display) display.textContent = value || '-';
    };

    document.addEventListener('input', (event) => {
        const input = event.target.closest('[data-otp-input]');
        if (!input) return;
        const root = input.closest('[data-otp-root]');
        const inputs = Array.from(root.querySelectorAll('[data-otp-input]'));
        const index = inputs.indexOf(input);
        if (input.value.length > 1) {
            input.value = input.value.slice(-1);
        }
        if (input.value && index < inputs.length - 1) {
            inputs[index + 1].focus();
        }
        updateValue(root);
    });

    document.addEventListener('keydown', (event) => {
        const input = event.target.closest('[data-otp-input]');
        if (!input) return;
        const root = input.closest('[data-otp-root]');
        const inputs = Array.from(root.querySelectorAll('[data-otp-input]'));
        const index = inputs.indexOf(input);
        if (event.key === 'Backspace' && !input.value && index > 0) {
            inputs[index - 1].focus();
        }
        if (event.key === 'ArrowLeft' && index > 0) {
            inputs[index - 1].focus();
        }
        if (event.key === 'ArrowRight' && index < inputs.length - 1) {
            inputs[index + 1].focus();
        }
        updateValue(root);
    });

    document.addEventListener('paste', (event) => {
        const input = event.target.closest('[data-otp-input]');
        if (!input) return;
        const root = input.closest('[data-otp-root]');
        const inputs = Array.from(root.querySelectorAll('[data-otp-input]'));
        const index = inputs.indexOf(input);
        const data = event.clipboardData?.getData('text') || '';
        if (!data) return;
        event.preventDefault();
        const chars = data.replace(/\s/g, '').split('');
        chars.forEach((char, i) => {
            const target = inputs[index + i];
            if (target) target.value = char;
        });
        const next = inputs[Math.min(index + chars.length, inputs.length - 1)];
        if (next) next.focus();
        updateValue(root);
    });

    document.addEventListener('focusin', (event) => {
        const input = event.target.closest('[data-otp-input]');
        if (!input) return;
        input.select();
    });
}

if (!window.__texhubRichText) {
    window.__texhubRichText = true;

    const styleId = 'texhub-richtext-placeholder';
    if (!document.getElementById(styleId)) {
        const style = document.createElement('style');
        style.id = styleId;
        style.textContent = '[data-rich-editor]:empty:before{content:attr(data-placeholder);color:#9ca3af;}';
        document.head.appendChild(style);
    }

    const updateValue = (root) => {
        const editor = root.querySelector('[data-rich-editor]');
        const input = root.querySelector('[data-rich-input]');
        if (!editor || !input) return;
        input.value = editor.innerHTML;
        input.dispatchEvent(new Event('input', { bubbles: true }));
        input.dispatchEvent(new Event('change', { bubbles: true }));
    };

    document.addEventListener('input', (event) => {
        const editor = event.target.closest('[data-rich-editor]');
        if (!editor) return;
        const root = editor.closest('[data-rich-root]');
        if (!root) return;
        updateValue(root);
    });

    document.addEventListener('blur', (event) => {
        const editor = event.target.closest('[data-rich-editor]');
        if (!editor) return;
        const root = editor.closest('[data-rich-root]');
        if (!root) return;
        updateValue(root);
    }, true);

    document.addEventListener('click', (event) => {
        const button = event.target.closest('[data-rich-command]');
        if (!button) return;
        const root = button.closest('[data-rich-root]');
        const editor = root?.querySelector('[data-rich-editor]');
        if (!editor || editor.getAttribute('contenteditable') === 'false') return;

        const command = button.dataset.richCommand;
        editor.focus();

        if (command === 'createLink') {
            const url = window.prompt('Enter URL');
            if (url) document.execCommand('createLink', false, url);
        } else if (command === 'clear') {
            document.execCommand('removeFormat', false, null);
            document.execCommand('unlink', false, null);
        } else {
            document.execCommand(command, false, null);
        }

        updateValue(root);
    });
}

if (!window.__texhubTabs) {
    window.__texhubTabs = true;

    const setActive = (tabs, value) => {
        const triggers = tabs.querySelectorAll('[data-tabs-trigger]');
        const panels = tabs.querySelectorAll('[data-tabs-panel]');

        triggers.forEach((trigger) => {
            const isActive = trigger.dataset.value === value;
            trigger.dataset.state = isActive ? 'active' : 'inactive';
            trigger.setAttribute('aria-selected', isActive ? 'true' : 'false');
            trigger.setAttribute('tabindex', isActive ? '0' : '-1');
        });

        panels.forEach((panel) => {
            const isActive = panel.dataset.value === value;
            panel.dataset.state = isActive ? 'active' : 'inactive';
            panel.hidden = !isActive;
        });
    };

    const initTabs = () => {
        document.querySelectorAll('[data-tabs]').forEach((tabs) => {
            if (tabs.dataset.bound === 'true') return;
            tabs.dataset.bound = 'true';

            const triggers = Array.from(tabs.querySelectorAll('[data-tabs-trigger]'));
            if (!triggers.length) return;

            let activeValue = tabs.dataset.default || '';
            if (!activeValue) {
                const preset = triggers.find((trigger) => trigger.dataset.state === 'active');
                activeValue = preset?.dataset.value || '';
            }
            if (!activeValue) {
                const firstEnabled = triggers.find((trigger) => !trigger.disabled);
                activeValue = firstEnabled?.dataset.value || triggers[0].dataset.value;
            }

            setActive(tabs, activeValue);
        });
    };

    document.addEventListener('click', (event) => {
        const trigger = event.target.closest('[data-tabs-trigger]');
        if (!trigger) return;

        const tabs = trigger.closest('[data-tabs]');
        if (!tabs) return;
        if (tabs.dataset.disabled === 'true' || trigger.disabled) return;

        setActive(tabs, trigger.dataset.value);
    });

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTabs, {
            once: true
        });
    } else {
        initTabs();
    }
}

if (!window.__texhubThemeToggle) {
    window.__texhubThemeToggle = true;

    const root = document.documentElement;

    const getStoredTheme = () => {
        try {
            return localStorage.getItem('theme');
        } catch (error) {
            return null;
        }
    };

    const setStoredTheme = (theme) => {
        try {
            localStorage.setItem('theme', theme);
        } catch (error) {
            // Ignore storage failures.
        }
    };

    const updateThemeIcons = (theme) => {
        document.querySelectorAll('[data-theme-icon-light]').forEach((icon) => {
            icon.classList.toggle('hidden', theme === 'dark');
        });
        document.querySelectorAll('[data-theme-icon-dark]').forEach((icon) => {
            icon.classList.toggle('hidden', theme !== 'dark');
        });
    };

    const applyTheme = (theme) => {
        root.classList.toggle('dark', theme === 'dark');
        updateThemeIcons(theme);
    };

    const initTheme = () => {
        const stored = getStoredTheme();
        if (stored === 'light' || stored === 'dark') {
            applyTheme(stored);
            return;
        }

        const prefersDark = window.matchMedia?.('(prefers-color-scheme: dark)').matches;
        applyTheme(prefersDark ? 'dark' : 'light');
    };

    document.addEventListener('click', (event) => {
        const toggle = event.target.closest('[data-theme-toggle]');
        if (!toggle) return;

        const nextTheme = root.classList.contains('dark') ? 'light' : 'dark';
        applyTheme(nextTheme);
        setStoredTheme(nextTheme);
    });

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTheme, { once: true });
    } else {
        initTheme();
    }
}

if (!window.__texhubAdminShell) {
    window.__texhubAdminShell = true;

    const getShellNodes = () => ({
        sidebar: document.querySelector('[data-admin-sidebar]'),
        overlay: document.querySelector('[data-admin-overlay]'),
    });

    const setSidebarState = (open) => {
        const { sidebar, overlay } = getShellNodes();
        if (!sidebar || !overlay) return;

        const state = open ? 'open' : 'closed';
        sidebar.dataset.state = state;
        overlay.dataset.state = state;
        sidebar.setAttribute('aria-hidden', open ? 'false' : 'true');
        overlay.setAttribute('aria-hidden', open ? 'false' : 'true');
        document.body.classList.toggle('overflow-hidden', open);
    };

    const closeSidebar = () => setSidebarState(false);
    const openSidebar = () => setSidebarState(true);

    document.addEventListener('click', (event) => {
        if (event.target.closest('[data-admin-sidebar-open]')) {
            openSidebar();
            return;
        }

        if (event.target.closest('[data-admin-sidebar-close]') || event.target.closest('[data-admin-overlay]')) {
            closeSidebar();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeSidebar();
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) closeSidebar();
    });
}

if (!window.__texhubAdminProfile) {
    window.__texhubAdminProfile = true;

    const getProfileNodes = () => ({
        wrapper: document.querySelector('[data-admin-profile]'),
        trigger: document.querySelector('[data-admin-profile-trigger]'),
        menu: document.querySelector('[data-admin-profile-menu]'),
    });

    const setProfileState = (open) => {
        const { trigger, menu } = getProfileNodes();
        if (!trigger || !menu) return;

        menu.dataset.state = open ? 'open' : 'closed';
        trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
    };

    document.addEventListener('click', (event) => {
        const { wrapper, trigger, menu } = getProfileNodes();
        if (!wrapper || !trigger || !menu) return;

        if (event.target.closest('[data-admin-profile-trigger]')) {
            const isOpen = menu.dataset.state === 'open';
            setProfileState(!isOpen);
            return;
        }

        if (event.target.closest('[data-admin-profile-menu] a')) {
            setProfileState(false);
            return;
        }

        if (!event.target.closest('[data-admin-profile]')) {
            setProfileState(false);
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            setProfileState(false);
        }
    });
}

if (!window.__texhubModal) {
    window.__texhubModal = true;

    const openModal = (key, trigger) => {
        const modal = document.querySelector(`[data-modal=\"${key}\"]`);
        if (!modal) return;
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        const form = modal.querySelector('[data-modal-form]');
        if (form && trigger?.dataset?.modalAction) {
            form.setAttribute('action', trigger.dataset.modalAction);
        }
        modal.querySelectorAll('[data-modal-input]').forEach((input) => {
            const key = input.dataset.modalInput;
            if (!key) return;
            const datasetKey = `modal${key.charAt(0).toUpperCase()}${key.slice(1)}`;
            const value = trigger?.dataset?.[datasetKey] ?? '';
            input.value = value;
        });
        const defaultNameInput = modal.querySelector('[data-modal-input]:not([data-modal-input=\"phone\"],[data-modal-input=\"phoneSecondary\"],[data-modal-input=\"address\"],[data-modal-input=\"comment\"])');
        if (defaultNameInput && trigger?.dataset?.modalName) {
            defaultNameInput.value = trigger.dataset.modalName;
        }
    };

    const closeModal = (modal) => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    };

    document.addEventListener('click', (event) => {
        const openTrigger = event.target.closest('[data-modal-open]');
        if (openTrigger) {
            openModal(openTrigger.dataset.modalOpen, openTrigger);
            return;
        }

        const closeTrigger = event.target.closest('[data-modal-close]');
        if (closeTrigger) {
            const modal = closeTrigger.closest('[data-modal]');
            if (modal) closeModal(modal);
            return;
        }

        const overlay = event.target.closest('[data-modal]');
        if (overlay && event.target === overlay) {
            closeModal(overlay);
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') return;
        document.querySelectorAll('[data-modal]').forEach((modal) => {
            if (!modal.classList.contains('hidden')) {
                closeModal(modal);
            }
        });
    });
}

if (!window.__texhubClientToggle) {
    window.__texhubClientToggle = true;

    const updateClientFields = (toggle) => {
        const wrapper = toggle.closest('form');
        if (!wrapper) return;
        const fields = wrapper.querySelector('[data-new-client-fields]');
        const selectBlock = wrapper.querySelector('[data-client-select]');
        if (!fields) return;

        const input = toggle.querySelector('input[type=\"checkbox\"]');
        const isOn = input?.checked;
        fields.classList.toggle('hidden', !isOn);
        if (selectBlock) {
            selectBlock.classList.toggle('hidden', isOn);
        }
    };

    document.addEventListener('change', (event) => {
        const toggle = event.target.closest('[data-client-toggle]');
        if (!toggle) return;
        updateClientFields(toggle);
    });

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-client-toggle]').forEach(updateClientFields);
        }, { once: true });
    } else {
        document.querySelectorAll('[data-client-toggle]').forEach(updateClientFields);
    }
}

if (!window.__texhubSubOrders) {
    window.__texhubSubOrders = true;

    const toNumber = (value) => {
        const num = parseFloat(String(value).replace(',', '.'));
        return Number.isFinite(num) ? num : 0;
    };

    const getCalcMode = (row) => row.closest('[data-suborders]')?.dataset.subordersCalc;

    const normalizeKind = (value) => {
        const normalized = String(value ?? '').trim().toLowerCase();
        if (!normalized) return '';
        if (normalized.startsWith('штор')) return 'шторы';
        if (normalized.startsWith('жалюзи')) return 'жалюзи';
        if (normalized.startsWith('плиссе')) return 'плиссе';
        return normalized;
    };

    const findTypeOption = (list, value) => {
        if (!list) return null;
        const normalized = String(value ?? '').trim().toLowerCase();
        if (!normalized) return null;
        return Array.from(list.options).find((option) => String(option.value).trim().toLowerCase() === normalized);
    };

    const filterOrderTypes = (row) => {
        const kindSelect = row.querySelector('[data-sub-kind]');
        const legacySelect = row.querySelector('[data-sub-type]');
        const typeList = row.querySelector('[data-sub-type-list]');
        if (!kindSelect) return;

        const category = normalizeKind(kindSelect.value);

        if (legacySelect) {
            Array.from(legacySelect.options).forEach((option) => {
                if (!option.value) {
                    option.hidden = false;
                    option.disabled = false;
                    return;
                }
                const matches = !category || option.dataset.category === category;
                option.hidden = !matches;
                option.disabled = !matches;
            });

            if (legacySelect.selectedOptions.length && legacySelect.selectedOptions[0]?.disabled) {
                legacySelect.value = '';
            }
            return;
        }

        if (!typeList) return;
        if (!typeList.dataset.originalOptions) {
            typeList.dataset.originalOptions = typeList.innerHTML;
        }

        const wrapper = document.createElement('div');
        wrapper.innerHTML = typeList.dataset.originalOptions;
        const options = Array.from(wrapper.querySelectorAll('option'));
        const filtered = options.filter((option) => !category || option.dataset.category === category);
        typeList.innerHTML = '';
        filtered.forEach((option) => typeList.appendChild(option));
    };

    const syncTypePrice = (row) => {
        const priceInput = row.querySelector('[data-sub-price]');
        const legacySelect = row.querySelector('[data-sub-type]');
        const typeSearch = row.querySelector('[data-sub-type-search]');
        const typeList = row.querySelector('[data-sub-type-list]');
        const typeId = row.querySelector('[data-sub-type-id]');
        if (!priceInput) return;

        if (legacySelect) {
            const option = legacySelect.selectedOptions?.[0];
            if (!option || !option.value) {
                priceInput.value = '';
                return;
            }

            if (option.dataset.price !== undefined) {
                priceInput.value = option.dataset.price;
            }
            return;
        }

        if (!typeSearch || !typeList) return;
        const option = findTypeOption(typeList, typeSearch.value);
        if (!option) {
            if (typeId) typeId.value = '';
            priceInput.value = '';
            return;
        }

        if (typeId) typeId.value = option.dataset.id ?? '';
        if (option.dataset.price !== undefined) {
            priceInput.value = option.dataset.price;
        }
    };

    const ensureQtyDefault = (row) => {
        const qtyInput = row.querySelector('[data-sub-qty]');
        if (!qtyInput) return;
        if (!qtyInput.value) qtyInput.value = '1';
    };

    const recalcRow = (row) => {
        const width = toNumber(row.querySelector('[data-sub-width]')?.value);
        const height = toNumber(row.querySelector('[data-sub-height]')?.value);
        const qty = toNumber(row.querySelector('[data-sub-qty]')?.value);
        const areaInput = row.querySelector('[data-sub-area]');
        const priceInput = row.querySelector('[data-sub-price]');
        const amountInput = row.querySelector('[data-sub-amount]');
        const discountInput = row.querySelector('[data-sub-discount]');
        const totalInput = row.querySelector('[data-sub-total]');

        const manualArea = row.dataset.manualArea === 'true';
        const area = manualArea ? toNumber(areaInput?.value) : (width && height ? (width * height) / 10000 : 0);
        if (areaInput && !manualArea) areaInput.value = area ? area.toFixed(2) : '';

        const price = toNumber(priceInput?.value);
        const calcMode = getCalcMode(row);
        const amount = calcMode === 'width-price' ? (width / 100) * price * qty : price * qty;
        if (amountInput) amountInput.value = amount ? amount.toFixed(2) : '';
        const discount = toNumber(discountInput?.value);
        const total = amount - discount;
        if (totalInput) totalInput.value = total ? total.toFixed(2) : '';
    };

    const recalcSummary = (root) => {
        if (!root) return;
        let sumAmount = 0;
        let sumDiscount = 0;
        let sumTotal = 0;
        let sumArea = 0;

        root.querySelectorAll('[data-suborder-row]').forEach((row) => {
            sumArea += toNumber(row.querySelector('[data-sub-area]')?.value);
            sumAmount += toNumber(row.querySelector('[data-sub-amount]')?.value);
            sumDiscount += toNumber(row.querySelector('[data-sub-discount]')?.value);
            sumTotal += toNumber(row.querySelector('[data-sub-total]')?.value);
        });

        root.querySelector('[data-summary-amount]')?.replaceChildren(document.createTextNode(sumAmount.toFixed(2)));
        root.querySelector('[data-summary-discount]')?.replaceChildren(document.createTextNode(sumDiscount.toFixed(2)));
        root.querySelector('[data-summary-total]')?.replaceChildren(document.createTextNode(sumTotal.toFixed(2)));
        root.querySelector('[data-summary-area]')?.replaceChildren(document.createTextNode(sumArea.toFixed(2)));
        const summaryBalance = root.querySelector('[data-summary-balance]');

        const totalInput = root.querySelector('[data-order-total]');
        const discountInput = root.querySelector('[data-order-discounted]');
        const grandInput = root.querySelector('[data-order-grand]');

        const manualTotal = totalInput?.dataset.manual === 'true';
        const manualDiscount = discountInput?.dataset.manual === 'true';

        const baseAmount = manualTotal ? toNumber(totalInput?.value) : sumAmount;
        const discountTotal = manualDiscount ? toNumber(discountInput?.value) : sumDiscount;
        const rework = toNumber(root.querySelector('[data-order-rework]')?.value);
        const grandTotal = baseAmount - discountTotal + rework;

        if (totalInput && !manualTotal) totalInput.value = sumAmount.toFixed(2);
        if (discountInput && !manualDiscount) discountInput.value = sumDiscount.toFixed(2);
        if (grandInput) grandInput.value = grandTotal.toFixed(2);

        const advance = toNumber(root.querySelector('[data-order-advance]')?.value);
        const balanceInput = root.querySelector('[data-order-balance]');
        if (balanceInput) {
            const balance = grandTotal - advance;
            balanceInput.value = balance.toFixed(2);
        }
        if (summaryBalance) {
            const balanceValue = grandTotal - advance;
            summaryBalance.replaceChildren(document.createTextNode(balanceValue.toFixed(2)));
        }
    };

    const initRow = (row) => {
        if (!row) return;
        ensureQtyDefault(row);
        filterOrderTypes(row);
        syncTypePrice(row);
        recalcRow(row);
    };

    const addRow = (container) => {
        const list = container.querySelector('[data-suborders-list]');
        const template = container.querySelector('[data-suborder-template]');
        if (!list || !template) return;

        const index = list.children.length;
        const html = template.innerHTML.replaceAll('__index__', String(index));
        const wrapper = document.createElement('div');
        wrapper.innerHTML = html.trim();
        const row = wrapper.firstElementChild;
        if (row) list.appendChild(row);
        initRow(row);
        const root = container.closest('form');
        recalcSummary(root);
    };

    document.addEventListener('click', (event) => {
        const addBtn = event.target.closest('[data-suborder-add]');
        if (addBtn) {
            const container = addBtn.closest('[data-suborders]');
            if (container) addRow(container);
            return;
        }

        const removeBtn = event.target.closest('[data-suborder-remove]');
        if (removeBtn) {
            const row = removeBtn.closest('[data-suborder-row]');
            const container = removeBtn.closest('[data-suborders]');
            if (row && container) {
                row.remove();
                const root = container.closest('form');
                recalcSummary(root);
            }
        }
    });

    document.addEventListener('change', (event) => {
        const row = event.target.closest('[data-suborder-row]');
        const root = event.target.closest('form');
        if (!row) return;

        if (event.target.closest('[data-sub-kind]')) {
            filterOrderTypes(row);
            syncTypePrice(row);
        }

        if (event.target.closest('[data-sub-type]') || event.target.closest('[data-sub-type-search]')) {
            syncTypePrice(row);
        }

        recalcRow(row);
        recalcSummary(root);
    });

    document.addEventListener('input', (event) => {
        const row = event.target.closest('[data-suborder-row]');
        const root = event.target.closest('form');
        if (row) {
            if (event.target.closest('[data-sub-area]')) {
                row.dataset.manualArea = 'true';
            }
            if (event.target.closest('[data-sub-width]') || event.target.closest('[data-sub-height]')) {
                row.dataset.manualArea = 'false';
            }
            if (event.target.closest('[data-sub-type-search]')) {
                syncTypePrice(row);
            }
            recalcRow(row);
            recalcSummary(root);
            return;
        }

        if (!root) return;
        if (event.target.matches('[data-order-total]')) {
            event.target.dataset.manual = 'true';
        }
        if (event.target.matches('[data-order-discounted]')) {
            event.target.dataset.manual = 'true';
        }
        recalcSummary(root);
    });

    const ensureInitialRow = (container) => {
        const list = container.querySelector('[data-suborders-list]');
        if (!list || list.children.length > 0) return;
        addRow(container);
    };

    if (document.readyState === 'loading') {
        document.addEventListener(
            'DOMContentLoaded',
            () => {
                document.querySelectorAll('[data-suborders]').forEach((container) => ensureInitialRow(container));
            },
            { once: true },
        );
    } else {
        document.querySelectorAll('[data-suborders]').forEach((container) => ensureInitialRow(container));
    }

    if (document.readyState === 'loading') {
        document.addEventListener(
            'DOMContentLoaded',
            () => {
                document.querySelectorAll('[data-suborder-row]').forEach((row) => initRow(row));
            },
            { once: true },
        );
    } else {
        document.querySelectorAll('[data-suborder-row]').forEach((row) => initRow(row));
    }
}

if (!window.__texhubEnterFocusNext) {
    window.__texhubEnterFocusNext = true;

    const isFocusableField = (el) => {
        if (!el) return false;
        if (el.matches('textarea')) return false;
        if (el.matches('input[type="submit"], input[type="button"], input[type="reset"], button')) return false;
        if (el.matches('input, select')) return !el.disabled && !el.readOnly && el.tabIndex !== -1;
        return false;
    };

    const getFocusableFields = (root) => {
        const fields = Array.from(root.querySelectorAll('input, select, textarea, button'));
        return fields.filter(isFocusableField).filter((el) => {
            if (el.offsetParent === null && !el.matches('select')) return false;
            return true;
        });
    };

    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Enter') return;
        const target = event.target;
        if (!(target instanceof HTMLElement)) return;
        if (!isFocusableField(target)) return;

        const form = target.closest('form') || document;
        const fields = getFocusableFields(form);
        const index = fields.indexOf(target);
        if (index === -1) return;
        const next = fields[index + 1];
        if (!next) return;

        event.preventDefault();
        next.focus();
    });
}

if (!window.__texhubPreventDoubleSubmit) {
    window.__texhubPreventDoubleSubmit = true;

    document.addEventListener('submit', (event) => {
        const form = event.target;
        if (!(form instanceof HTMLFormElement)) return;
        if (!form.matches('[data-prevent-double]')) return;
        if (form.dataset.submitted === 'true') {
            event.preventDefault();
            return;
        }
        form.dataset.submitted = 'true';

        const buttons = Array.from(form.querySelectorAll('button[type="submit"], input[type="submit"]'));
        buttons.forEach((button) => {
            button.disabled = true;
            if (button instanceof HTMLButtonElement && button.dataset.loadingText) {
                button.dataset.originalText = button.textContent ?? '';
                button.textContent = button.dataset.loadingText;
            }
            button.classList.add('opacity-70', 'cursor-not-allowed');
        });
    });
}
