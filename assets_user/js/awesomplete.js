! function() {
    "use strict";
    var t = function(t, e) { return t(e = { exports: {} }, e.exports), e.exports }((function(t) {
        ! function() {
            var e = function(t, i) {
                var n = this;
                e.count = (e.count || 0) + 1, this.count = e.count, this.isOpened = !1, this.input = s(t), this.input.setAttribute("autocomplete", "off"), this.input.setAttribute("aria-expanded", "false"), this.input.setAttribute("aria-owns", "awesomplete_list_" + this.count), this.input.setAttribute("role", "combobox"), this.options = i = i || {},
                    function(t, e, i) {
                        for (var n in e) {
                            var s = e[n],
                                r = t.input.getAttribute("data-" + n.toLowerCase());
                            "number" == typeof s ? t[n] = parseInt(r) : !1 === s ? t[n] = null !== r : s instanceof Function ? t[n] = null : t[n] = r, t[n] || 0 === t[n] || (t[n] = n in i ? i[n] : s)
                        }
                    }(this, { minChars: 2, maxItems: 10, autoFirst: !1, data: e.DATA, filter: e.FILTER_CONTAINS, sort: !1 !== i.sort && e.SORT_BYLENGTH, container: e.CONTAINER, item: e.ITEM, replace: e.REPLACE, tabSelect: !1 }, i), this.index = -1, this.container = this.container(t), this.ul = s.create("ul", { hidden: "hidden", role: "listbox", id: "awesomplete_list_" + this.count, inside: this.container }), this.status = s.create("span", { className: "visually-hidden", role: "status", "aria-live": "assertive", "aria-atomic": !0, inside: this.container, textContent: 0 != this.minChars ? "Type " + this.minChars + " or more characters for results." : "Begin typing for results." }), this._events = {
                        input: {
                            input: this.evaluate.bind(this),
                            blur: this.close.bind(this, { reason: "blur" }),
                            keydown: function(t) {
                                var e = t.keyCode;
                                n.opened && (13 === e && n.selected ? (t.preventDefault(), n.select(void 0, void 0, t)) : 9 === e && n.selected && n.tabSelect ? n.select(void 0, void 0, t) : 27 === e ? n.close({ reason: "esc" }) : 38 !== e && 40 !== e || (t.preventDefault(), n[38 === e ? "previous" : "next"]()))
                            }
                        },
                        form: { submit: this.close.bind(this, { reason: "submit" }) },
                        ul: {
                            mousedown: function(t) { t.preventDefault() },
                            click: function(t) {
                                var e = t.target;
                                if (e !== this) {
                                    for (; e && !/li/i.test(e.nodeName);) e = e.parentNode;
                                    e && 0 === t.button && (t.preventDefault(), n.select(e, t.target, t))
                                }
                            }
                        }
                    }, s.bind(this.input, this._events.input), s.bind(this.input.form, this._events.form), s.bind(this.ul, this._events.ul), this.input.hasAttribute("list") ? (this.list = "#" + this.input.getAttribute("list"), this.input.removeAttribute("list")) : this.list = this.input.getAttribute("data-list") || i.list || [], e.all.push(this)
            };

            function i(t) {
                var e = Array.isArray(t) ? { label: t[0], value: t[1] } : "object" == typeof t && "label" in t && "value" in t ? t : { label: t, value: t };
                this.label = e.label || e.value, this.value = e.value
            }
            e.prototype = {set list(t) {
                    if (Array.isArray(t)) this._list = t;
                    else if ("string" == typeof t && t.indexOf(",") > -1) this._list = t.split(/\s*,\s*/);
                    else if ((t = s(t)) && t.children) {
                        var e = [];
                        n.apply(t.children).forEach((function(t) {
                            if (!t.disabled) {
                                var i = t.textContent.trim(),
                                    n = t.value || i,
                                    s = t.label || i;
                                "" !== n && e.push({ label: s, value: n })
                            }
                        })), this._list = e
                    }
                    document.activeElement === this.input && this.evaluate()
                },
                get selected() { return this.index > -1 },
                get opened() { return this.isOpened },
                close: function(t) { this.opened && (this.input.setAttribute("aria-expanded", "false"), this.ul.setAttribute("hidden", ""), this.isOpened = !1, this.index = -1, this.status.setAttribute("hidden", ""), s.fire(this.input, "awesomplete-close", t || {})) },
                open: function() { this.input.setAttribute("aria-expanded", "true"), this.ul.removeAttribute("hidden"), this.isOpened = !0, this.status.removeAttribute("hidden"), this.autoFirst && -1 === this.index && this.goto(0), s.fire(this.input, "awesomplete-open") },
                destroy: function() {
                    if (s.unbind(this.input, this._events.input), s.unbind(this.input.form, this._events.form), !this.options.container) {
                        var t = this.container.parentNode;
                        t.insertBefore(this.input, this.container), t.removeChild(this.container)
                    }
                    this.input.removeAttribute("autocomplete"), this.input.removeAttribute("aria-autocomplete");
                    var i = e.all.indexOf(this); - 1 !== i && e.all.splice(i, 1)
                },
                next: function() {
                    var t = this.ul.children.length;
                    this.goto(this.index < t - 1 ? this.index + 1 : t ? 0 : -1)
                },
                previous: function() {
                    var t = this.ul.children.length,
                        e = this.index - 1;
                    this.goto(this.selected && -1 !== e ? e : t - 1)
                },
                goto: function(t) {
                    var e = this.ul.children;
                    this.selected && e[this.index].setAttribute("aria-selected", "false"), this.index = t, t > -1 && e.length > 0 && (e[t].setAttribute("aria-selected", "true"), this.status.textContent = e[t].textContent + ", list item " + (t + 1) + " of " + e.length, this.input.setAttribute("aria-activedescendant", this.ul.id + "_item_" + this.index), this.ul.scrollTop = e[t].offsetTop - this.ul.clientHeight + e[t].clientHeight, s.fire(this.input, "awesomplete-highlight", { text: this.suggestions[this.index] }))
                },
                select: function(t, e, i) {
                    if (t ? this.index = s.siblingIndex(t) : t = this.ul.children[this.index], t) {
                        var n = this.suggestions[this.index];
                        s.fire(this.input, "awesomplete-select", { text: n, origin: e || t, originalEvent: i }) && (this.replace(n), this.close({ reason: "select" }), s.fire(this.input, "awesomplete-selectcomplete", { text: n, originalEvent: i }))
                    }
                },
                evaluate: function() {
                    var t = this,
                        e = this.input.value;
                    e.length >= this.minChars && this._list && this._list.length > 0 ? (this.index = -1, this.ul.innerHTML = "", this.suggestions = this._list.map((function(n) { return new i(t.data(n, e)) })).filter((function(i) { return t.filter(i, e) })), !1 !== this.sort && (this.suggestions = this.suggestions.sort(this.sort)), this.suggestions = this.suggestions.slice(0, this.maxItems), this.suggestions.forEach((function(i, n) { t.ul.appendChild(t.item(i, e, n)) })), 0 === this.ul.children.length ? (this.status.textContent = "No results found", this.close({ reason: "nomatches" })) : (this.open(), this.status.textContent = this.ul.children.length + " results found")) : (this.close({ reason: "nomatches" }), this.status.textContent = "No results found")
                }
            }, e.all = [], e.FILTER_CONTAINS = function(t, e) { return RegExp(s.regExpEscape(e.trim()), "i").test(t) }, e.FILTER_STARTSWITH = function(t, e) { return RegExp("^" + s.regExpEscape(e.trim()), "i").test(t) }, e.SORT_BYLENGTH = function(t, e) { return t.length !== e.length ? t.length - e.length : t < e ? -1 : 1 }, e.CONTAINER = function(t) { return s.create("div", { className: "awesomplete", around: t }) }, e.ITEM = function(t, e, i) { var n = "" === e.trim() ? t : t.replace(RegExp(s.regExpEscape(e.trim()), "gi"), "<mark>$&</mark>"); return s.create("li", { innerHTML: n, role: "option", "aria-selected": "false", id: "awesomplete_list_" + this.count + "_item_" + i }) }, e.REPLACE = function(t) { this.input.value = t.value }, e.DATA = function(t) { return t }, Object.defineProperty(i.prototype = Object.create(String.prototype), "length", { get: function() { return this.label.length } }), i.prototype.toString = i.prototype.valueOf = function() { return "" + this.label };
            var n = Array.prototype.slice;

            function s(t, e) { return "string" == typeof t ? (e || document).querySelector(t) : t || null }

            function r(t, e) { return n.call((e || document).querySelectorAll(t)) }

            function o() { r("input.awesomplete").forEach((function(t) { new e(t) })) }
            s.create = function(t, e) {
                var i = document.createElement(t);
                for (var n in e) {
                    var r = e[n];
                    if ("inside" === n) s(r).appendChild(i);
                    else if ("around" === n) {
                        var o = s(r);
                        o.parentNode.insertBefore(i, o), i.appendChild(o), null != o.getAttribute("autofocus") && o.focus()
                    } else n in i ? i[n] = r : i.setAttribute(n, r)
                }
                return i
            }, s.bind = function(t, e) {
                if (t)
                    for (var i in e) {
                        var n = e[i];
                        i.split(/\s+/).forEach((function(e) { t.addEventListener(e, n) }))
                    }
            }, s.unbind = function(t, e) {
                if (t)
                    for (var i in e) {
                        var n = e[i];
                        i.split(/\s+/).forEach((function(e) { t.removeEventListener(e, n) }))
                    }
            }, s.fire = function(t, e, i) { var n = document.createEvent("HTMLEvents"); for (var s in n.initEvent(e, !0, !0), i) n[s] = i[s]; return t.dispatchEvent(n) }, s.regExpEscape = function(t) { return t.replace(/[-\\^$*+?.()|[\]{}]/g, "\\$&") }, s.siblingIndex = function(t) { for (var e = 0; t = t.previousElementSibling; e++); return e }, "undefined" != typeof self && (self.Awesomplete = e), "undefined" != typeof Document && ("loading" !== document.readyState ? o() : document.addEventListener("DOMContentLoaded", o)), e.$ = s, e.$$ = r, t.exports && (t.exports = e)
        }()
    }));
    document.addEventListener("DOMContentLoaded", (function() {
        var e = document.getElementById("search-hero"),
            i = document.getElementById("search-navbar"),
            n = [
                // { label: "Do the prices shown in online store include sales tax?", value: "article.html" },
                // { label: "What happens if I change my mind?", value: "article.html" }, 
                // { label: "Which payment methods do you offer?", value: "article.html" }, 
                // { label: "How long does it take to deliver my package?", value: "article.html" }, 
                {
                    label: "What retuns options do you offer?",
                    value: "article.html"
                }
            ];
        e && (e.addEventListener("awesomplete-selectcomplete", (function(t) { window.location.href = t.text.value }), !1), new t(e, { autoFirst: !0, list: n, replace: function(t) { this.input.value = t.label } })), i && (i.addEventListener("awesomplete-selectcomplete", (function(t) { window.location.href = t.text.value }), !1), new t(i, { autoFirst: !0, list: n, replace: function(t) { this.input.value = t.label } }))
    }))

    // Jangan hapud di atas

}();