 export var Autocomplete = function() { "use strict";

    function t(e) { return (t = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) { return typeof t } : function(t) { return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t })(e) }

    function e(t, e, s) { return e in t ? Object.defineProperty(t, e, { value: s, enumerable: !0, configurable: !0, writable: !0 }) : t[e] = s, t }

    function s(t) { return function(t) { if (Array.isArray(t)) return n(t) }(t) || function(t) { if ("undefined" != typeof Symbol && Symbol.iterator in Object(t)) return Array.from(t) }(t) || function(t, e) { if (!t) return; if ("string" == typeof t) return n(t, e); var s = Object.prototype.toString.call(t).slice(8, -1); "Object" === s && t.constructor && (s = t.constructor.name); if ("Map" === s || "Set" === s) return Array.from(t); if ("Arguments" === s || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(s)) return n(t, e) }(t) || function() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.") }() }

    function n(t, e) {
        (null == e || e > t.length) && (e = t.length); for (var s = 0, n = new Array(e); s < e; s++) n[s] = t[s]; return n } return function n(i, o) { var r, a = this,
            l = o.delay,
            c = o.clearButton,
            u = o.howManyCharacters,
            d = o.selectFirst,
            h = o.insertToInput,
            f = o.classGroup,
            m = o.disableCloseOnSelect,
            p = o.onResults,
            v = void 0 === p ? function() {} : p,
            L = o.onSearch,
            y = void 0 === L ? function() {} : L,
            b = o.onSubmit,
            A = void 0 === b ? function() {} : b,
            x = o.onOpened,
            g = void 0 === x ? function() {} : x,
            S = o.onReset,
            C = void 0 === S ? function() {} : S,
            E = o.noResults,
            T = void 0 === E ? function() {} : E,
            O = o.onSelectedItem,
            I = void 0 === O ? function() {} : O;! function(t, e) { if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function") }(this, n), e(this, "init", (function() { a.clearBtn && a.clearButton(), a.output(), a.reset(), a.root.addEventListener("input", a.handleInput) })), e(this, "handleInput", (function(t) { var e = t.target.value.replace(a.regex, "\\$&");
            clearTimeout(a.timeout), a.timeout = setTimeout((function() { a.searchItem(e.trim()) }), a.delay) })), e(this, "output", (function() { a.setAttr(a.resultList, { id: a.outputUl, addClass: "auto-output-search", tabIndex: 0, role: "listbox" }), a.root.parentNode.insertBefore(a.resultList, a.root.nextSibling) })), e(this, "reset", (function() { var t;
            a.setAttr(a.root, { "aria-owns": "".concat(a.search, "-list"), "aria-expanded": !1, "aria-autocomplete": "list", "aria-activedescendant": "", role: "combobox", removeClass: "expanded" }), a.resultList.classList.remove(a.isActive), a.resultList.scrollTop = 0, 0 != (null === (t = a.matches) || void 0 === t ? void 0 : t.length) || a.toInput || (a.resultList.innerHTML = ""), a.index = a.selectFirst ? 0 : -1 })), e(this, "searchItem", (function(e) { a.value = e, a.onLoading(!0), a.showBtn(), a.characters > e.length ? a.onLoading() : a.onSearch({ currentValue: e, element: a.root }).then((function(n) { a.matches = Array.isArray(n) ? s(n) : JSON.parse(JSON.stringify(n)), a.onLoading(), a.error(), 0 == n.length ? (a.root.classList.remove("expanded"), a.reset(), a.noResults({ element: a.root, currentValue: e, template: a.results }), a.events()) : (n.length > 0 || function(e) { return e && "object" === t(e) && e.constructor === Object }(n)) && (a.index = a.selectFirst ? 0 : -1, a.results(), a.events()) })).catch((function() { a.onLoading(), a.reset() })) })), e(this, "onLoading", (function(t) { a.root.parentNode.classList[t ? "add" : "remove"](a.isLoading) })), e(this, "error", (function(t) { a.root.classList[t ? "add" : "remove"](a.err) })), e(this, "events", (function() { var t = [].slice.call(a.resultList.children);
            a.root.addEventListener("keydown", a.handleKeys), a.root.addEventListener("click", a.handleShowItems); for (var e = 0; e < t.length; e++) t[e].addEventListener("mousemove", a.handleMouse), t[e].addEventListener("click", a.handleMouse, !1);
            document.addEventListener("click", a.handleDocClick) })), e(this, "results", (function(t) { a.setAttr(a.root, { "aria-expanded": !0, addClass: "expanded" }), a.resultList.innerHTML = 0 === a.matches.length ? a.onResults({ currentValue: a.value, matches: 0, template: t }) : a.onResults({ currentValue: a.value, matches: a.matches, classGroup: a.classGroup }), a.resultList.classList.add(a.isActive); var e = a.classGroup ? ":not(.".concat(a.classGroup, ")") : "";
            a.itemsLi = document.querySelectorAll("#".concat(a.outputUl, " > li").concat(e)), a.selectFirstEl(), a.onOpened({ type: "results", element: a.root, results: a.resultList }), a.addAriaToLi() })), e(this, "handleDocClick", (function(t) { var e = t.target,
                s = null;
            e.closest("ul") && a.disableCloseOnSelect && (s = !0), e.id === a.search || s || a.reset() })), e(this, "addAriaToLi", (function() { for (var t = 0; t < a.itemsLi.length; t++) a.setAttr(a.itemsLi[t], { role: "option", tabindex: -1, "aria-selected": "false", "aria-setsize": a.itemsLi.length, "aria-posinset": t }) })), e(this, "selectFirstEl", (function() { if (a.remAria(document.querySelector(".".concat(a.activeList))), a.selectFirst) { var t = a.resultList.firstElementChild,
                    e = a.classGroup && a.matches.length > 0 && a.selectFirst ? t.nextElementSibling : t;
                a.setAttr(e, { id: "".concat(a.selectedOption, "-0"), addClass: a.activeList, "aria-selected": !0 }), a.setAriaDes(a.root, "".concat(a.selectedOption, "-0")), a.follow(t, a.resultList) } })), e(this, "showBtn", (function() { a.clearBtn && (a.clearBtn.classList.remove("hidden"), a.clearBtn.addEventListener("click", a.handleClearButton)) })), e(this, "setAttr", (function(t, e) { for (var s in e) "addClass" === s ? t.classList.add(e[s]) : "removeClass" === s ? t.classList.remove(e[s]) : t.setAttribute(s, e[s]) })), e(this, "handleShowItems", (function() { a.resultList.textContent.length > 0 && !a.resultList.classList.contains(a.isActive) && (a.setAttr(a.root, { "aria-expanded": !0, addClass: "expanded" }), a.resultList.classList.add(a.isActive), a.selectFirstEl(), a.onOpened({ type: "showItems", element: a.root, results: a.resultList })) })), e(this, "handleMouse", (function(t) { t.preventDefault(); var e = t.target,
                s = t.type,
                n = e.closest("li"),
                i = null == n ? void 0 : n.hasAttribute("role");
            n && i && ("click" === s && a.getTextFromLi(n), n.classList.contains(a.activeList) || "mousemove" === s && (a.remAria(document.querySelector(".".concat(a.activeList))), a.setAria(n), a.index = a.indexLiSelected(n), a.onSelectedItem({ index: a.index, element: a.root, object: a.matches[a.index] }))) })), e(this, "getTextFromLi", (function(t) { t && 0 !== a.matches.length ? (a.addToInput(t), a.onSubmit({ index: a.index, element: a.root, object: a.matches[a.index], results: a.resultList }), a.disableCloseOnSelect || (a.remAria(t), a.reset())) : a.disableCloseOnSelect || a.reset() })), e(this, "firstElement", (function(t) { return t.firstElementChild || t })), e(this, "addToInput", (function(t) { a.root.value = a.firstElement(t).textContent.trim() })), e(this, "indexLiSelected", (function(t) { return Array.prototype.indexOf.call(a.itemsLi, t) })), e(this, "handleKeys", (function(t) { var e = t.keyCode,
                s = a.resultList.classList.contains(a.isActive),
                n = a.matches.length; switch (a.selectedLi = document.querySelector(".".concat(a.activeList)), e) {
                case a.keyCodes.UP:
                case a.keyCodes.DOWN:
                    if (t.preventDefault(), n <= 1 && a.selectFirst || !s) return;
                    e === a.keyCodes.UP ? (a.index -= 1, a.index < 0 && (a.index = n - 1)) : (a.index += 1, a.index >= n && (a.index = 0)), a.remAria(a.selectedLi), n > 0 && (a.onSelectedItem({ index: a.index, element: a.root, object: a.matches[a.index] }), a.setAria(a.itemsLi[a.index]), a.toInput && s && a.addToInput(a.itemsLi[a.index])); break;
                case a.keyCodes.ENTER:
                    a.getTextFromLi(a.selectedLi); break;
                case a.keyCodes.TAB:
                case a.keyCodes.ESC:
                    a.reset() } })), e(this, "setAria", (function(t) { var e = "".concat(a.selectedOption, "-").concat(a.indexLiSelected(t));
            a.setAttr(t, { id: e, "aria-selected": !0, addClass: a.activeList }), a.setAriaDes(a.root, e), a.follow(t, a.resultList) })), e(this, "follow", (function(t, e) { if (t.offsetTop < e.scrollTop) e.scrollTop = t.offsetTop;
            else { var s = t.offsetTop + t.offsetHeight;
                s > e.scrollTop + e.offsetHeight && (e.scrollTop = s - e.offsetHeight) } })), e(this, "remAria", (function(t) { t && a.setAttr(t, { id: "", removeClass: a.activeList, "aria-selected": !1 }) })), e(this, "setAriaDes", (function(t, e) { t.setAttribute("aria-activedescendant", e || "") })), e(this, "clearButton", (function() { a.setAttr(a.clearBtn, { id: "auto-clear-".concat(a.search), class: "auto-clear hidden", type: "button", "aria-label": "claar text from input" }), a.root.insertAdjacentElement("afterend", a.clearBtn) })), e(this, "handleClearButton", (function(t) { t.target.classList.add("hidden"), a.root.value = "", a.root.focus(), a.resultList.textContent = "", a.reset(), a.error(), a.onReset(a.root) })), this.search = i, this.root = document.getElementById(this.search), this.onSearch = (r = y, Boolean(r && "function" == typeof r.then) ? y : function(t) { var e = t.currentValue,
                s = t.element; return Promise.resolve(y({ currentValue: e, element: s })) }), this.onResults = v, this.onSubmit = A, this.onSelectedItem = I, this.onOpened = g, this.onReset = C, this.noResults = T, this.delay = l || 500, this.characters = u || 1, this.clearBtn = c || !0, this.selectFirst = d || !1, this.toInput = h || !1, this.classGroup = f, this.disableCloseOnSelect = m || !1, this.outputUl = "".concat(this.search, "-list"), this.isLoading = "auto-is-loading", this.isActive = "auto-is-active", this.activeList = "auto-selected", this.selectedOption = "selectedOption", this.err = "auto-error", this.regex = /[|\\{}()[\]^$+*?.]/g, this.timeout = null, this.resultList = document.createElement("ul"), this.clearBtn = document.createElement("button"), this.keyCodes = { ESC: 27, ENTER: 13, UP: 38, DOWN: 40, TAB: 9 }, this.init() } }();