/**
 * Created by 213 on 9/22/2016.
 */
function _kms(e) {
    setTimeout(function () {
        var t = document, n = t.getElementsByTagName("script")[0], i = t.createElement("script");
        i.async = !0, i.src = e, n.parentNode.insertBefore(i, n)
    }, 1)
}
!function (e, t, n, i) {
    var r = t.getElementById("env-staging") || t.getElementById("env-development") || t.getElementById("is-admin");
    if (!r) {
        _errs = [i];
        var o = e.onerror;
        e.onerror = function () {
            var e = arguments;
            _errs.push(e), o && o.apply(this, e)
        };
        var a = function () {
            var e = t.createElement(n), r = t.getElementsByTagName(n)[0];
            e.src = "//beacon.errorception.com/" + i + ".js", e.async = !0, r.parentNode.insertBefore(e, r)
        };
        e.addEventListener ? e.addEventListener("load", a, !1) : e.attachEvent("onload", a)
    }
}(window, document, "script", "50f94eee7441eccb5d000065"), function (e, t) {
    "object" == typeof module && "object" == typeof module.exports ? module.exports = e.document ? t(e, !0) : function (e) {
        if (!e.document)throw new Error("jQuery requires a window with a document");
        return t(e)
    } : t(e)
}("undefined" != typeof window ? window : this, function (e, t) {
    function n(e) {
        var t = e.length, n = ot.type(e);
        return "function" === n || ot.isWindow(e) ? !1 : 1 === e.nodeType && t ? !0 : "array" === n || 0 === t || "number" == typeof t && t > 0 && t - 1 in e
    }

    function i(e, t, n) {
        if (ot.isFunction(t))return ot.grep(e, function (e, i) {
            return !!t.call(e, i, e) !== n
        });
        if (t.nodeType)return ot.grep(e, function (e) {
            return e === t !== n
        });
        if ("string" == typeof t) {
            if (ht.test(t))return ot.filter(t, e, n);
            t = ot.filter(t, e)
        }
        return ot.grep(e, function (e) {
            return ot.inArray(e, t) >= 0 !== n
        })
    }

    function r(e, t) {
        do e = e[t]; while (e && 1 !== e.nodeType);
        return e
    }

    function o(e) {
        var t = wt[e] = {};
        return ot.each(e.match(xt) || [], function (e, n) {
            t[n] = !0
        }), t
    }

    function a() {
        mt.addEventListener ? (mt.removeEventListener("DOMContentLoaded", s, !1), e.removeEventListener("load", s, !1)) : (mt.detachEvent("onreadystatechange", s), e.detachEvent("onload", s))
    }

    function s() {
        (mt.addEventListener || "load" === event.type || "complete" === mt.readyState) && (a(), ot.ready())
    }

    function l(e, t, n) {
        if (void 0 === n && 1 === e.nodeType) {
            var i = "data-" + t.replace(St, "-$1").toLowerCase();
            if (n = e.getAttribute(i), "string" == typeof n) {
                try {
                    n = "true" === n ? !0 : "false" === n ? !1 : "null" === n ? null : +n + "" === n ? +n : Tt.test(n) ? ot.parseJSON(n) : n
                } catch (r) {
                }
                ot.data(e, t, n)
            } else n = void 0
        }
        return n
    }

    function u(e) {
        var t;
        for (t in e)if (("data" !== t || !ot.isEmptyObject(e[t])) && "toJSON" !== t)return !1;
        return !0
    }

    function c(e, t, n, i) {
        if (ot.acceptData(e)) {
            var r, o, a = ot.expando, s = e.nodeType, l = s ? ot.cache : e, u = s ? e[a] : e[a] && a;
            if (u && l[u] && (i || l[u].data) || void 0 !== n || "string" != typeof t)return u || (u = s ? e[a] = X.pop() || ot.guid++ : a), l[u] || (l[u] = s ? {} : {toJSON: ot.noop}), ("object" == typeof t || "function" == typeof t) && (i ? l[u] = ot.extend(l[u], t) : l[u].data = ot.extend(l[u].data, t)), o = l[u], i || (o.data || (o.data = {}), o = o.data), void 0 !== n && (o[ot.camelCase(t)] = n), "string" == typeof t ? (r = o[t], null == r && (r = o[ot.camelCase(t)])) : r = o, r
        }
    }

    function d(e, t, n) {
        if (ot.acceptData(e)) {
            var i, r, o = e.nodeType, a = o ? ot.cache : e, s = o ? e[ot.expando] : ot.expando;
            if (a[s]) {
                if (t && (i = n ? a[s] : a[s].data)) {
                    ot.isArray(t) ? t = t.concat(ot.map(t, ot.camelCase)) : t in i ? t = [t] : (t = ot.camelCase(t), t = t in i ? [t] : t.split(" ")), r = t.length;
                    for (; r--;)delete i[t[r]];
                    if (n ? !u(i) : !ot.isEmptyObject(i))return
                }
                (n || (delete a[s].data, u(a[s]))) && (o ? ot.cleanData([e], !0) : it.deleteExpando || a != a.window ? delete a[s] : a[s] = null)
            }
        }
    }

    function p() {
        return !0
    }

    function h() {
        return !1
    }

    function f() {
        try {
            return mt.activeElement
        } catch (e) {
        }
    }

    function m(e) {
        var t = qt.split("|"), n = e.createDocumentFragment();
        if (n.createElement)for (; t.length;)n.createElement(t.pop());
        return n
    }

    function g(e, t) {
        var n, i, r = 0, o = typeof e.getElementsByTagName !== Ct ? e.getElementsByTagName(t || "*") : typeof e.querySelectorAll !== Ct ? e.querySelectorAll(t || "*") : void 0;
        if (!o)for (o = [], n = e.childNodes || e; null != (i = n[r]); r++)!t || ot.nodeName(i, t) ? o.push(i) : ot.merge(o, g(i, t));
        return void 0 === t || t && ot.nodeName(e, t) ? ot.merge([e], o) : o
    }

    function v(e) {
        jt.test(e.type) && (e.defaultChecked = e.checked)
    }

    function y(e, t) {
        return ot.nodeName(e, "table") && ot.nodeName(11 !== t.nodeType ? t : t.firstChild, "tr") ? e.getElementsByTagName("tbody")[0] || e.appendChild(e.ownerDocument.createElement("tbody")) : e
    }

    function b(e) {
        return e.type = (null !== ot.find.attr(e, "type")) + "/" + e.type, e
    }

    function x(e) {
        var t = Xt.exec(e.type);
        return t ? e.type = t[1] : e.removeAttribute("type"), e
    }

    function w(e, t) {
        for (var n, i = 0; null != (n = e[i]); i++)ot._data(n, "globalEval", !t || ot._data(t[i], "globalEval"))
    }

    function k(e, t) {
        if (1 === t.nodeType && ot.hasData(e)) {
            var n, i, r, o = ot._data(e), a = ot._data(t, o), s = o.events;
            if (s) {
                delete a.handle, a.events = {};
                for (n in s)for (i = 0, r = s[n].length; r > i; i++)ot.event.add(t, n, s[n][i])
            }
            a.data && (a.data = ot.extend({}, a.data))
        }
    }

    function _(e, t) {
        var n, i, r;
        if (1 === t.nodeType) {
            if (n = t.nodeName.toLowerCase(), !it.noCloneEvent && t[ot.expando]) {
                r = ot._data(t);
                for (i in r.events)ot.removeEvent(t, i, r.handle);
                t.removeAttribute(ot.expando)
            }
            "script" === n && t.text !== e.text ? (b(t).text = e.text, x(t)) : "object" === n ? (t.parentNode && (t.outerHTML = e.outerHTML), it.html5Clone && e.innerHTML && !ot.trim(t.innerHTML) && (t.innerHTML = e.innerHTML)) : "input" === n && jt.test(e.type) ? (t.defaultChecked = t.checked = e.checked, t.value !== e.value && (t.value = e.value)) : "option" === n ? t.defaultSelected = t.selected = e.defaultSelected : ("input" === n || "textarea" === n) && (t.defaultValue = e.defaultValue)
        }
    }

    function C(t, n) {
        var i = ot(n.createElement(t)).appendTo(n.body), r = e.getDefaultComputedStyle ? e.getDefaultComputedStyle(i[0]).display : ot.css(i[0], "display");
        return i.detach(), r
    }

    function T(e) {
        var t = mt, n = en[e];
        return n || (n = C(e, t), "none" !== n && n || (Yt = (Yt || ot("<iframe frameborder='0' width='0' height='0'/>")).appendTo(t.documentElement), t = (Yt[0].contentWindow || Yt[0].contentDocument).document, t.write(), t.close(), n = C(e, t), Yt.detach()), en[e] = n), n
    }

    function S(e, t) {
        return {
            get: function () {
                var n = e();
                if (null != n)return n ? void delete this.get : (this.get = t).apply(this, arguments)
            }
        }
    }

    function E(e, t) {
        if (t in e)return t;
        for (var n = t.charAt(0).toUpperCase() + t.slice(1), i = t, r = fn.length; r--;)if (t = fn[r] + n, t in e)return t;
        return i
    }

    function $(e, t) {
        for (var n, i, r, o = [], a = 0, s = e.length; s > a; a++)i = e[a], i.style && (o[a] = ot._data(i, "olddisplay"), n = i.style.display, t ? (o[a] || "none" !== n || (i.style.display = ""), "" === i.style.display && Nt(i) && (o[a] = ot._data(i, "olddisplay", T(i.nodeName)))) : o[a] || (r = Nt(i), (n && "none" !== n || !r) && ot._data(i, "olddisplay", r ? n : ot.css(i, "display"))));
        for (a = 0; s > a; a++)i = e[a], i.style && (t && "none" !== i.style.display && "" !== i.style.display || (i.style.display = t ? o[a] || "" : "none"));
        return e
    }

    function N(e, t, n) {
        var i = cn.exec(t);
        return i ? Math.max(0, i[1] - (n || 0)) + (i[2] || "px") : t
    }

    function A(e, t, n, i, r) {
        for (var o = n === (i ? "border" : "content") ? 4 : "width" === t ? 1 : 0, a = 0; 4 > o; o += 2)"margin" === n && (a += ot.css(e, n + $t[o], !0, r)), i ? ("content" === n && (a -= ot.css(e, "padding" + $t[o], !0, r)), "margin" !== n && (a -= ot.css(e, "border" + $t[o] + "Width", !0, r))) : (a += ot.css(e, "padding" + $t[o], !0, r), "padding" !== n && (a += ot.css(e, "border" + $t[o] + "Width", !0, r)));
        return a
    }

    function j(e, t, n) {
        var i = !0, r = "width" === t ? e.offsetWidth : e.offsetHeight, o = tn(e), a = it.boxSizing() && "border-box" === ot.css(e, "boxSizing", !1, o);
        if (0 >= r || null == r) {
            if (r = nn(e, t, o), (0 > r || null == r) && (r = e.style[t]), on.test(r))return r;
            i = a && (it.boxSizingReliable() || r === e.style[t]), r = parseFloat(r) || 0
        }
        return r + A(e, t, n || (a ? "border" : "content"), i, o) + "px"
    }

    function O(e, t, n, i, r) {
        return new O.prototype.init(e, t, n, i, r)
    }

    function D() {
        return setTimeout(function () {
            mn = void 0
        }), mn = ot.now()
    }

    function I(e, t) {
        var n, i = {height: e}, r = 0;
        for (t = t ? 1 : 0; 4 > r; r += 2 - t)n = $t[r], i["margin" + n] = i["padding" + n] = e;
        return t && (i.opacity = i.width = e), i
    }

    function M(e, t, n) {
        for (var i, r = (wn[t] || []).concat(wn["*"]), o = 0, a = r.length; a > o; o++)if (i = r[o].call(n, t, e))return i
    }

    function P(e, t, n) {
        var i, r, o, a, s, l, u, c, d = this, p = {}, h = e.style, f = e.nodeType && Nt(e), m = ot._data(e, "fxshow");
        n.queue || (s = ot._queueHooks(e, "fx"), null == s.unqueued && (s.unqueued = 0, l = s.empty.fire, s.empty.fire = function () {
            s.unqueued || l()
        }), s.unqueued++, d.always(function () {
            d.always(function () {
                s.unqueued--, ot.queue(e, "fx").length || s.empty.fire()
            })
        })), 1 === e.nodeType && ("height" in t || "width" in t) && (n.overflow = [h.overflow, h.overflowX, h.overflowY], u = ot.css(e, "display"), c = T(e.nodeName), "none" === u && (u = c), "inline" === u && "none" === ot.css(e, "float") && (it.inlineBlockNeedsLayout && "inline" !== c ? h.zoom = 1 : h.display = "inline-block")), n.overflow && (h.overflow = "hidden", it.shrinkWrapBlocks() || d.always(function () {
            h.overflow = n.overflow[0], h.overflowX = n.overflow[1], h.overflowY = n.overflow[2]
        }));
        for (i in t)if (r = t[i], vn.exec(r)) {
            if (delete t[i], o = o || "toggle" === r, r === (f ? "hide" : "show")) {
                if ("show" !== r || !m || void 0 === m[i])continue;
                f = !0
            }
            p[i] = m && m[i] || ot.style(e, i)
        }
        if (!ot.isEmptyObject(p)) {
            m ? "hidden" in m && (f = m.hidden) : m = ot._data(e, "fxshow", {}), o && (m.hidden = !f), f ? ot(e).show() : d.done(function () {
                ot(e).hide()
            }), d.done(function () {
                var t;
                ot._removeData(e, "fxshow");
                for (t in p)ot.style(e, t, p[t])
            });
            for (i in p)a = M(f ? m[i] : 0, i, d), i in m || (m[i] = a.start, f && (a.end = a.start, a.start = "width" === i || "height" === i ? 1 : 0))
        }
    }

    function q(e, t) {
        var n, i, r, o, a;
        for (n in e)if (i = ot.camelCase(n), r = t[i], o = e[n], ot.isArray(o) && (r = o[1], o = e[n] = o[0]), n !== i && (e[i] = o, delete e[n]), a = ot.cssHooks[i], a && "expand" in a) {
            o = a.expand(o), delete e[i];
            for (n in o)n in e || (e[n] = o[n], t[n] = r)
        } else t[i] = r
    }

    function R(e, t, n) {
        var i, r, o = 0, a = xn.length, s = ot.Deferred().always(function () {
            delete l.elem
        }), l = function () {
            if (r)return !1;
            for (var t = mn || D(), n = Math.max(0, u.startTime + u.duration - t), i = n / u.duration || 0, o = 1 - i, a = 0, l = u.tweens.length; l > a; a++)u.tweens[a].run(o);
            return s.notifyWith(e, [u, o, n]), 1 > o && l ? n : (s.resolveWith(e, [u]), !1)
        }, u = s.promise({
            elem: e,
            props: ot.extend({}, t),
            opts: ot.extend(!0, {specialEasing: {}}, n),
            originalProperties: t,
            originalOptions: n,
            startTime: mn || D(),
            duration: n.duration,
            tweens: [],
            createTween: function (t, n) {
                var i = ot.Tween(e, u.opts, t, n, u.opts.specialEasing[t] || u.opts.easing);
                return u.tweens.push(i), i
            },
            stop: function (t) {
                var n = 0, i = t ? u.tweens.length : 0;
                if (r)return this;
                for (r = !0; i > n; n++)u.tweens[n].run(1);
                return t ? s.resolveWith(e, [u, t]) : s.rejectWith(e, [u, t]), this
            }
        }), c = u.props;
        for (q(c, u.opts.specialEasing); a > o; o++)if (i = xn[o].call(u, e, c, u.opts))return i;
        return ot.map(c, M, u), ot.isFunction(u.opts.start) && u.opts.start.call(e, u), ot.fx.timer(ot.extend(l, {
            elem: e,
            anim: u,
            queue: u.opts.queue
        })), u.progress(u.opts.progress).done(u.opts.done, u.opts.complete).fail(u.opts.fail).always(u.opts.always)
    }

    function F(e) {
        return function (t, n) {
            "string" != typeof t && (n = t, t = "*");
            var i, r = 0, o = t.toLowerCase().match(xt) || [];
            if (ot.isFunction(n))for (; i = o[r++];)"+" === i.charAt(0) ? (i = i.slice(1) || "*", (e[i] = e[i] || []).unshift(n)) : (e[i] = e[i] || []).push(n)
        }
    }

    function z(e, t, n, i) {
        function r(s) {
            var l;
            return o[s] = !0, ot.each(e[s] || [], function (e, s) {
                var u = s(t, n, i);
                return "string" != typeof u || a || o[u] ? a ? !(l = u) : void 0 : (t.dataTypes.unshift(u), r(u), !1)
            }), l
        }

        var o = {}, a = e === Wn;
        return r(t.dataTypes[0]) || !o["*"] && r("*")
    }

    function L(e, t) {
        var n, i, r = ot.ajaxSettings.flatOptions || {};
        for (i in t)void 0 !== t[i] && ((r[i] ? e : n || (n = {}))[i] = t[i]);
        return n && ot.extend(!0, e, n), e
    }

    function H(e, t, n) {
        for (var i, r, o, a, s = e.contents, l = e.dataTypes; "*" === l[0];)l.shift(), void 0 === r && (r = e.mimeType || t.getResponseHeader("Content-Type"));
        if (r)for (a in s)if (s[a] && s[a].test(r)) {
            l.unshift(a);
            break
        }
        if (l[0] in n)o = l[0]; else {
            for (a in n) {
                if (!l[0] || e.converters[a + " " + l[0]]) {
                    o = a;
                    break
                }
                i || (i = a)
            }
            o = o || i
        }
        return o ? (o !== l[0] && l.unshift(o), n[o]) : void 0
    }

    function B(e, t, n, i) {
        var r, o, a, s, l, u = {}, c = e.dataTypes.slice();
        if (c[1])for (a in e.converters)u[a.toLowerCase()] = e.converters[a];
        for (o = c.shift(); o;)if (e.responseFields[o] && (n[e.responseFields[o]] = t), !l && i && e.dataFilter && (t = e.dataFilter(t, e.dataType)), l = o, o = c.shift())if ("*" === o)o = l; else if ("*" !== l && l !== o) {
            if (a = u[l + " " + o] || u["* " + o], !a)for (r in u)if (s = r.split(" "), s[1] === o && (a = u[l + " " + s[0]] || u["* " + s[0]])) {
                a === !0 ? a = u[r] : u[r] !== !0 && (o = s[0], c.unshift(s[1]));
                break
            }
            if (a !== !0)if (a && e["throws"])t = a(t); else try {
                t = a(t)
            } catch (d) {
                return {state: "parsererror", error: a ? d : "No conversion from " + l + " to " + o}
            }
        }
        return {state: "success", data: t}
    }

    function V(e, t, n, i) {
        var r;
        if (ot.isArray(t))ot.each(t, function (t, r) {
            n || Jn.test(e) ? i(e, r) : V(e + "[" + ("object" == typeof r ? t : "") + "]", r, n, i)
        }); else if (n || "object" !== ot.type(t))i(e, t); else for (r in t)V(e + "[" + r + "]", t[r], n, i)
    }

    function W() {
        try {
            return new e.XMLHttpRequest
        } catch (t) {
        }
    }

    function U() {
        try {
            return new e.ActiveXObject("Microsoft.XMLHTTP")
        } catch (t) {
        }
    }

    function Q(e) {
        return ot.isWindow(e) ? e : 9 === e.nodeType ? e.defaultView || e.parentWindow : !1
    }

    var X = [], J = X.slice, K = X.concat, G = X.push, Z = X.indexOf, Y = {}, et = Y.toString, tt = Y.hasOwnProperty, nt = "".trim, it = {}, rt = "1.11.0", ot = function (e, t) {
        return new ot.fn.init(e, t)
    }, at = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, st = /^-ms-/, lt = /-([\da-z])/gi, ut = function (e, t) {
        return t.toUpperCase()
    };
    ot.fn = ot.prototype = {
        jquery: rt, constructor: ot, selector: "", length: 0, toArray: function () {
            return J.call(this)
        }, get: function (e) {
            return null != e ? 0 > e ? this[e + this.length] : this[e] : J.call(this)
        }, pushStack: function (e) {
            var t = ot.merge(this.constructor(), e);
            return t.prevObject = this, t.context = this.context, t
        }, each: function (e, t) {
            return ot.each(this, e, t)
        }, map: function (e) {
            return this.pushStack(ot.map(this, function (t, n) {
                return e.call(t, n, t)
            }))
        }, slice: function () {
            return this.pushStack(J.apply(this, arguments))
        }, first: function () {
            return this.eq(0)
        }, last: function () {
            return this.eq(-1)
        }, eq: function (e) {
            var t = this.length, n = +e + (0 > e ? t : 0);
            return this.pushStack(n >= 0 && t > n ? [this[n]] : [])
        }, end: function () {
            return this.prevObject || this.constructor(null)
        }, push: G, sort: X.sort, splice: X.splice
    }, ot.extend = ot.fn.extend = function () {
        var e, t, n, i, r, o, a = arguments[0] || {}, s = 1, l = arguments.length, u = !1;
        for ("boolean" == typeof a && (u = a, a = arguments[s] || {}, s++), "object" == typeof a || ot.isFunction(a) || (a = {}), s === l && (a = this, s--); l > s; s++)if (null != (r = arguments[s]))for (i in r)e = a[i], n = r[i], a !== n && (u && n && (ot.isPlainObject(n) || (t = ot.isArray(n))) ? (t ? (t = !1, o = e && ot.isArray(e) ? e : []) : o = e && ot.isPlainObject(e) ? e : {}, a[i] = ot.extend(u, o, n)) : void 0 !== n && (a[i] = n));
        return a
    }, ot.extend({
        expando: "jQuery" + (rt + Math.random()).replace(/\D/g, ""), isReady: !0, error: function (e) {
            throw new Error(e)
        }, noop: function () {
        }, isFunction: function (e) {
            return "function" === ot.type(e)
        }, isArray: Array.isArray || function (e) {
            return "array" === ot.type(e)
        }, isWindow: function (e) {
            return null != e && e == e.window
        }, isNumeric: function (e) {
            return e - parseFloat(e) >= 0
        }, isEmptyObject: function (e) {
            var t;
            for (t in e)return !1;
            return !0
        }, isPlainObject: function (e) {
            var t;
            if (!e || "object" !== ot.type(e) || e.nodeType || ot.isWindow(e))return !1;
            try {
                if (e.constructor && !tt.call(e, "constructor") && !tt.call(e.constructor.prototype, "isPrototypeOf"))return !1
            } catch (n) {
                return !1
            }
            if (it.ownLast)for (t in e)return tt.call(e, t);
            for (t in e);
            return void 0 === t || tt.call(e, t)
        }, type: function (e) {
            return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? Y[et.call(e)] || "object" : typeof e
        }, globalEval: function (t) {
            t && ot.trim(t) && (e.execScript || function (t) {
                e.eval.call(e, t)
            })(t)
        }, camelCase: function (e) {
            return e.replace(st, "ms-").replace(lt, ut)
        }, nodeName: function (e, t) {
            return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
        }, each: function (e, t, i) {
            var r, o = 0, a = e.length, s = n(e);
            if (i) {
                if (s)for (; a > o && (r = t.apply(e[o], i), r !== !1); o++); else for (o in e)if (r = t.apply(e[o], i), r === !1)break
            } else if (s)for (; a > o && (r = t.call(e[o], o, e[o]), r !== !1); o++); else for (o in e)if (r = t.call(e[o], o, e[o]), r === !1)break;
            return e
        }, trim: nt && !nt.call("\ufeff\xa0") ? function (e) {
            return null == e ? "" : nt.call(e)
        } : function (e) {
            return null == e ? "" : (e + "").replace(at, "")
        }, makeArray: function (e, t) {
            var i = t || [];
            return null != e && (n(Object(e)) ? ot.merge(i, "string" == typeof e ? [e] : e) : G.call(i, e)), i
        }, inArray: function (e, t, n) {
            var i;
            if (t) {
                if (Z)return Z.call(t, e, n);
                for (i = t.length, n = n ? 0 > n ? Math.max(0, i + n) : n : 0; i > n; n++)if (n in t && t[n] === e)return n
            }
            return -1
        }, merge: function (e, t) {
            for (var n = +t.length, i = 0, r = e.length; n > i;)e[r++] = t[i++];
            if (n !== n)for (; void 0 !== t[i];)e[r++] = t[i++];
            return e.length = r, e
        }, grep: function (e, t, n) {
            for (var i, r = [], o = 0, a = e.length, s = !n; a > o; o++)i = !t(e[o], o), i !== s && r.push(e[o]);
            return r
        }, map: function (e, t, i) {
            var r, o = 0, a = e.length, s = n(e), l = [];
            if (s)for (; a > o; o++)r = t(e[o], o, i), null != r && l.push(r); else for (o in e)r = t(e[o], o, i), null != r && l.push(r);
            return K.apply([], l)
        }, guid: 1, proxy: function (e, t) {
            var n, i, r;
            return "string" == typeof t && (r = e[t], t = e, e = r), ot.isFunction(e) ? (n = J.call(arguments, 2), i = function () {
                return e.apply(t || this, n.concat(J.call(arguments)))
            }, i.guid = e.guid = e.guid || ot.guid++, i) : void 0
        }, now: function () {
            return +new Date
        }, support: it
    }), ot.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function (e, t) {
        Y["[object " + t + "]"] = t.toLowerCase()
    });
    var ct = function (e) {
        function t(e, t, n, i) {
            var r, o, a, s, l, u, d, f, m, g;
            if ((t ? t.ownerDocument || t : z) !== O && j(t), t = t || O, n = n || [], !e || "string" != typeof e)return n;
            if (1 !== (s = t.nodeType) && 9 !== s)return [];
            if (I && !i) {
                if (r = yt.exec(e))if (a = r[1]) {
                    if (9 === s) {
                        if (o = t.getElementById(a), !o || !o.parentNode)return n;
                        if (o.id === a)return n.push(o), n
                    } else if (t.ownerDocument && (o = t.ownerDocument.getElementById(a)) && R(t, o) && o.id === a)return n.push(o), n
                } else {
                    if (r[2])return Y.apply(n, t.getElementsByTagName(e)), n;
                    if ((a = r[3]) && _.getElementsByClassName && t.getElementsByClassName)return Y.apply(n, t.getElementsByClassName(a)), n
                }
                if (_.qsa && (!M || !M.test(e))) {
                    if (f = d = F, m = t, g = 9 === s && e, 1 === s && "object" !== t.nodeName.toLowerCase()) {
                        for (u = p(e), (d = t.getAttribute("id")) ? f = d.replace(xt, "\\$&") : t.setAttribute("id", f), f = "[id='" + f + "'] ", l = u.length; l--;)u[l] = f + h(u[l]);
                        m = bt.test(e) && c(t.parentNode) || t, g = u.join(",")
                    }
                    if (g)try {
                        return Y.apply(n, m.querySelectorAll(g)), n
                    } catch (v) {
                    } finally {
                        d || t.removeAttribute("id")
                    }
                }
            }
            return w(e.replace(lt, "$1"), t, n, i)
        }

        function n() {
            function e(n, i) {
                return t.push(n + " ") > C.cacheLength && delete e[t.shift()], e[n + " "] = i
            }

            var t = [];
            return e
        }

        function i(e) {
            return e[F] = !0, e
        }

        function r(e) {
            var t = O.createElement("div");
            try {
                return !!e(t)
            } catch (n) {
                return !1
            } finally {
                t.parentNode && t.parentNode.removeChild(t), t = null
            }
        }

        function o(e, t) {
            for (var n = e.split("|"), i = e.length; i--;)C.attrHandle[n[i]] = t
        }

        function a(e, t) {
            var n = t && e, i = n && 1 === e.nodeType && 1 === t.nodeType && (~t.sourceIndex || X) - (~e.sourceIndex || X);
            if (i)return i;
            if (n)for (; n = n.nextSibling;)if (n === t)return -1;
            return e ? 1 : -1
        }

        function s(e) {
            return function (t) {
                var n = t.nodeName.toLowerCase();
                return "input" === n && t.type === e
            }
        }

        function l(e) {
            return function (t) {
                var n = t.nodeName.toLowerCase();
                return ("input" === n || "button" === n) && t.type === e
            }
        }

        function u(e) {
            return i(function (t) {
                return t = +t, i(function (n, i) {
                    for (var r, o = e([], n.length, t), a = o.length; a--;)n[r = o[a]] && (n[r] = !(i[r] = n[r]))
                })
            })
        }

        function c(e) {
            return e && typeof e.getElementsByTagName !== Q && e
        }

        function d() {
        }

        function p(e, n) {
            var i, r, o, a, s, l, u, c = V[e + " "];
            if (c)return n ? 0 : c.slice(0);
            for (s = e, l = [], u = C.preFilter; s;) {
                (!i || (r = ut.exec(s))) && (r && (s = s.slice(r[0].length) || s), l.push(o = [])), i = !1, (r = ct.exec(s)) && (i = r.shift(), o.push({
                    value: i,
                    type: r[0].replace(lt, " ")
                }), s = s.slice(i.length));
                for (a in C.filter)!(r = ft[a].exec(s)) || u[a] && !(r = u[a](r)) || (i = r.shift(), o.push({
                    value: i,
                    type: a,
                    matches: r
                }), s = s.slice(i.length));
                if (!i)break
            }
            return n ? s.length : s ? t.error(e) : V(e, l).slice(0)
        }

        function h(e) {
            for (var t = 0, n = e.length, i = ""; n > t; t++)i += e[t].value;
            return i
        }

        function f(e, t, n) {
            var i = t.dir, r = n && "parentNode" === i, o = H++;
            return t.first ? function (t, n, o) {
                for (; t = t[i];)if (1 === t.nodeType || r)return e(t, n, o)
            } : function (t, n, a) {
                var s, l, u = [L, o];
                if (a) {
                    for (; t = t[i];)if ((1 === t.nodeType || r) && e(t, n, a))return !0
                } else for (; t = t[i];)if (1 === t.nodeType || r) {
                    if (l = t[F] || (t[F] = {}), (s = l[i]) && s[0] === L && s[1] === o)return u[2] = s[2];
                    if (l[i] = u, u[2] = e(t, n, a))return !0
                }
            }
        }

        function m(e) {
            return e.length > 1 ? function (t, n, i) {
                for (var r = e.length; r--;)if (!e[r](t, n, i))return !1;
                return !0
            } : e[0]
        }

        function g(e, t, n, i, r) {
            for (var o, a = [], s = 0, l = e.length, u = null != t; l > s; s++)(o = e[s]) && (!n || n(o, i, r)) && (a.push(o), u && t.push(s));
            return a
        }

        function v(e, t, n, r, o, a) {
            return r && !r[F] && (r = v(r)), o && !o[F] && (o = v(o, a)), i(function (i, a, s, l) {
                var u, c, d, p = [], h = [], f = a.length, m = i || x(t || "*", s.nodeType ? [s] : s, []), v = !e || !i && t ? m : g(m, p, e, s, l), y = n ? o || (i ? e : f || r) ? [] : a : v;
                if (n && n(v, y, s, l), r)for (u = g(y, h), r(u, [], s, l), c = u.length; c--;)(d = u[c]) && (y[h[c]] = !(v[h[c]] = d));
                if (i) {
                    if (o || e) {
                        if (o) {
                            for (u = [], c = y.length; c--;)(d = y[c]) && u.push(v[c] = d);
                            o(null, y = [], u, l)
                        }
                        for (c = y.length; c--;)(d = y[c]) && (u = o ? tt.call(i, d) : p[c]) > -1 && (i[u] = !(a[u] = d))
                    }
                } else y = g(y === a ? y.splice(f, y.length) : y), o ? o(null, a, y, l) : Y.apply(a, y)
            })
        }

        function y(e) {
            for (var t, n, i, r = e.length, o = C.relative[e[0].type], a = o || C.relative[" "], s = o ? 1 : 0, l = f(function (e) {
                return e === t
            }, a, !0), u = f(function (e) {
                return tt.call(t, e) > -1
            }, a, !0), c = [function (e, n, i) {
                return !o && (i || n !== $) || ((t = n).nodeType ? l(e, n, i) : u(e, n, i))
            }]; r > s; s++)if (n = C.relative[e[s].type])c = [f(m(c), n)]; else {
                if (n = C.filter[e[s].type].apply(null, e[s].matches), n[F]) {
                    for (i = ++s; r > i && !C.relative[e[i].type]; i++);
                    return v(s > 1 && m(c), s > 1 && h(e.slice(0, s - 1).concat({value: " " === e[s - 2].type ? "*" : ""})).replace(lt, "$1"), n, i > s && y(e.slice(s, i)), r > i && y(e = e.slice(i)), r > i && h(e))
                }
                c.push(n)
            }
            return m(c)
        }

        function b(e, n) {
            var r = n.length > 0, o = e.length > 0, a = function (i, a, s, l, u) {
                var c, d, p, h = 0, f = "0", m = i && [], v = [], y = $, b = i || o && C.find.TAG("*", u), x = L += null == y ? 1 : Math.random() || .1, w = b.length;
                for (u && ($ = a !== O && a); f !== w && null != (c = b[f]); f++) {
                    if (o && c) {
                        for (d = 0; p = e[d++];)if (p(c, a, s)) {
                            l.push(c);
                            break
                        }
                        u && (L = x)
                    }
                    r && ((c = !p && c) && h--, i && m.push(c))
                }
                if (h += f, r && f !== h) {
                    for (d = 0; p = n[d++];)p(m, v, a, s);
                    if (i) {
                        if (h > 0)for (; f--;)m[f] || v[f] || (v[f] = G.call(l));
                        v = g(v)
                    }
                    Y.apply(l, v), u && !i && v.length > 0 && h + n.length > 1 && t.uniqueSort(l)
                }
                return u && (L = x, $ = y), m
            };
            return r ? i(a) : a
        }

        function x(e, n, i) {
            for (var r = 0, o = n.length; o > r; r++)t(e, n[r], i);
            return i
        }

        function w(e, t, n, i) {
            var r, o, a, s, l, u = p(e);
            if (!i && 1 === u.length) {
                if (o = u[0] = u[0].slice(0), o.length > 2 && "ID" === (a = o[0]).type && _.getById && 9 === t.nodeType && I && C.relative[o[1].type]) {
                    if (t = (C.find.ID(a.matches[0].replace(wt, kt), t) || [])[0], !t)return n;
                    e = e.slice(o.shift().value.length)
                }
                for (r = ft.needsContext.test(e) ? 0 : o.length; r-- && (a = o[r], !C.relative[s = a.type]);)if ((l = C.find[s]) && (i = l(a.matches[0].replace(wt, kt), bt.test(o[0].type) && c(t.parentNode) || t))) {
                    if (o.splice(r, 1), e = i.length && h(o), !e)return Y.apply(n, i), n;
                    break
                }
            }
            return E(e, u)(i, t, !I, n, bt.test(e) && c(t.parentNode) || t), n
        }

        var k, _, C, T, S, E, $, N, A, j, O, D, I, M, P, q, R, F = "sizzle" + -new Date, z = e.document, L = 0, H = 0, B = n(), V = n(), W = n(), U = function (e, t) {
            return e === t && (A = !0), 0
        }, Q = "undefined", X = 1 << 31, J = {}.hasOwnProperty, K = [], G = K.pop, Z = K.push, Y = K.push, et = K.slice, tt = K.indexOf || function (e) {
                for (var t = 0, n = this.length; n > t; t++)if (this[t] === e)return t;
                return -1
            }, nt = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped", it = "[\\x20\\t\\r\\n\\f]", rt = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+", ot = rt.replace("w", "w#"), at = "\\[" + it + "*(" + rt + ")" + it + "*(?:([*^$|!~]?=)" + it + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + ot + ")|)|)" + it + "*\\]", st = ":(" + rt + ")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|" + at.replace(3, 8) + ")*)|.*)\\)|)", lt = new RegExp("^" + it + "+|((?:^|[^\\\\])(?:\\\\.)*)" + it + "+$", "g"), ut = new RegExp("^" + it + "*," + it + "*"), ct = new RegExp("^" + it + "*([>+~]|" + it + ")" + it + "*"), dt = new RegExp("=" + it + "*([^\\]'\"]*?)" + it + "*\\]", "g"), pt = new RegExp(st), ht = new RegExp("^" + ot + "$"), ft = {
            ID: new RegExp("^#(" + rt + ")"),
            CLASS: new RegExp("^\\.(" + rt + ")"),
            TAG: new RegExp("^(" + rt.replace("w", "w*") + ")"),
            ATTR: new RegExp("^" + at),
            PSEUDO: new RegExp("^" + st),
            CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + it + "*(even|odd|(([+-]|)(\\d*)n|)" + it + "*(?:([+-]|)" + it + "*(\\d+)|))" + it + "*\\)|)", "i"),
            bool: new RegExp("^(?:" + nt + ")$", "i"),
            needsContext: new RegExp("^" + it + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + it + "*((?:-\\d)?\\d*)" + it + "*\\)|)(?=[^-]|$)", "i")
        }, mt = /^(?:input|select|textarea|button)$/i, gt = /^h\d$/i, vt = /^[^{]+\{\s*\[native \w/, yt = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, bt = /[+~]/, xt = /'|\\/g, wt = new RegExp("\\\\([\\da-f]{1,6}" + it + "?|(" + it + ")|.)", "ig"), kt = function (e, t, n) {
            var i = "0x" + t - 65536;
            return i !== i || n ? t : 0 > i ? String.fromCharCode(i + 65536) : String.fromCharCode(i >> 10 | 55296, 1023 & i | 56320)
        };
        try {
            Y.apply(K = et.call(z.childNodes), z.childNodes), K[z.childNodes.length].nodeType
        } catch (_t) {
            Y = {
                apply: K.length ? function (e, t) {
                    Z.apply(e, et.call(t))
                } : function (e, t) {
                    for (var n = e.length, i = 0; e[n++] = t[i++];);
                    e.length = n - 1
                }
            }
        }
        _ = t.support = {}, S = t.isXML = function (e) {
            var t = e && (e.ownerDocument || e).documentElement;
            return t ? "HTML" !== t.nodeName : !1
        }, j = t.setDocument = function (e) {
            var t, n = e ? e.ownerDocument || e : z, i = n.defaultView;
            return n !== O && 9 === n.nodeType && n.documentElement ? (O = n, D = n.documentElement, I = !S(n), i && i !== i.top && (i.addEventListener ? i.addEventListener("unload", function () {
                j()
            }, !1) : i.attachEvent && i.attachEvent("onunload", function () {
                j()
            })), _.attributes = r(function (e) {
                return e.className = "i", !e.getAttribute("className")
            }), _.getElementsByTagName = r(function (e) {
                return e.appendChild(n.createComment("")), !e.getElementsByTagName("*").length
            }), _.getElementsByClassName = vt.test(n.getElementsByClassName) && r(function (e) {
                    return e.innerHTML = "<div class='a'></div><div class='a i'></div>", e.firstChild.className = "i", 2 === e.getElementsByClassName("i").length
                }), _.getById = r(function (e) {
                return D.appendChild(e).id = F, !n.getElementsByName || !n.getElementsByName(F).length
            }), _.getById ? (C.find.ID = function (e, t) {
                if (typeof t.getElementById !== Q && I) {
                    var n = t.getElementById(e);
                    return n && n.parentNode ? [n] : []
                }
            }, C.filter.ID = function (e) {
                var t = e.replace(wt, kt);
                return function (e) {
                    return e.getAttribute("id") === t
                }
            }) : (delete C.find.ID, C.filter.ID = function (e) {
                var t = e.replace(wt, kt);
                return function (e) {
                    var n = typeof e.getAttributeNode !== Q && e.getAttributeNode("id");
                    return n && n.value === t
                }
            }), C.find.TAG = _.getElementsByTagName ? function (e, t) {
                return typeof t.getElementsByTagName !== Q ? t.getElementsByTagName(e) : void 0
            } : function (e, t) {
                var n, i = [], r = 0, o = t.getElementsByTagName(e);
                if ("*" === e) {
                    for (; n = o[r++];)1 === n.nodeType && i.push(n);
                    return i
                }
                return o
            }, C.find.CLASS = _.getElementsByClassName && function (e, t) {
                    return typeof t.getElementsByClassName !== Q && I ? t.getElementsByClassName(e) : void 0
                }, P = [], M = [], (_.qsa = vt.test(n.querySelectorAll)) && (r(function (e) {
                e.innerHTML = "<select t=''><option selected=''></option></select>", e.querySelectorAll("[t^='']").length && M.push("[*^$]=" + it + "*(?:''|\"\")"), e.querySelectorAll("[selected]").length || M.push("\\[" + it + "*(?:value|" + nt + ")"), e.querySelectorAll(":checked").length || M.push(":checked")
            }), r(function (e) {
                var t = n.createElement("input");
                t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), e.querySelectorAll("[name=d]").length && M.push("name" + it + "*[*^$|!~]?="), e.querySelectorAll(":enabled").length || M.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), M.push(",.*:")
            })), (_.matchesSelector = vt.test(q = D.webkitMatchesSelector || D.mozMatchesSelector || D.oMatchesSelector || D.msMatchesSelector)) && r(function (e) {
                _.disconnectedMatch = q.call(e, "div"), q.call(e, "[s!='']:x"), P.push("!=", st)
            }), M = M.length && new RegExp(M.join("|")), P = P.length && new RegExp(P.join("|")), t = vt.test(D.compareDocumentPosition), R = t || vt.test(D.contains) ? function (e, t) {
                var n = 9 === e.nodeType ? e.documentElement : e, i = t && t.parentNode;
                return e === i || !(!i || 1 !== i.nodeType || !(n.contains ? n.contains(i) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(i)))
            } : function (e, t) {
                if (t)for (; t = t.parentNode;)if (t === e)return !0;
                return !1
            }, U = t ? function (e, t) {
                if (e === t)return A = !0, 0;
                var i = !e.compareDocumentPosition - !t.compareDocumentPosition;
                return i ? i : (i = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1, 1 & i || !_.sortDetached && t.compareDocumentPosition(e) === i ? e === n || e.ownerDocument === z && R(z, e) ? -1 : t === n || t.ownerDocument === z && R(z, t) ? 1 : N ? tt.call(N, e) - tt.call(N, t) : 0 : 4 & i ? -1 : 1)
            } : function (e, t) {
                if (e === t)return A = !0, 0;
                var i, r = 0, o = e.parentNode, s = t.parentNode, l = [e], u = [t];
                if (!o || !s)return e === n ? -1 : t === n ? 1 : o ? -1 : s ? 1 : N ? tt.call(N, e) - tt.call(N, t) : 0;
                if (o === s)return a(e, t);
                for (i = e; i = i.parentNode;)l.unshift(i);
                for (i = t; i = i.parentNode;)u.unshift(i);
                for (; l[r] === u[r];)r++;
                return r ? a(l[r], u[r]) : l[r] === z ? -1 : u[r] === z ? 1 : 0
            }, n) : O
        }, t.matches = function (e, n) {
            return t(e, null, null, n)
        }, t.matchesSelector = function (e, n) {
            if ((e.ownerDocument || e) !== O && j(e), n = n.replace(dt, "='$1']"), !(!_.matchesSelector || !I || P && P.test(n) || M && M.test(n)))try {
                var i = q.call(e, n);
                if (i || _.disconnectedMatch || e.document && 11 !== e.document.nodeType)return i
            } catch (r) {
            }
            return t(n, O, null, [e]).length > 0
        }, t.contains = function (e, t) {
            return (e.ownerDocument || e) !== O && j(e), R(e, t)
        }, t.attr = function (e, t) {
            (e.ownerDocument || e) !== O && j(e);
            var n = C.attrHandle[t.toLowerCase()], i = n && J.call(C.attrHandle, t.toLowerCase()) ? n(e, t, !I) : void 0;
            return void 0 !== i ? i : _.attributes || !I ? e.getAttribute(t) : (i = e.getAttributeNode(t)) && i.specified ? i.value : null
        }, t.error = function (e) {
            throw new Error("Syntax error, unrecognized expression: " + e)
        }, t.uniqueSort = function (e) {
            var t, n = [], i = 0, r = 0;
            if (A = !_.detectDuplicates, N = !_.sortStable && e.slice(0), e.sort(U), A) {
                for (; t = e[r++];)t === e[r] && (i = n.push(r));
                for (; i--;)e.splice(n[i], 1)
            }
            return N = null, e
        }, T = t.getText = function (e) {
            var t, n = "", i = 0, r = e.nodeType;
            if (r) {
                if (1 === r || 9 === r || 11 === r) {
                    if ("string" == typeof e.textContent)return e.textContent;
                    for (e = e.firstChild; e; e = e.nextSibling)n += T(e)
                } else if (3 === r || 4 === r)return e.nodeValue
            } else for (; t = e[i++];)n += T(t);
            return n
        }, C = t.selectors = {
            cacheLength: 50,
            createPseudo: i,
            match: ft,
            attrHandle: {},
            find: {},
            relative: {
                ">": {dir: "parentNode", first: !0},
                " ": {dir: "parentNode"},
                "+": {dir: "previousSibling", first: !0},
                "~": {dir: "previousSibling"}
            },
            preFilter: {
                ATTR: function (e) {
                    return e[1] = e[1].replace(wt, kt), e[3] = (e[4] || e[5] || "").replace(wt, kt), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                }, CHILD: function (e) {
                    return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || t.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && t.error(e[0]), e
                }, PSEUDO: function (e) {
                    var t, n = !e[5] && e[2];
                    return ft.CHILD.test(e[0]) ? null : (e[3] && void 0 !== e[4] ? e[2] = e[4] : n && pt.test(n) && (t = p(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
                }
            },
            filter: {
                TAG: function (e) {
                    var t = e.replace(wt, kt).toLowerCase();
                    return "*" === e ? function () {
                        return !0
                    } : function (e) {
                        return e.nodeName && e.nodeName.toLowerCase() === t
                    }
                }, CLASS: function (e) {
                    var t = B[e + " "];
                    return t || (t = new RegExp("(^|" + it + ")" + e + "(" + it + "|$)")) && B(e, function (e) {
                            return t.test("string" == typeof e.className && e.className || typeof e.getAttribute !== Q && e.getAttribute("class") || "")
                        })
                }, ATTR: function (e, n, i) {
                    return function (r) {
                        var o = t.attr(r, e);
                        return null == o ? "!=" === n : n ? (o += "", "=" === n ? o === i : "!=" === n ? o !== i : "^=" === n ? i && 0 === o.indexOf(i) : "*=" === n ? i && o.indexOf(i) > -1 : "$=" === n ? i && o.slice(-i.length) === i : "~=" === n ? (" " + o + " ").indexOf(i) > -1 : "|=" === n ? o === i || o.slice(0, i.length + 1) === i + "-" : !1) : !0
                    }
                }, CHILD: function (e, t, n, i, r) {
                    var o = "nth" !== e.slice(0, 3), a = "last" !== e.slice(-4), s = "of-type" === t;
                    return 1 === i && 0 === r ? function (e) {
                        return !!e.parentNode
                    } : function (t, n, l) {
                        var u, c, d, p, h, f, m = o !== a ? "nextSibling" : "previousSibling", g = t.parentNode, v = s && t.nodeName.toLowerCase(), y = !l && !s;
                        if (g) {
                            if (o) {
                                for (; m;) {
                                    for (d = t; d = d[m];)if (s ? d.nodeName.toLowerCase() === v : 1 === d.nodeType)return !1;
                                    f = m = "only" === e && !f && "nextSibling"
                                }
                                return !0
                            }
                            if (f = [a ? g.firstChild : g.lastChild], a && y) {
                                for (c = g[F] || (g[F] = {}), u = c[e] || [], h = u[0] === L && u[1], p = u[0] === L && u[2], d = h && g.childNodes[h]; d = ++h && d && d[m] || (p = h = 0) || f.pop();)if (1 === d.nodeType && ++p && d === t) {
                                    c[e] = [L, h, p];
                                    break
                                }
                            } else if (y && (u = (t[F] || (t[F] = {}))[e]) && u[0] === L)p = u[1]; else for (; (d = ++h && d && d[m] || (p = h = 0) || f.pop()) && ((s ? d.nodeName.toLowerCase() !== v : 1 !== d.nodeType) || !++p || (y && ((d[F] || (d[F] = {}))[e] = [L, p]), d !== t)););
                            return p -= r, p === i || p % i === 0 && p / i >= 0
                        }
                    }
                }, PSEUDO: function (e, n) {
                    var r, o = C.pseudos[e] || C.setFilters[e.toLowerCase()] || t.error("unsupported pseudo: " + e);
                    return o[F] ? o(n) : o.length > 1 ? (r = [e, e, "", n], C.setFilters.hasOwnProperty(e.toLowerCase()) ? i(function (e, t) {
                        for (var i, r = o(e, n), a = r.length; a--;)i = tt.call(e, r[a]), e[i] = !(t[i] = r[a])
                    }) : function (e) {
                        return o(e, 0, r)
                    }) : o
                }
            },
            pseudos: {
                not: i(function (e) {
                    var t = [], n = [], r = E(e.replace(lt, "$1"));
                    return r[F] ? i(function (e, t, n, i) {
                        for (var o, a = r(e, null, i, []), s = e.length; s--;)(o = a[s]) && (e[s] = !(t[s] = o))
                    }) : function (e, i, o) {
                        return t[0] = e, r(t, null, o, n), !n.pop()
                    }
                }), has: i(function (e) {
                    return function (n) {
                        return t(e, n).length > 0
                    }
                }), contains: i(function (e) {
                    return function (t) {
                        return (t.textContent || t.innerText || T(t)).indexOf(e) > -1
                    }
                }), lang: i(function (e) {
                    return ht.test(e || "") || t.error("unsupported lang: " + e), e = e.replace(wt, kt).toLowerCase(), function (t) {
                        var n;
                        do if (n = I ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang"))return n = n.toLowerCase(), n === e || 0 === n.indexOf(e + "-"); while ((t = t.parentNode) && 1 === t.nodeType);
                        return !1
                    }
                }), target: function (t) {
                    var n = e.location && e.location.hash;
                    return n && n.slice(1) === t.id
                }, root: function (e) {
                    return e === D
                }, focus: function (e) {
                    return e === O.activeElement && (!O.hasFocus || O.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                }, enabled: function (e) {
                    return e.disabled === !1
                }, disabled: function (e) {
                    return e.disabled === !0
                }, checked: function (e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && !!e.checked || "option" === t && !!e.selected
                }, selected: function (e) {
                    return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
                }, empty: function (e) {
                    for (e = e.firstChild; e; e = e.nextSibling)if (e.nodeType < 6)return !1;
                    return !0
                }, parent: function (e) {
                    return !C.pseudos.empty(e)
                }, header: function (e) {
                    return gt.test(e.nodeName)
                }, input: function (e) {
                    return mt.test(e.nodeName)
                }, button: function (e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && "button" === e.type || "button" === t
                }, text: function (e) {
                    var t;
                    return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
                }, first: u(function () {
                    return [0]
                }), last: u(function (e, t) {
                    return [t - 1]
                }), eq: u(function (e, t, n) {
                    return [0 > n ? n + t : n]
                }), even: u(function (e, t) {
                    for (var n = 0; t > n; n += 2)e.push(n);
                    return e
                }), odd: u(function (e, t) {
                    for (var n = 1; t > n; n += 2)e.push(n);
                    return e
                }), lt: u(function (e, t, n) {
                    for (var i = 0 > n ? n + t : n; --i >= 0;)e.push(i);
                    return e
                }), gt: u(function (e, t, n) {
                    for (var i = 0 > n ? n + t : n; ++i < t;)e.push(i);
                    return e
                })
            }
        }, C.pseudos.nth = C.pseudos.eq;
        for (k in{radio: !0, checkbox: !0, file: !0, password: !0, image: !0})C.pseudos[k] = s(k);
        for (k in{submit: !0, reset: !0})C.pseudos[k] = l(k);
        return d.prototype = C.filters = C.pseudos, C.setFilters = new d, E = t.compile = function (e, t) {
            var n, i = [], r = [], o = W[e + " "];
            if (!o) {
                for (t || (t = p(e)), n = t.length; n--;)o = y(t[n]), o[F] ? i.push(o) : r.push(o);
                o = W(e, b(r, i))
            }
            return o
        }, _.sortStable = F.split("").sort(U).join("") === F, _.detectDuplicates = !!A, j(), _.sortDetached = r(function (e) {
            return 1 & e.compareDocumentPosition(O.createElement("div"))
        }), r(function (e) {
            return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
        }) || o("type|href|height|width", function (e, t, n) {
            return n ? void 0 : e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
        }), _.attributes && r(function (e) {
            return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
        }) || o("value", function (e, t, n) {
            return n || "input" !== e.nodeName.toLowerCase() ? void 0 : e.defaultValue
        }), r(function (e) {
            return null == e.getAttribute("disabled")
        }) || o(nt, function (e, t, n) {
            var i;
            return n ? void 0 : e[t] === !0 ? t.toLowerCase() : (i = e.getAttributeNode(t)) && i.specified ? i.value : null
        }), t
    }(e);
    ot.find = ct, ot.expr = ct.selectors, ot.expr[":"] = ot.expr.pseudos, ot.unique = ct.uniqueSort, ot.text = ct.getText, ot.isXMLDoc = ct.isXML, ot.contains = ct.contains;
    var dt = ot.expr.match.needsContext, pt = /^<(\w+)\s*\/?>(?:<\/\1>|)$/, ht = /^.[^:#\[\.,]*$/;
    ot.filter = function (e, t, n) {
        var i = t[0];
        return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === i.nodeType ? ot.find.matchesSelector(i, e) ? [i] : [] : ot.find.matches(e, ot.grep(t, function (e) {
            return 1 === e.nodeType
        }))
    }, ot.fn.extend({
        find: function (e) {
            var t, n = [], i = this, r = i.length;
            if ("string" != typeof e)return this.pushStack(ot(e).filter(function () {
                for (t = 0; r > t; t++)if (ot.contains(i[t], this))return !0
            }));
            for (t = 0; r > t; t++)ot.find(e, i[t], n);
            return n = this.pushStack(r > 1 ? ot.unique(n) : n), n.selector = this.selector ? this.selector + " " + e : e, n
        }, filter: function (e) {
            return this.pushStack(i(this, e || [], !1))
        }, not: function (e) {
            return this.pushStack(i(this, e || [], !0))
        }, is: function (e) {
            return !!i(this, "string" == typeof e && dt.test(e) ? ot(e) : e || [], !1).length
        }
    });
    var ft, mt = e.document, gt = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/, vt = ot.fn.init = function (e, t) {
        var n, i;
        if (!e)return this;
        if ("string" == typeof e) {
            if (n = "<" === e.charAt(0) && ">" === e.charAt(e.length - 1) && e.length >= 3 ? [null, e, null] : gt.exec(e), !n || !n[1] && t)return !t || t.jquery ? (t || ft).find(e) : this.constructor(t).find(e);
            if (n[1]) {
                if (t = t instanceof ot ? t[0] : t, ot.merge(this, ot.parseHTML(n[1], t && t.nodeType ? t.ownerDocument || t : mt, !0)), pt.test(n[1]) && ot.isPlainObject(t))for (n in t)ot.isFunction(this[n]) ? this[n](t[n]) : this.attr(n, t[n]);
                return this
            }
            if (i = mt.getElementById(n[2]), i && i.parentNode) {
                if (i.id !== n[2])return ft.find(e);
                this.length = 1, this[0] = i
            }
            return this.context = mt, this.selector = e, this
        }
        return e.nodeType ? (this.context = this[0] = e, this.length = 1, this) : ot.isFunction(e) ? "undefined" != typeof ft.ready ? ft.ready(e) : e(ot) : (void 0 !== e.selector && (this.selector = e.selector, this.context = e.context), ot.makeArray(e, this))
    };
    vt.prototype = ot.fn, ft = ot(mt);
    var yt = /^(?:parents|prev(?:Until|All))/, bt = {children: !0, contents: !0, next: !0, prev: !0};
    ot.extend({
        dir: function (e, t, n) {
            for (var i = [], r = e[t]; r && 9 !== r.nodeType && (void 0 === n || 1 !== r.nodeType || !ot(r).is(n));)1 === r.nodeType && i.push(r), r = r[t];
            return i
        }, sibling: function (e, t) {
            for (var n = []; e; e = e.nextSibling)1 === e.nodeType && e !== t && n.push(e);
            return n
        }
    }), ot.fn.extend({
        has: function (e) {
            var t, n = ot(e, this), i = n.length;
            return this.filter(function () {
                for (t = 0; i > t; t++)if (ot.contains(this, n[t]))return !0
            })
        }, closest: function (e, t) {
            for (var n, i = 0, r = this.length, o = [], a = dt.test(e) || "string" != typeof e ? ot(e, t || this.context) : 0; r > i; i++)for (n = this[i]; n && n !== t; n = n.parentNode)if (n.nodeType < 11 && (a ? a.index(n) > -1 : 1 === n.nodeType && ot.find.matchesSelector(n, e))) {
                o.push(n);
                break
            }
            return this.pushStack(o.length > 1 ? ot.unique(o) : o)
        }, index: function (e) {
            return e ? "string" == typeof e ? ot.inArray(this[0], ot(e)) : ot.inArray(e.jquery ? e[0] : e, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        }, add: function (e, t) {
            return this.pushStack(ot.unique(ot.merge(this.get(), ot(e, t))))
        }, addBack: function (e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
        }
    }), ot.each({
        parent: function (e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null
        }, parents: function (e) {
            return ot.dir(e, "parentNode")
        }, parentsUntil: function (e, t, n) {
            return ot.dir(e, "parentNode", n)
        }, next: function (e) {
            return r(e, "nextSibling")
        }, prev: function (e) {
            return r(e, "previousSibling")
        }, nextAll: function (e) {
            return ot.dir(e, "nextSibling")
        }, prevAll: function (e) {
            return ot.dir(e, "previousSibling")
        }, nextUntil: function (e, t, n) {
            return ot.dir(e, "nextSibling", n)
        }, prevUntil: function (e, t, n) {
            return ot.dir(e, "previousSibling", n)
        }, siblings: function (e) {
            return ot.sibling((e.parentNode || {}).firstChild, e)
        }, children: function (e) {
            return ot.sibling(e.firstChild)
        }, contents: function (e) {
            return ot.nodeName(e, "iframe") ? e.contentDocument || e.contentWindow.document : ot.merge([], e.childNodes)
        }
    }, function (e, t) {
        ot.fn[e] = function (n, i) {
            var r = ot.map(this, t, n);
            return "Until" !== e.slice(-5) && (i = n), i && "string" == typeof i && (r = ot.filter(i, r)), this.length > 1 && (bt[e] || (r = ot.unique(r)), yt.test(e) && (r = r.reverse())), this.pushStack(r)
        }
    });
    var xt = /\S+/g, wt = {};
    ot.Callbacks = function (e) {
        e = "string" == typeof e ? wt[e] || o(e) : ot.extend({}, e);
        var t, n, i, r, a, s, l = [], u = !e.once && [], c = function (o) {
            for (n = e.memory && o, i = !0, a = s || 0, s = 0, r = l.length, t = !0; l && r > a; a++)if (l[a].apply(o[0], o[1]) === !1 && e.stopOnFalse) {
                n = !1;
                break
            }
            t = !1, l && (u ? u.length && c(u.shift()) : n ? l = [] : d.disable())
        }, d = {
            add: function () {
                if (l) {
                    var i = l.length;
                    !function o(t) {
                        ot.each(t, function (t, n) {
                            var i = ot.type(n);
                            "function" === i ? e.unique && d.has(n) || l.push(n) : n && n.length && "string" !== i && o(n)
                        })
                    }(arguments), t ? r = l.length : n && (s = i, c(n))
                }
                return this
            }, remove: function () {
                return l && ot.each(arguments, function (e, n) {
                    for (var i; (i = ot.inArray(n, l, i)) > -1;)l.splice(i, 1), t && (r >= i && r--, a >= i && a--)
                }), this
            }, has: function (e) {
                return e ? ot.inArray(e, l) > -1 : !(!l || !l.length)
            }, empty: function () {
                return l = [], r = 0, this
            }, disable: function () {
                return l = u = n = void 0, this
            }, disabled: function () {
                return !l
            }, lock: function () {
                return u = void 0, n || d.disable(), this
            }, locked: function () {
                return !u
            }, fireWith: function (e, n) {
                return !l || i && !u || (n = n || [], n = [e, n.slice ? n.slice() : n], t ? u.push(n) : c(n)), this
            }, fire: function () {
                return d.fireWith(this, arguments), this
            }, fired: function () {
                return !!i
            }
        };
        return d
    }, ot.extend({
        Deferred: function (e) {
            var t = [["resolve", "done", ot.Callbacks("once memory"), "resolved"], ["reject", "fail", ot.Callbacks("once memory"), "rejected"], ["notify", "progress", ot.Callbacks("memory")]], n = "pending", i = {
                state: function () {
                    return n
                }, always: function () {
                    return r.done(arguments).fail(arguments), this
                }, then: function () {
                    var e = arguments;
                    return ot.Deferred(function (n) {
                        ot.each(t, function (t, o) {
                            var a = ot.isFunction(e[t]) && e[t];
                            r[o[1]](function () {
                                var e = a && a.apply(this, arguments);
                                e && ot.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[o[0] + "With"](this === i ? n.promise() : this, a ? [e] : arguments)
                            })
                        }), e = null
                    }).promise()
                }, promise: function (e) {
                    return null != e ? ot.extend(e, i) : i
                }
            }, r = {};
            return i.pipe = i.then, ot.each(t, function (e, o) {
                var a = o[2], s = o[3];
                i[o[1]] = a.add, s && a.add(function () {
                    n = s
                }, t[1 ^ e][2].disable, t[2][2].lock), r[o[0]] = function () {
                    return r[o[0] + "With"](this === r ? i : this, arguments), this
                }, r[o[0] + "With"] = a.fireWith
            }), i.promise(r), e && e.call(r, r), r
        }, when: function (e) {
            var t, n, i, r = 0, o = J.call(arguments), a = o.length, s = 1 !== a || e && ot.isFunction(e.promise) ? a : 0, l = 1 === s ? e : ot.Deferred(), u = function (e, n, i) {
                return function (r) {
                    n[e] = this, i[e] = arguments.length > 1 ? J.call(arguments) : r, i === t ? l.notifyWith(n, i) : --s || l.resolveWith(n, i)
                }
            };
            if (a > 1)for (t = new Array(a), n = new Array(a), i = new Array(a); a > r; r++)o[r] && ot.isFunction(o[r].promise) ? o[r].promise().done(u(r, i, o)).fail(l.reject).progress(u(r, n, t)) : --s;
            return s || l.resolveWith(i, o), l.promise()
        }
    });
    var kt;
    ot.fn.ready = function (e) {
        return ot.ready.promise().done(e), this
    }, ot.extend({
        isReady: !1, readyWait: 1, holdReady: function (e) {
            e ? ot.readyWait++ : ot.ready(!0)
        }, ready: function (e) {
            if (e === !0 ? !--ot.readyWait : !ot.isReady) {
                if (!mt.body)return setTimeout(ot.ready);
                ot.isReady = !0, e !== !0 && --ot.readyWait > 0 || (kt.resolveWith(mt, [ot]), ot.fn.trigger && ot(mt).trigger("ready").off("ready"))
            }
        }
    }), ot.ready.promise = function (t) {
        if (!kt)if (kt = ot.Deferred(), "complete" === mt.readyState)setTimeout(ot.ready); else if (mt.addEventListener)mt.addEventListener("DOMContentLoaded", s, !1), e.addEventListener("load", s, !1); else {
            mt.attachEvent("onreadystatechange", s), e.attachEvent("onload", s);
            var n = !1;
            try {
                n = null == e.frameElement && mt.documentElement
            } catch (i) {
            }
            n && n.doScroll && !function r() {
                if (!ot.isReady) {
                    try {
                        n.doScroll("left")
                    } catch (e) {
                        return setTimeout(r, 50)
                    }
                    a(), ot.ready()
                }
            }()
        }
        return kt.promise(t)
    };
    var _t, Ct = "undefined";
    for (_t in ot(it))break;
    it.ownLast = "0" !== _t, it.inlineBlockNeedsLayout = !1, ot(function () {
        var e, t, n = mt.getElementsByTagName("body")[0];
        n && (e = mt.createElement("div"), e.style.cssText = "border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px", t = mt.createElement("div"), n.appendChild(e).appendChild(t), typeof t.style.zoom !== Ct && (t.style.cssText = "border:0;margin:0;width:1px;padding:1px;display:inline;zoom:1", (it.inlineBlockNeedsLayout = 3 === t.offsetWidth) && (n.style.zoom = 1)), n.removeChild(e), e = t = null)
    }), function () {
        var e = mt.createElement("div");
        if (null == it.deleteExpando) {
            it.deleteExpando = !0;
            try {
                delete e.test
            } catch (t) {
                it.deleteExpando = !1
            }
        }
        e = null
    }(), ot.acceptData = function (e) {
        var t = ot.noData[(e.nodeName + " ").toLowerCase()], n = +e.nodeType || 1;
        return 1 !== n && 9 !== n ? !1 : !t || t !== !0 && e.getAttribute("classid") === t
    };
    var Tt = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/, St = /([A-Z])/g;
    ot.extend({
        cache: {},
        noData: {"applet ": !0, "embed ": !0, "object ": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"},
        hasData: function (e) {
            return e = e.nodeType ? ot.cache[e[ot.expando]] : e[ot.expando], !!e && !u(e)
        },
        data: function (e, t, n) {
            return c(e, t, n)
        },
        removeData: function (e, t) {
            return d(e, t)
        },
        _data: function (e, t, n) {
            return c(e, t, n, !0)
        },
        _removeData: function (e, t) {
            return d(e, t, !0)
        }
    }), ot.fn.extend({
        data: function (e, t) {
            var n, i, r, o = this[0], a = o && o.attributes;
            if (void 0 === e) {
                if (this.length && (r = ot.data(o), 1 === o.nodeType && !ot._data(o, "parsedAttrs"))) {
                    for (n = a.length; n--;)i = a[n].name, 0 === i.indexOf("data-") && (i = ot.camelCase(i.slice(5)), l(o, i, r[i]));
                    ot._data(o, "parsedAttrs", !0)
                }
                return r
            }
            return "object" == typeof e ? this.each(function () {
                ot.data(this, e)
            }) : arguments.length > 1 ? this.each(function () {
                ot.data(this, e, t)
            }) : o ? l(o, e, ot.data(o, e)) : void 0
        }, removeData: function (e) {
            return this.each(function () {
                ot.removeData(this, e)
            })
        }
    }), ot.extend({
        queue: function (e, t, n) {
            var i;
            return e ? (t = (t || "fx") + "queue", i = ot._data(e, t), n && (!i || ot.isArray(n) ? i = ot._data(e, t, ot.makeArray(n)) : i.push(n)), i || []) : void 0
        }, dequeue: function (e, t) {
            t = t || "fx";
            var n = ot.queue(e, t), i = n.length, r = n.shift(), o = ot._queueHooks(e, t), a = function () {
                ot.dequeue(e, t)
            };
            "inprogress" === r && (r = n.shift(), i--), r && ("fx" === t && n.unshift("inprogress"), delete o.stop, r.call(e, a, o)), !i && o && o.empty.fire()
        }, _queueHooks: function (e, t) {
            var n = t + "queueHooks";
            return ot._data(e, n) || ot._data(e, n, {
                    empty: ot.Callbacks("once memory").add(function () {
                        ot._removeData(e, t + "queue"), ot._removeData(e, n)
                    })
                })
        }
    }), ot.fn.extend({
        queue: function (e, t) {
            var n = 2;
            return "string" != typeof e && (t = e, e = "fx", n--), arguments.length < n ? ot.queue(this[0], e) : void 0 === t ? this : this.each(function () {
                var n = ot.queue(this, e, t);
                ot._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && ot.dequeue(this, e)
            })
        }, dequeue: function (e) {
            return this.each(function () {
                ot.dequeue(this, e)
            })
        }, clearQueue: function (e) {
            return this.queue(e || "fx", [])
        }, promise: function (e, t) {
            var n, i = 1, r = ot.Deferred(), o = this, a = this.length, s = function () {
                --i || r.resolveWith(o, [o])
            };
            for ("string" != typeof e && (t = e, e = void 0), e = e || "fx"; a--;)n = ot._data(o[a], e + "queueHooks"), n && n.empty && (i++, n.empty.add(s));
            return s(), r.promise(t)
        }
    });
    var Et = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source, $t = ["Top", "Right", "Bottom", "Left"], Nt = function (e, t) {
        return e = t || e, "none" === ot.css(e, "display") || !ot.contains(e.ownerDocument, e)
    }, At = ot.access = function (e, t, n, i, r, o, a) {
        var s = 0, l = e.length, u = null == n;
        if ("object" === ot.type(n)) {
            r = !0;
            for (s in n)ot.access(e, t, s, n[s], !0, o, a)
        } else if (void 0 !== i && (r = !0, ot.isFunction(i) || (a = !0), u && (a ? (t.call(e, i), t = null) : (u = t, t = function (e, t, n) {
                return u.call(ot(e), n)
            })), t))for (; l > s; s++)t(e[s], n, a ? i : i.call(e[s], s, t(e[s], n)));
        return r ? e : u ? t.call(e) : l ? t(e[0], n) : o
    }, jt = /^(?:checkbox|radio)$/i;
    !function () {
        var e = mt.createDocumentFragment(), t = mt.createElement("div"), n = mt.createElement("input");
        if (t.setAttribute("className", "t"), t.innerHTML = "  <link/><table></table><a href='/a'>a</a>", it.leadingWhitespace = 3 === t.firstChild.nodeType, it.tbody = !t.getElementsByTagName("tbody").length, it.htmlSerialize = !!t.getElementsByTagName("link").length, it.html5Clone = "<:nav></:nav>" !== mt.createElement("nav").cloneNode(!0).outerHTML, n.type = "checkbox", n.checked = !0, e.appendChild(n), it.appendChecked = n.checked, t.innerHTML = "<textarea>x</textarea>", it.noCloneChecked = !!t.cloneNode(!0).lastChild.defaultValue, e.appendChild(t), t.innerHTML = "<input type='radio' checked='checked' name='t'/>", it.checkClone = t.cloneNode(!0).cloneNode(!0).lastChild.checked, it.noCloneEvent = !0, t.attachEvent && (t.attachEvent("onclick", function () {
                it.noCloneEvent = !1
            }), t.cloneNode(!0).click()), null == it.deleteExpando) {
            it.deleteExpando = !0;
            try {
                delete t.test
            } catch (i) {
                it.deleteExpando = !1
            }
        }
        e = t = n = null
    }(), function () {
        var t, n, i = mt.createElement("div");
        for (t in{
            submit: !0,
            change: !0,
            focusin: !0
        })n = "on" + t, (it[t + "Bubbles"] = n in e) || (i.setAttribute(n, "t"), it[t + "Bubbles"] = i.attributes[n].expando === !1);
        i = null
    }();
    var Ot = /^(?:input|select|textarea)$/i, Dt = /^key/, It = /^(?:mouse|contextmenu)|click/, Mt = /^(?:focusinfocus|focusoutblur)$/, Pt = /^([^.]*)(?:\.(.+)|)$/;
    ot.event = {
        global: {},
        add: function (e, t, n, i, r) {
            var o, a, s, l, u, c, d, p, h, f, m, g = ot._data(e);
            if (g) {
                for (n.handler && (l = n, n = l.handler, r = l.selector), n.guid || (n.guid = ot.guid++), (a = g.events) || (a = g.events = {}), (c = g.handle) || (c = g.handle = function (e) {
                    return typeof ot === Ct || e && ot.event.triggered === e.type ? void 0 : ot.event.dispatch.apply(c.elem, arguments)
                }, c.elem = e), t = (t || "").match(xt) || [""], s = t.length; s--;)o = Pt.exec(t[s]) || [], h = m = o[1], f = (o[2] || "").split(".").sort(), h && (u = ot.event.special[h] || {}, h = (r ? u.delegateType : u.bindType) || h, u = ot.event.special[h] || {}, d = ot.extend({
                    type: h,
                    origType: m,
                    data: i,
                    handler: n,
                    guid: n.guid,
                    selector: r,
                    needsContext: r && ot.expr.match.needsContext.test(r),
                    namespace: f.join(".")
                }, l), (p = a[h]) || (p = a[h] = [], p.delegateCount = 0, u.setup && u.setup.call(e, i, f, c) !== !1 || (e.addEventListener ? e.addEventListener(h, c, !1) : e.attachEvent && e.attachEvent("on" + h, c))), u.add && (u.add.call(e, d), d.handler.guid || (d.handler.guid = n.guid)), r ? p.splice(p.delegateCount++, 0, d) : p.push(d), ot.event.global[h] = !0);
                e = null
            }
        },
        remove: function (e, t, n, i, r) {
            var o, a, s, l, u, c, d, p, h, f, m, g = ot.hasData(e) && ot._data(e);
            if (g && (c = g.events)) {
                for (t = (t || "").match(xt) || [""], u = t.length; u--;)if (s = Pt.exec(t[u]) || [], h = m = s[1], f = (s[2] || "").split(".").sort(), h) {
                    for (d = ot.event.special[h] || {}, h = (i ? d.delegateType : d.bindType) || h, p = c[h] || [], s = s[2] && new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)"), l = o = p.length; o--;)a = p[o], !r && m !== a.origType || n && n.guid !== a.guid || s && !s.test(a.namespace) || i && i !== a.selector && ("**" !== i || !a.selector) || (p.splice(o, 1), a.selector && p.delegateCount--, d.remove && d.remove.call(e, a));
                    l && !p.length && (d.teardown && d.teardown.call(e, f, g.handle) !== !1 || ot.removeEvent(e, h, g.handle), delete c[h])
                } else for (h in c)ot.event.remove(e, h + t[u], n, i, !0);
                ot.isEmptyObject(c) && (delete g.handle, ot._removeData(e, "events"))
            }
        },
        trigger: function (t, n, i, r) {
            var o, a, s, l, u, c, d, p = [i || mt], h = tt.call(t, "type") ? t.type : t, f = tt.call(t, "namespace") ? t.namespace.split(".") : [];
            if (s = c = i = i || mt, 3 !== i.nodeType && 8 !== i.nodeType && !Mt.test(h + ot.event.triggered) && (h.indexOf(".") >= 0 && (f = h.split("."), h = f.shift(), f.sort()), a = h.indexOf(":") < 0 && "on" + h, t = t[ot.expando] ? t : new ot.Event(h, "object" == typeof t && t), t.isTrigger = r ? 2 : 3, t.namespace = f.join("."), t.namespace_re = t.namespace ? new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, t.result = void 0, t.target || (t.target = i), n = null == n ? [t] : ot.makeArray(n, [t]), u = ot.event.special[h] || {}, r || !u.trigger || u.trigger.apply(i, n) !== !1)) {
                if (!r && !u.noBubble && !ot.isWindow(i)) {
                    for (l = u.delegateType || h, Mt.test(l + h) || (s = s.parentNode); s; s = s.parentNode)p.push(s), c = s;
                    c === (i.ownerDocument || mt) && p.push(c.defaultView || c.parentWindow || e)
                }
                for (d = 0; (s = p[d++]) && !t.isPropagationStopped();)t.type = d > 1 ? l : u.bindType || h, o = (ot._data(s, "events") || {})[t.type] && ot._data(s, "handle"), o && o.apply(s, n), o = a && s[a], o && o.apply && ot.acceptData(s) && (t.result = o.apply(s, n), t.result === !1 && t.preventDefault());
                if (t.type = h, !r && !t.isDefaultPrevented() && (!u._default || u._default.apply(p.pop(), n) === !1) && ot.acceptData(i) && a && i[h] && !ot.isWindow(i)) {
                    c = i[a], c && (i[a] = null), ot.event.triggered = h;
                    try {
                        i[h]()
                    } catch (m) {
                    }
                    ot.event.triggered = void 0, c && (i[a] = c)
                }
                return t.result
            }
        },
        dispatch: function (e) {
            e = ot.event.fix(e);
            var t, n, i, r, o, a = [], s = J.call(arguments), l = (ot._data(this, "events") || {})[e.type] || [], u = ot.event.special[e.type] || {};
            if (s[0] = e, e.delegateTarget = this, !u.preDispatch || u.preDispatch.call(this, e) !== !1) {
                for (a = ot.event.handlers.call(this, e, l), t = 0; (r = a[t++]) && !e.isPropagationStopped();)for (e.currentTarget = r.elem, o = 0; (i = r.handlers[o++]) && !e.isImmediatePropagationStopped();)(!e.namespace_re || e.namespace_re.test(i.namespace)) && (e.handleObj = i, e.data = i.data, n = ((ot.event.special[i.origType] || {}).handle || i.handler).apply(r.elem, s), void 0 !== n && (e.result = n) === !1 && (e.preventDefault(), e.stopPropagation()));
                return u.postDispatch && u.postDispatch.call(this, e), e.result
            }
        },
        handlers: function (e, t) {
            var n, i, r, o, a = [], s = t.delegateCount, l = e.target;
            if (s && l.nodeType && (!e.button || "click" !== e.type))for (; l != this; l = l.parentNode || this)if (1 === l.nodeType && (l.disabled !== !0 || "click" !== e.type)) {
                for (r = [], o = 0; s > o; o++)i = t[o], n = i.selector + " ", void 0 === r[n] && (r[n] = i.needsContext ? ot(n, this).index(l) >= 0 : ot.find(n, this, null, [l]).length), r[n] && r.push(i);
                r.length && a.push({elem: l, handlers: r})
            }
            return s < t.length && a.push({elem: this, handlers: t.slice(s)}), a
        },
        fix: function (e) {
            if (e[ot.expando])return e;
            var t, n, i, r = e.type, o = e, a = this.fixHooks[r];
            for (a || (this.fixHooks[r] = a = It.test(r) ? this.mouseHooks : Dt.test(r) ? this.keyHooks : {}), i = a.props ? this.props.concat(a.props) : this.props, e = new ot.Event(o), t = i.length; t--;)n = i[t], e[n] = o[n];
            return e.target || (e.target = o.srcElement || mt), 3 === e.target.nodeType && (e.target = e.target.parentNode), e.metaKey = !!e.metaKey, a.filter ? a.filter(e, o) : e
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "), filter: function (e, t) {
                return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function (e, t) {
                var n, i, r, o = t.button, a = t.fromElement;
                return null == e.pageX && null != t.clientX && (i = e.target.ownerDocument || mt, r = i.documentElement, n = i.body, e.pageX = t.clientX + (r && r.scrollLeft || n && n.scrollLeft || 0) - (r && r.clientLeft || n && n.clientLeft || 0), e.pageY = t.clientY + (r && r.scrollTop || n && n.scrollTop || 0) - (r && r.clientTop || n && n.clientTop || 0)), !e.relatedTarget && a && (e.relatedTarget = a === e.target ? t.toElement : a), e.which || void 0 === o || (e.which = 1 & o ? 1 : 2 & o ? 3 : 4 & o ? 2 : 0), e
            }
        },
        special: {
            load: {noBubble: !0}, focus: {
                trigger: function () {
                    if (this !== f() && this.focus)try {
                        return this.focus(), !1
                    } catch (e) {
                    }
                }, delegateType: "focusin"
            }, blur: {
                trigger: function () {
                    return this === f() && this.blur ? (this.blur(), !1) : void 0
                }, delegateType: "focusout"
            }, click: {
                trigger: function () {
                    return ot.nodeName(this, "input") && "checkbox" === this.type && this.click ? (this.click(), !1) : void 0
                }, _default: function (e) {
                    return ot.nodeName(e.target, "a")
                }
            }, beforeunload: {
                postDispatch: function (e) {
                    void 0 !== e.result && (e.originalEvent.returnValue = e.result)
                }
            }
        },
        simulate: function (e, t, n, i) {
            var r = ot.extend(new ot.Event, n, {type: e, isSimulated: !0, originalEvent: {}});
            i ? ot.event.trigger(r, null, t) : ot.event.dispatch.call(t, r), r.isDefaultPrevented() && n.preventDefault()
        }
    }, ot.removeEvent = mt.removeEventListener ? function (e, t, n) {
        e.removeEventListener && e.removeEventListener(t, n, !1)
    } : function (e, t, n) {
        var i = "on" + t;
        e.detachEvent && (typeof e[i] === Ct && (e[i] = null), e.detachEvent(i, n))
    }, ot.Event = function (e, t) {
        return this instanceof ot.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && (e.returnValue === !1 || e.getPreventDefault && e.getPreventDefault()) ? p : h) : this.type = e, t && ot.extend(this, t), this.timeStamp = e && e.timeStamp || ot.now(), void(this[ot.expando] = !0)) : new ot.Event(e, t)
    }, ot.Event.prototype = {
        isDefaultPrevented: h,
        isPropagationStopped: h,
        isImmediatePropagationStopped: h,
        preventDefault: function () {
            var e = this.originalEvent;
            this.isDefaultPrevented = p, e && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
        },
        stopPropagation: function () {
            var e = this.originalEvent;
            this.isPropagationStopped = p, e && (e.stopPropagation && e.stopPropagation(), e.cancelBubble = !0)
        },
        stopImmediatePropagation: function () {
            this.isImmediatePropagationStopped = p, this.stopPropagation()
        }
    }, ot.each({mouseenter: "mouseover", mouseleave: "mouseout"}, function (e, t) {
        ot.event.special[e] = {
            delegateType: t, bindType: t, handle: function (e) {
                var n, i = this, r = e.relatedTarget, o = e.handleObj;
                return (!r || r !== i && !ot.contains(i, r)) && (e.type = o.origType, n = o.handler.apply(this, arguments), e.type = t), n
            }
        }
    }), it.submitBubbles || (ot.event.special.submit = {
        setup: function () {
            return ot.nodeName(this, "form") ? !1 : void ot.event.add(this, "click._submit keypress._submit", function (e) {
                var t = e.target, n = ot.nodeName(t, "input") || ot.nodeName(t, "button") ? t.form : void 0;
                n && !ot._data(n, "submitBubbles") && (ot.event.add(n, "submit._submit", function (e) {
                    e._submit_bubble = !0
                }), ot._data(n, "submitBubbles", !0))
            })
        }, postDispatch: function (e) {
            e._submit_bubble && (delete e._submit_bubble, this.parentNode && !e.isTrigger && ot.event.simulate("submit", this.parentNode, e, !0))
        }, teardown: function () {
            return ot.nodeName(this, "form") ? !1 : void ot.event.remove(this, "._submit")
        }
    }), it.changeBubbles || (ot.event.special.change = {
        setup: function () {
            return Ot.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (ot.event.add(this, "propertychange._change", function (e) {
                "checked" === e.originalEvent.propertyName && (this._just_changed = !0)
            }), ot.event.add(this, "click._change", function (e) {
                this._just_changed && !e.isTrigger && (this._just_changed = !1), ot.event.simulate("change", this, e, !0)
            })), !1) : void ot.event.add(this, "beforeactivate._change", function (e) {
                var t = e.target;
                Ot.test(t.nodeName) && !ot._data(t, "changeBubbles") && (ot.event.add(t, "change._change", function (e) {
                    !this.parentNode || e.isSimulated || e.isTrigger || ot.event.simulate("change", this.parentNode, e, !0)
                }), ot._data(t, "changeBubbles", !0))
            })
        }, handle: function (e) {
            var t = e.target;
            return this !== t || e.isSimulated || e.isTrigger || "radio" !== t.type && "checkbox" !== t.type ? e.handleObj.handler.apply(this, arguments) : void 0
        }, teardown: function () {
            return ot.event.remove(this, "._change"), !Ot.test(this.nodeName)
        }
    }), it.focusinBubbles || ot.each({focus: "focusin", blur: "focusout"}, function (e, t) {
        var n = function (e) {
            ot.event.simulate(t, e.target, ot.event.fix(e), !0)
        };
        ot.event.special[t] = {
            setup: function () {
                var i = this.ownerDocument || this, r = ot._data(i, t);
                r || i.addEventListener(e, n, !0), ot._data(i, t, (r || 0) + 1)
            }, teardown: function () {
                var i = this.ownerDocument || this, r = ot._data(i, t) - 1;
                r ? ot._data(i, t, r) : (i.removeEventListener(e, n, !0), ot._removeData(i, t))
            }
        }
    }), ot.fn.extend({
        on: function (e, t, n, i, r) {
            var o, a;
            if ("object" == typeof e) {
                "string" != typeof t && (n = n || t, t = void 0);
                for (o in e)this.on(o, t, n, e[o], r);
                return this
            }
            if (null == n && null == i ? (i = t, n = t = void 0) : null == i && ("string" == typeof t ? (i = n, n = void 0) : (i = n, n = t, t = void 0)), i === !1)i = h; else if (!i)return this;
            return 1 === r && (a = i, i = function (e) {
                return ot().off(e), a.apply(this, arguments)
            }, i.guid = a.guid || (a.guid = ot.guid++)), this.each(function () {
                ot.event.add(this, e, i, n, t)
            })
        }, one: function (e, t, n, i) {
            return this.on(e, t, n, i, 1)
        }, off: function (e, t, n) {
            var i, r;
            if (e && e.preventDefault && e.handleObj)return i = e.handleObj, ot(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
            if ("object" == typeof e) {
                for (r in e)this.off(r, t, e[r]);
                return this
            }
            return (t === !1 || "function" == typeof t) && (n = t, t = void 0), n === !1 && (n = h), this.each(function () {
                ot.event.remove(this, e, n, t)
            })
        }, trigger: function (e, t) {
            return this.each(function () {
                ot.event.trigger(e, t, this)
            })
        }, triggerHandler: function (e, t) {
            var n = this[0];
            return n ? ot.event.trigger(e, t, n, !0) : void 0
        }
    });
    var qt = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video", Rt = / jQuery\d+="(?:null|\d+)"/g, Ft = new RegExp("<(?:" + qt + ")[\\s/>]", "i"), zt = /^\s+/, Lt = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi, Ht = /<([\w:]+)/, Bt = /<tbody/i, Vt = /<|&#?\w+;/, Wt = /<(?:script|style|link)/i, Ut = /checked\s*(?:[^=]|=\s*.checked.)/i, Qt = /^$|\/(?:java|ecma)script/i, Xt = /^true\/(.*)/, Jt = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g, Kt = {
        option: [1, "<select multiple='multiple'>", "</select>"],
        legend: [1, "<fieldset>", "</fieldset>"],
        area: [1, "<map>", "</map>"],
        param: [1, "<object>", "</object>"],
        thead: [1, "<table>", "</table>"],
        tr: [2, "<table><tbody>", "</tbody></table>"],
        col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
        _default: it.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
    }, Gt = m(mt), Zt = Gt.appendChild(mt.createElement("div"));
    Kt.optgroup = Kt.option, Kt.tbody = Kt.tfoot = Kt.colgroup = Kt.caption = Kt.thead, Kt.th = Kt.td, ot.extend({
        clone: function (e, t, n) {
            var i, r, o, a, s, l = ot.contains(e.ownerDocument, e);
            if (it.html5Clone || ot.isXMLDoc(e) || !Ft.test("<" + e.nodeName + ">") ? o = e.cloneNode(!0) : (Zt.innerHTML = e.outerHTML, Zt.removeChild(o = Zt.firstChild)), !(it.noCloneEvent && it.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || ot.isXMLDoc(e)))for (i = g(o), s = g(e), a = 0; null != (r = s[a]); ++a)i[a] && _(r, i[a]);
            if (t)if (n)for (s = s || g(e), i = i || g(o), a = 0; null != (r = s[a]); a++)k(r, i[a]); else k(e, o);
            return i = g(o, "script"), i.length > 0 && w(i, !l && g(e, "script")), i = s = r = null, o
        }, buildFragment: function (e, t, n, i) {
            for (var r, o, a, s, l, u, c, d = e.length, p = m(t), h = [], f = 0; d > f; f++)if (o = e[f], o || 0 === o)if ("object" === ot.type(o))ot.merge(h, o.nodeType ? [o] : o); else if (Vt.test(o)) {
                for (s = s || p.appendChild(t.createElement("div")), l = (Ht.exec(o) || ["", ""])[1].toLowerCase(), c = Kt[l] || Kt._default, s.innerHTML = c[1] + o.replace(Lt, "<$1></$2>") + c[2], r = c[0]; r--;)s = s.lastChild;
                if (!it.leadingWhitespace && zt.test(o) && h.push(t.createTextNode(zt.exec(o)[0])), !it.tbody)for (o = "table" !== l || Bt.test(o) ? "<table>" !== c[1] || Bt.test(o) ? 0 : s : s.firstChild, r = o && o.childNodes.length; r--;)ot.nodeName(u = o.childNodes[r], "tbody") && !u.childNodes.length && o.removeChild(u);
                for (ot.merge(h, s.childNodes), s.textContent = ""; s.firstChild;)s.removeChild(s.firstChild);
                s = p.lastChild
            } else h.push(t.createTextNode(o));
            for (s && p.removeChild(s), it.appendChecked || ot.grep(g(h, "input"), v), f = 0; o = h[f++];)if ((!i || -1 === ot.inArray(o, i)) && (a = ot.contains(o.ownerDocument, o), s = g(p.appendChild(o), "script"), a && w(s), n))for (r = 0; o = s[r++];)Qt.test(o.type || "") && n.push(o);
            return s = null, p
        }, cleanData: function (e, t) {
            for (var n, i, r, o, a = 0, s = ot.expando, l = ot.cache, u = it.deleteExpando, c = ot.event.special; null != (n = e[a]); a++)if ((t || ot.acceptData(n)) && (r = n[s], o = r && l[r])) {
                if (o.events)for (i in o.events)c[i] ? ot.event.remove(n, i) : ot.removeEvent(n, i, o.handle);
                l[r] && (delete l[r], u ? delete n[s] : typeof n.removeAttribute !== Ct ? n.removeAttribute(s) : n[s] = null, X.push(r))
            }
        }
    }), ot.fn.extend({
        text: function (e) {
            return At(this, function (e) {
                return void 0 === e ? ot.text(this) : this.empty().append((this[0] && this[0].ownerDocument || mt).createTextNode(e))
            }, null, e, arguments.length)
        }, append: function () {
            return this.domManip(arguments, function (e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = y(this, e);
                    t.appendChild(e)
                }
            })
        }, prepend: function () {
            return this.domManip(arguments, function (e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = y(this, e);
                    t.insertBefore(e, t.firstChild)
                }
            })
        }, before: function () {
            return this.domManip(arguments, function (e) {
                this.parentNode && this.parentNode.insertBefore(e, this)
            })
        }, after: function () {
            return this.domManip(arguments, function (e) {
                this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
            })
        }, remove: function (e, t) {
            for (var n, i = e ? ot.filter(e, this) : this, r = 0; null != (n = i[r]); r++)t || 1 !== n.nodeType || ot.cleanData(g(n)), n.parentNode && (t && ot.contains(n.ownerDocument, n) && w(g(n, "script")), n.parentNode.removeChild(n));
            return this
        }, empty: function () {
            for (var e, t = 0; null != (e = this[t]); t++) {
                for (1 === e.nodeType && ot.cleanData(g(e, !1)); e.firstChild;)e.removeChild(e.firstChild);
                e.options && ot.nodeName(e, "select") && (e.options.length = 0)
            }
            return this
        }, clone: function (e, t) {
            return e = null == e ? !1 : e, t = null == t ? e : t, this.map(function () {
                return ot.clone(this, e, t)
            })
        }, html: function (e) {
            return At(this, function (e) {
                var t = this[0] || {}, n = 0, i = this.length;
                if (void 0 === e)return 1 === t.nodeType ? t.innerHTML.replace(Rt, "") : void 0;
                if (!("string" != typeof e || Wt.test(e) || !it.htmlSerialize && Ft.test(e) || !it.leadingWhitespace && zt.test(e) || Kt[(Ht.exec(e) || ["", ""])[1].toLowerCase()])) {
                    e = e.replace(Lt, "<$1></$2>");
                    try {
                        for (; i > n; n++)t = this[n] || {}, 1 === t.nodeType && (ot.cleanData(g(t, !1)), t.innerHTML = e);
                        t = 0
                    } catch (r) {
                    }
                }
                t && this.empty().append(e)
            }, null, e, arguments.length)
        }, replaceWith: function () {
            var e = arguments[0];
            return this.domManip(arguments, function (t) {
                e = this.parentNode, ot.cleanData(g(this)), e && e.replaceChild(t, this)
            }), e && (e.length || e.nodeType) ? this : this.remove()
        }, detach: function (e) {
            return this.remove(e, !0)
        }, domManip: function (e, t) {
            e = K.apply([], e);
            var n, i, r, o, a, s, l = 0, u = this.length, c = this, d = u - 1, p = e[0], h = ot.isFunction(p);
            if (h || u > 1 && "string" == typeof p && !it.checkClone && Ut.test(p))return this.each(function (n) {
                var i = c.eq(n);
                h && (e[0] = p.call(this, n, i.html())), i.domManip(e, t)
            });
            if (u && (s = ot.buildFragment(e, this[0].ownerDocument, !1, this), n = s.firstChild, 1 === s.childNodes.length && (s = n), n)) {
                for (o = ot.map(g(s, "script"), b), r = o.length; u > l; l++)i = s, l !== d && (i = ot.clone(i, !0, !0), r && ot.merge(o, g(i, "script"))), t.call(this[l], i, l);
                if (r)for (a = o[o.length - 1].ownerDocument, ot.map(o, x), l = 0; r > l; l++)i = o[l], Qt.test(i.type || "") && !ot._data(i, "globalEval") && ot.contains(a, i) && (i.src ? ot._evalUrl && ot._evalUrl(i.src) : ot.globalEval((i.text || i.textContent || i.innerHTML || "").replace(Jt, "")));
                s = n = null
            }
            return this
        }
    }), ot.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function (e, t) {
        ot.fn[e] = function (e) {
            for (var n, i = 0, r = [], o = ot(e), a = o.length - 1; a >= i; i++)n = i === a ? this : this.clone(!0), ot(o[i])[t](n), G.apply(r, n.get());
            return this.pushStack(r)
        }
    });
    var Yt, en = {};
    !function () {
        var e, t, n = mt.createElement("div"), i = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;padding:0;margin:0;border:0";
        n.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", e = n.getElementsByTagName("a")[0], e.style.cssText = "float:left;opacity:.5", it.opacity = /^0.5/.test(e.style.opacity), it.cssFloat = !!e.style.cssFloat, n.style.backgroundClip = "content-box", n.cloneNode(!0).style.backgroundClip = "", it.clearCloneStyle = "content-box" === n.style.backgroundClip, e = n = null, it.shrinkWrapBlocks = function () {
            var e, n, r, o;
            if (null == t) {
                if (e = mt.getElementsByTagName("body")[0], !e)return;
                o = "border:0;width:0;height:0;position:absolute;top:0;left:-9999px", n = mt.createElement("div"), r = mt.createElement("div"), e.appendChild(n).appendChild(r), t = !1, typeof r.style.zoom !== Ct && (r.style.cssText = i + ";width:1px;padding:1px;zoom:1", r.innerHTML = "<div></div>", r.firstChild.style.width = "5px", t = 3 !== r.offsetWidth), e.removeChild(n), e = n = r = null
            }
            return t
        }
    }();
    var tn, nn, rn = /^margin/, on = new RegExp("^(" + Et + ")(?!px)[a-z%]+$", "i"), an = /^(top|right|bottom|left)$/;
    e.getComputedStyle ? (tn = function (e) {
        return e.ownerDocument.defaultView.getComputedStyle(e, null)
    }, nn = function (e, t, n) {
        var i, r, o, a, s = e.style;
        return n = n || tn(e), a = n ? n.getPropertyValue(t) || n[t] : void 0, n && ("" !== a || ot.contains(e.ownerDocument, e) || (a = ot.style(e, t)), on.test(a) && rn.test(t) && (i = s.width, r = s.minWidth, o = s.maxWidth, s.minWidth = s.maxWidth = s.width = a, a = n.width, s.width = i, s.minWidth = r, s.maxWidth = o)), void 0 === a ? a : a + ""
    }) : mt.documentElement.currentStyle && (tn = function (e) {
        return e.currentStyle
    }, nn = function (e, t, n) {
        var i, r, o, a, s = e.style;
        return n = n || tn(e), a = n ? n[t] : void 0, null == a && s && s[t] && (a = s[t]), on.test(a) && !an.test(t) && (i = s.left, r = e.runtimeStyle, o = r && r.left, o && (r.left = e.currentStyle.left), s.left = "fontSize" === t ? "1em" : a, a = s.pixelLeft + "px", s.left = i, o && (r.left = o)), void 0 === a ? a : a + "" || "auto"
    }), function () {
        function t() {
            var t, n, i = mt.getElementsByTagName("body")[0];
            i && (t = mt.createElement("div"), n = mt.createElement("div"), t.style.cssText = u, i.appendChild(t).appendChild(n), n.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;position:absolute;display:block;padding:1px;border:1px;width:4px;margin-top:1%;top:1%", ot.swap(i, null != i.style.zoom ? {zoom: 1} : {}, function () {
                r = 4 === n.offsetWidth
            }), o = !0, a = !1, s = !0, e.getComputedStyle && (a = "1%" !== (e.getComputedStyle(n, null) || {}).top, o = "4px" === (e.getComputedStyle(n, null) || {width: "4px"}).width), i.removeChild(t), n = i = null)
        }

        var n, i, r, o, a, s, l = mt.createElement("div"), u = "border:0;width:0;height:0;position:absolute;top:0;left:-9999px", c = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;padding:0;margin:0;border:0";
        l.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", n = l.getElementsByTagName("a")[0], n.style.cssText = "float:left;opacity:.5", it.opacity = /^0.5/.test(n.style.opacity), it.cssFloat = !!n.style.cssFloat, l.style.backgroundClip = "content-box", l.cloneNode(!0).style.backgroundClip = "", it.clearCloneStyle = "content-box" === l.style.backgroundClip, n = l = null, ot.extend(it, {
            reliableHiddenOffsets: function () {
                if (null != i)return i;
                var e, t, n, r = mt.createElement("div"), o = mt.getElementsByTagName("body")[0];
                if (o)return r.setAttribute("className", "t"), r.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", e = mt.createElement("div"), e.style.cssText = u, o.appendChild(e).appendChild(r), r.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", t = r.getElementsByTagName("td"), t[0].style.cssText = "padding:0;margin:0;border:0;display:none", n = 0 === t[0].offsetHeight, t[0].style.display = "", t[1].style.display = "none", i = n && 0 === t[0].offsetHeight, o.removeChild(e), r = o = null, i
            }, boxSizing: function () {
                return null == r && t(), r
            }, boxSizingReliable: function () {
                return null == o && t(), o
            }, pixelPosition: function () {
                return null == a && t(), a
            }, reliableMarginRight: function () {
                var t, n, i, r;
                if (null == s && e.getComputedStyle) {
                    if (t = mt.getElementsByTagName("body")[0], !t)return;
                    n = mt.createElement("div"), i = mt.createElement("div"), n.style.cssText = u, t.appendChild(n).appendChild(i), r = i.appendChild(mt.createElement("div")), r.style.cssText = i.style.cssText = c, r.style.marginRight = r.style.width = "0", i.style.width = "1px", s = !parseFloat((e.getComputedStyle(r, null) || {}).marginRight), t.removeChild(n)
                }
                return s
            }
        })
    }(), ot.swap = function (e, t, n, i) {
        var r, o, a = {};
        for (o in t)a[o] = e.style[o], e.style[o] = t[o];
        r = n.apply(e, i || []);
        for (o in t)e.style[o] = a[o];
        return r
    };
    var sn = /alpha\([^)]*\)/i, ln = /opacity\s*=\s*([^)]*)/, un = /^(none|table(?!-c[ea]).+)/, cn = new RegExp("^(" + Et + ")(.*)$", "i"), dn = new RegExp("^([+-])=(" + Et + ")", "i"), pn = {
        position: "absolute",
        visibility: "hidden",
        display: "block"
    }, hn = {letterSpacing: 0, fontWeight: 400}, fn = ["Webkit", "O", "Moz", "ms"];
    ot.extend({
        cssHooks: {
            opacity: {
                get: function (e, t) {
                    if (t) {
                        var n = nn(e, "opacity");
                        return "" === n ? "1" : n
                    }
                }
            }
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {"float": it.cssFloat ? "cssFloat" : "styleFloat"},
        style: function (e, t, n, i) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var r, o, a, s = ot.camelCase(t), l = e.style;
                if (t = ot.cssProps[s] || (ot.cssProps[s] = E(l, s)), a = ot.cssHooks[t] || ot.cssHooks[s], void 0 === n)return a && "get" in a && void 0 !== (r = a.get(e, !1, i)) ? r : l[t];
                if (o = typeof n, "string" === o && (r = dn.exec(n)) && (n = (r[1] + 1) * r[2] + parseFloat(ot.css(e, t)), o = "number"), null != n && n === n && ("number" !== o || ot.cssNumber[s] || (n += "px"), it.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (l[t] = "inherit"), !(a && "set" in a && void 0 === (n = a.set(e, n, i)))))try {
                    l[t] = "", l[t] = n
                } catch (u) {
                }
            }
        },
        css: function (e, t, n, i) {
            var r, o, a, s = ot.camelCase(t);
            return t = ot.cssProps[s] || (ot.cssProps[s] = E(e.style, s)), a = ot.cssHooks[t] || ot.cssHooks[s], a && "get" in a && (o = a.get(e, !0, n)), void 0 === o && (o = nn(e, t, i)), "normal" === o && t in hn && (o = hn[t]), "" === n || n ? (r = parseFloat(o), n === !0 || ot.isNumeric(r) ? r || 0 : o) : o
        }
    }), ot.each(["height", "width"], function (e, t) {
        ot.cssHooks[t] = {
            get: function (e, n, i) {
                return n ? 0 === e.offsetWidth && un.test(ot.css(e, "display")) ? ot.swap(e, pn, function () {
                    return j(e, t, i)
                }) : j(e, t, i) : void 0
            }, set: function (e, n, i) {
                var r = i && tn(e);
                return N(e, n, i ? A(e, t, i, it.boxSizing() && "border-box" === ot.css(e, "boxSizing", !1, r), r) : 0)
            }
        }
    }), it.opacity || (ot.cssHooks.opacity = {
        get: function (e, t) {
            return ln.test((t && e.currentStyle ? e.currentStyle.filter : e.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : t ? "1" : ""
        }, set: function (e, t) {
            var n = e.style, i = e.currentStyle, r = ot.isNumeric(t) ? "alpha(opacity=" + 100 * t + ")" : "", o = i && i.filter || n.filter || "";
            n.zoom = 1, (t >= 1 || "" === t) && "" === ot.trim(o.replace(sn, "")) && n.removeAttribute && (n.removeAttribute("filter"), "" === t || i && !i.filter) || (n.filter = sn.test(o) ? o.replace(sn, r) : o + " " + r)
        }
    }), ot.cssHooks.marginRight = S(it.reliableMarginRight, function (e, t) {
        return t ? ot.swap(e, {display: "inline-block"}, nn, [e, "marginRight"]) : void 0
    }), ot.each({margin: "", padding: "", border: "Width"}, function (e, t) {
        ot.cssHooks[e + t] = {
            expand: function (n) {
                for (var i = 0, r = {}, o = "string" == typeof n ? n.split(" ") : [n]; 4 > i; i++)r[e + $t[i] + t] = o[i] || o[i - 2] || o[0];
                return r
            }
        }, rn.test(e) || (ot.cssHooks[e + t].set = N)
    }), ot.fn.extend({
        css: function (e, t) {
            return At(this, function (e, t, n) {
                var i, r, o = {}, a = 0;
                if (ot.isArray(t)) {
                    for (i = tn(e), r = t.length; r > a; a++)o[t[a]] = ot.css(e, t[a], !1, i);
                    return o
                }
                return void 0 !== n ? ot.style(e, t, n) : ot.css(e, t)
            }, e, t, arguments.length > 1)
        }, show: function () {
            return $(this, !0)
        }, hide: function () {
            return $(this)
        }, toggle: function (e) {
            return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function () {
                Nt(this) ? ot(this).show() : ot(this).hide()
            })
        }
    }), ot.Tween = O, O.prototype = {
        constructor: O, init: function (e, t, n, i, r, o) {
            this.elem = e, this.prop = n, this.easing = r || "swing", this.options = t, this.start = this.now = this.cur(), this.end = i, this.unit = o || (ot.cssNumber[n] ? "" : "px")
        }, cur: function () {
            var e = O.propHooks[this.prop];
            return e && e.get ? e.get(this) : O.propHooks._default.get(this)
        }, run: function (e) {
            var t, n = O.propHooks[this.prop];
            return this.pos = t = this.options.duration ? ot.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : O.propHooks._default.set(this), this
        }
    }, O.prototype.init.prototype = O.prototype, O.propHooks = {
        _default: {
            get: function (e) {
                var t;
                return null == e.elem[e.prop] || e.elem.style && null != e.elem.style[e.prop] ? (t = ot.css(e.elem, e.prop, ""), t && "auto" !== t ? t : 0) : e.elem[e.prop]
            }, set: function (e) {
                ot.fx.step[e.prop] ? ot.fx.step[e.prop](e) : e.elem.style && (null != e.elem.style[ot.cssProps[e.prop]] || ot.cssHooks[e.prop]) ? ot.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
            }
        }
    }, O.propHooks.scrollTop = O.propHooks.scrollLeft = {
        set: function (e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
        }
    }, ot.easing = {
        linear: function (e) {
            return e
        }, swing: function (e) {
            return .5 - Math.cos(e * Math.PI) / 2
        }
    }, ot.fx = O.prototype.init, ot.fx.step = {};
    var mn, gn, vn = /^(?:toggle|show|hide)$/, yn = new RegExp("^(?:([+-])=|)(" + Et + ")([a-z%]*)$", "i"), bn = /queueHooks$/, xn = [P], wn = {
        "*": [function (e, t) {
            var n = this.createTween(e, t), i = n.cur(), r = yn.exec(t), o = r && r[3] || (ot.cssNumber[e] ? "" : "px"), a = (ot.cssNumber[e] || "px" !== o && +i) && yn.exec(ot.css(n.elem, e)), s = 1, l = 20;
            if (a && a[3] !== o) {
                o = o || a[3], r = r || [], a = +i || 1;
                do s = s || ".5", a /= s, ot.style(n.elem, e, a + o); while (s !== (s = n.cur() / i) && 1 !== s && --l)
            }
            return r && (a = n.start = +a || +i || 0, n.unit = o, n.end = r[1] ? a + (r[1] + 1) * r[2] : +r[2]), n
        }]
    };
    ot.Animation = ot.extend(R, {
        tweener: function (e, t) {
            ot.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
            for (var n, i = 0, r = e.length; r > i; i++)n = e[i], wn[n] = wn[n] || [], wn[n].unshift(t)
        }, prefilter: function (e, t) {
            t ? xn.unshift(e) : xn.push(e)
        }
    }), ot.speed = function (e, t, n) {
        var i = e && "object" == typeof e ? ot.extend({}, e) : {
            complete: n || !n && t || ot.isFunction(e) && e,
            duration: e,
            easing: n && t || t && !ot.isFunction(t) && t
        };
        return i.duration = ot.fx.off ? 0 : "number" == typeof i.duration ? i.duration : i.duration in ot.fx.speeds ? ot.fx.speeds[i.duration] : ot.fx.speeds._default, (null == i.queue || i.queue === !0) && (i.queue = "fx"), i.old = i.complete, i.complete = function () {
            ot.isFunction(i.old) && i.old.call(this), i.queue && ot.dequeue(this, i.queue)
        }, i
    }, ot.fn.extend({
        fadeTo: function (e, t, n, i) {
            return this.filter(Nt).css("opacity", 0).show().end().animate({opacity: t}, e, n, i)
        }, animate: function (e, t, n, i) {
            var r = ot.isEmptyObject(e), o = ot.speed(t, n, i), a = function () {
                var t = R(this, ot.extend({}, e), o);
                (r || ot._data(this, "finish")) && t.stop(!0)
            };
            return a.finish = a, r || o.queue === !1 ? this.each(a) : this.queue(o.queue, a)
        }, stop: function (e, t, n) {
            var i = function (e) {
                var t = e.stop;
                delete e.stop, t(n)
            };
            return "string" != typeof e && (n = t, t = e, e = void 0), t && e !== !1 && this.queue(e || "fx", []), this.each(function () {
                var t = !0, r = null != e && e + "queueHooks", o = ot.timers, a = ot._data(this);
                if (r)a[r] && a[r].stop && i(a[r]); else for (r in a)a[r] && a[r].stop && bn.test(r) && i(a[r]);
                for (r = o.length; r--;)o[r].elem !== this || null != e && o[r].queue !== e || (o[r].anim.stop(n), t = !1, o.splice(r, 1));
                (t || !n) && ot.dequeue(this, e)
            })
        }, finish: function (e) {
            return e !== !1 && (e = e || "fx"), this.each(function () {
                var t, n = ot._data(this), i = n[e + "queue"], r = n[e + "queueHooks"], o = ot.timers, a = i ? i.length : 0;
                for (n.finish = !0, ot.queue(this, e, []), r && r.stop && r.stop.call(this, !0), t = o.length; t--;)o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0), o.splice(t, 1));
                for (t = 0; a > t; t++)i[t] && i[t].finish && i[t].finish.call(this);
                delete n.finish
            })
        }
    }), ot.each(["toggle", "show", "hide"], function (e, t) {
        var n = ot.fn[t];
        ot.fn[t] = function (e, i, r) {
            return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(I(t, !0), e, i, r)
        }
    }), ot.each({
        slideDown: I("show"),
        slideUp: I("hide"),
        slideToggle: I("toggle"),
        fadeIn: {opacity: "show"},
        fadeOut: {opacity: "hide"},
        fadeToggle: {opacity: "toggle"}
    }, function (e, t) {
        ot.fn[e] = function (e, n, i) {
            return this.animate(t, e, n, i)
        }
    }), ot.timers = [], ot.fx.tick = function () {
        var e, t = ot.timers, n = 0;
        for (mn = ot.now(); n < t.length; n++)e = t[n], e() || t[n] !== e || t.splice(n--, 1);
        t.length || ot.fx.stop(), mn = void 0
    }, ot.fx.timer = function (e) {
        ot.timers.push(e), e() ? ot.fx.start() : ot.timers.pop()
    }, ot.fx.interval = 13, ot.fx.start = function () {
        gn || (gn = setInterval(ot.fx.tick, ot.fx.interval))
    }, ot.fx.stop = function () {
        clearInterval(gn), gn = null
    }, ot.fx.speeds = {slow: 600, fast: 200, _default: 400}, ot.fn.delay = function (e, t) {
        return e = ot.fx ? ot.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function (t, n) {
            var i = setTimeout(t, e);
            n.stop = function () {
                clearTimeout(i)
            }
        })
    }, function () {
        var e, t, n, i, r = mt.createElement("div");
        r.setAttribute("className", "t"), r.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", e = r.getElementsByTagName("a")[0], n = mt.createElement("select"), i = n.appendChild(mt.createElement("option")), t = r.getElementsByTagName("input")[0], e.style.cssText = "top:1px", it.getSetAttribute = "t" !== r.className, it.style = /top/.test(e.getAttribute("style")), it.hrefNormalized = "/a" === e.getAttribute("href"), it.checkOn = !!t.value, it.optSelected = i.selected, it.enctype = !!mt.createElement("form").enctype, n.disabled = !0, it.optDisabled = !i.disabled, t = mt.createElement("input"), t.setAttribute("value", ""), it.input = "" === t.getAttribute("value"), t.value = "t", t.setAttribute("type", "radio"), it.radioValue = "t" === t.value, e = t = n = i = r = null
    }();
    var kn = /\r/g;
    ot.fn.extend({
        val: function (e) {
            var t, n, i, r = this[0];
            {
                if (arguments.length)return i = ot.isFunction(e), this.each(function (n) {
                    var r;
                    1 === this.nodeType && (r = i ? e.call(this, n, ot(this).val()) : e, null == r ? r = "" : "number" == typeof r ? r += "" : ot.isArray(r) && (r = ot.map(r, function (e) {
                        return null == e ? "" : e + ""
                    })), t = ot.valHooks[this.type] || ot.valHooks[this.nodeName.toLowerCase()], t && "set" in t && void 0 !== t.set(this, r, "value") || (this.value = r))
                });
                if (r)return t = ot.valHooks[r.type] || ot.valHooks[r.nodeName.toLowerCase()], t && "get" in t && void 0 !== (n = t.get(r, "value")) ? n : (n = r.value, "string" == typeof n ? n.replace(kn, "") : null == n ? "" : n)
            }
        }
    }), ot.extend({
        valHooks: {
            option: {
                get: function (e) {
                    var t = ot.find.attr(e, "value");
                    return null != t ? t : ot.text(e)
                }
            }, select: {
                get: function (e) {
                    for (var t, n, i = e.options, r = e.selectedIndex, o = "select-one" === e.type || 0 > r, a = o ? null : [], s = o ? r + 1 : i.length, l = 0 > r ? s : o ? r : 0; s > l; l++)if (n = i[l], !(!n.selected && l !== r || (it.optDisabled ? n.disabled : null !== n.getAttribute("disabled")) || n.parentNode.disabled && ot.nodeName(n.parentNode, "optgroup"))) {
                        if (t = ot(n).val(), o)return t;
                        a.push(t)
                    }
                    return a
                }, set: function (e, t) {
                    for (var n, i, r = e.options, o = ot.makeArray(t), a = r.length; a--;)if (i = r[a], ot.inArray(ot.valHooks.option.get(i), o) >= 0)try {
                        i.selected = n = !0
                    } catch (s) {
                        i.scrollHeight
                    } else i.selected = !1;
                    return n || (e.selectedIndex = -1), r
                }
            }
        }
    }), ot.each(["radio", "checkbox"], function () {
        ot.valHooks[this] = {
            set: function (e, t) {
                return ot.isArray(t) ? e.checked = ot.inArray(ot(e).val(), t) >= 0 : void 0
            }
        }, it.checkOn || (ot.valHooks[this].get = function (e) {
            return null === e.getAttribute("value") ? "on" : e.value
        })
    });
    var _n, Cn, Tn = ot.expr.attrHandle, Sn = /^(?:checked|selected)$/i, En = it.getSetAttribute, $n = it.input;
    ot.fn.extend({
        attr: function (e, t) {
            return At(this, ot.attr, e, t, arguments.length > 1)
        }, removeAttr: function (e) {
            return this.each(function () {
                ot.removeAttr(this, e)
            })
        }
    }), ot.extend({
        attr: function (e, t, n) {
            var i, r, o = e.nodeType;
            if (e && 3 !== o && 8 !== o && 2 !== o)return typeof e.getAttribute === Ct ? ot.prop(e, t, n) : (1 === o && ot.isXMLDoc(e) || (t = t.toLowerCase(), i = ot.attrHooks[t] || (ot.expr.match.bool.test(t) ? Cn : _n)), void 0 === n ? i && "get" in i && null !== (r = i.get(e, t)) ? r : (r = ot.find.attr(e, t), null == r ? void 0 : r) : null !== n ? i && "set" in i && void 0 !== (r = i.set(e, n, t)) ? r : (e.setAttribute(t, n + ""), n) : void ot.removeAttr(e, t))
        }, removeAttr: function (e, t) {
            var n, i, r = 0, o = t && t.match(xt);
            if (o && 1 === e.nodeType)for (; n = o[r++];)i = ot.propFix[n] || n, ot.expr.match.bool.test(n) ? $n && En || !Sn.test(n) ? e[i] = !1 : e[ot.camelCase("default-" + n)] = e[i] = !1 : ot.attr(e, n, ""), e.removeAttribute(En ? n : i)
        }, attrHooks: {
            type: {
                set: function (e, t) {
                    if (!it.radioValue && "radio" === t && ot.nodeName(e, "input")) {
                        var n = e.value;
                        return e.setAttribute("type", t), n && (e.value = n), t
                    }
                }
            }
        }
    }), Cn = {
        set: function (e, t, n) {
            return t === !1 ? ot.removeAttr(e, n) : $n && En || !Sn.test(n) ? e.setAttribute(!En && ot.propFix[n] || n, n) : e[ot.camelCase("default-" + n)] = e[n] = !0, n
        }
    }, ot.each(ot.expr.match.bool.source.match(/\w+/g), function (e, t) {
        var n = Tn[t] || ot.find.attr;
        Tn[t] = $n && En || !Sn.test(t) ? function (e, t, i) {
            var r, o;
            return i || (o = Tn[t], Tn[t] = r, r = null != n(e, t, i) ? t.toLowerCase() : null, Tn[t] = o), r
        } : function (e, t, n) {
            return n ? void 0 : e[ot.camelCase("default-" + t)] ? t.toLowerCase() : null
        }
    }), $n && En || (ot.attrHooks.value = {
        set: function (e, t, n) {
            return ot.nodeName(e, "input") ? void(e.defaultValue = t) : _n && _n.set(e, t, n)
        }
    }), En || (_n = {
        set: function (e, t, n) {
            var i = e.getAttributeNode(n);
            return i || e.setAttributeNode(i = e.ownerDocument.createAttribute(n)), i.value = t += "", "value" === n || t === e.getAttribute(n) ? t : void 0
        }
    }, Tn.id = Tn.name = Tn.coords = function (e, t, n) {
        var i;
        return n ? void 0 : (i = e.getAttributeNode(t)) && "" !== i.value ? i.value : null
    }, ot.valHooks.button = {
        get: function (e, t) {
            var n = e.getAttributeNode(t);
            return n && n.specified ? n.value : void 0
        }, set: _n.set
    }, ot.attrHooks.contenteditable = {
        set: function (e, t, n) {
            _n.set(e, "" === t ? !1 : t, n)
        }
    }, ot.each(["width", "height"], function (e, t) {
        ot.attrHooks[t] = {
            set: function (e, n) {
                return "" === n ? (e.setAttribute(t, "auto"), n) : void 0
            }
        }
    })), it.style || (ot.attrHooks.style = {
        get: function (e) {
            return e.style.cssText || void 0
        }, set: function (e, t) {
            return e.style.cssText = t + ""
        }
    });
    var Nn = /^(?:input|select|textarea|button|object)$/i, An = /^(?:a|area)$/i;
    ot.fn.extend({
        prop: function (e, t) {
            return At(this, ot.prop, e, t, arguments.length > 1)
        }, removeProp: function (e) {
            return e = ot.propFix[e] || e, this.each(function () {
                try {
                    this[e] = void 0, delete this[e]
                } catch (t) {
                }
            })
        }
    }), ot.extend({
        propFix: {"for": "htmlFor", "class": "className"}, prop: function (e, t, n) {
            var i, r, o, a = e.nodeType;
            if (e && 3 !== a && 8 !== a && 2 !== a)return o = 1 !== a || !ot.isXMLDoc(e), o && (t = ot.propFix[t] || t, r = ot.propHooks[t]), void 0 !== n ? r && "set" in r && void 0 !== (i = r.set(e, n, t)) ? i : e[t] = n : r && "get" in r && null !== (i = r.get(e, t)) ? i : e[t]
        }, propHooks: {
            tabIndex: {
                get: function (e) {
                    var t = ot.find.attr(e, "tabindex");
                    return t ? parseInt(t, 10) : Nn.test(e.nodeName) || An.test(e.nodeName) && e.href ? 0 : -1
                }
            }
        }
    }), it.hrefNormalized || ot.each(["href", "src"], function (e, t) {
        ot.propHooks[t] = {
            get: function (e) {
                return e.getAttribute(t, 4)
            }
        }
    }), it.optSelected || (ot.propHooks.selected = {
        get: function (e) {
            var t = e.parentNode;
            return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
        }
    }), ot.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
        ot.propFix[this.toLowerCase()] = this
    }), it.enctype || (ot.propFix.enctype = "encoding");
    var jn = /[\t\r\n\f]/g;
    ot.fn.extend({
        addClass: function (e) {
            var t, n, i, r, o, a, s = 0, l = this.length, u = "string" == typeof e && e;
            if (ot.isFunction(e))return this.each(function (t) {
                ot(this).addClass(e.call(this, t, this.className))
            });
            if (u)for (t = (e || "").match(xt) || []; l > s; s++)if (n = this[s], i = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(jn, " ") : " ")) {
                for (o = 0; r = t[o++];)i.indexOf(" " + r + " ") < 0 && (i += r + " ");
                a = ot.trim(i), n.className !== a && (n.className = a)
            }
            return this
        }, removeClass: function (e) {
            var t, n, i, r, o, a, s = 0, l = this.length, u = 0 === arguments.length || "string" == typeof e && e;
            if (ot.isFunction(e))return this.each(function (t) {
                ot(this).removeClass(e.call(this, t, this.className))
            });
            if (u)for (t = (e || "").match(xt) || []; l > s; s++)if (n = this[s], i = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(jn, " ") : "")) {
                for (o = 0; r = t[o++];)for (; i.indexOf(" " + r + " ") >= 0;)i = i.replace(" " + r + " ", " ");
                a = e ? ot.trim(i) : "", n.className !== a && (n.className = a)
            }
            return this
        }, toggleClass: function (e, t) {
            var n = typeof e;
            return "boolean" == typeof t && "string" === n ? t ? this.addClass(e) : this.removeClass(e) : this.each(ot.isFunction(e) ? function (n) {
                ot(this).toggleClass(e.call(this, n, this.className, t), t)
            } : function () {
                if ("string" === n)for (var t, i = 0, r = ot(this), o = e.match(xt) || []; t = o[i++];)r.hasClass(t) ? r.removeClass(t) : r.addClass(t); else(n === Ct || "boolean" === n) && (this.className && ot._data(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : ot._data(this, "__className__") || "")
            })
        }, hasClass: function (e) {
            for (var t = " " + e + " ", n = 0, i = this.length; i > n; n++)if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(jn, " ").indexOf(t) >= 0)return !0;
            return !1
        }
    }), ot.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function (e, t) {
        ot.fn[t] = function (e, n) {
            return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
        }
    }), ot.fn.extend({
        hover: function (e, t) {
            return this.mouseenter(e).mouseleave(t || e)
        }, bind: function (e, t, n) {
            return this.on(e, null, t, n)
        }, unbind: function (e, t) {
            return this.off(e, null, t)
        }, delegate: function (e, t, n, i) {
            return this.on(t, e, n, i)
        }, undelegate: function (e, t, n) {
            return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
        }
    });
    var On = ot.now(), Dn = /\?/, In = /(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;
    ot.parseJSON = function (t) {
        if (e.JSON && e.JSON.parse)return e.JSON.parse(t + "");
        var n, i = null, r = ot.trim(t + "");
        return r && !ot.trim(r.replace(In, function (e, t, r, o) {
            return n && t && (i = 0), 0 === i ? e : (n = r || t, i += !o - !r, "")
        })) ? Function("return " + r)() : ot.error("Invalid JSON: " + t)
    }, ot.parseXML = function (t) {
        var n, i;
        if (!t || "string" != typeof t)return null;
        try {
            e.DOMParser ? (i = new DOMParser, n = i.parseFromString(t, "text/xml")) : (n = new ActiveXObject("Microsoft.XMLDOM"), n.async = "false", n.loadXML(t))
        } catch (r) {
            n = void 0
        }
        return n && n.documentElement && !n.getElementsByTagName("parsererror").length || ot.error("Invalid XML: " + t), n
    };
    var Mn, Pn, qn = /#.*$/, Rn = /([?&])_=[^&]*/, Fn = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm, zn = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/, Ln = /^(?:GET|HEAD)$/, Hn = /^\/\//, Bn = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/, Vn = {}, Wn = {}, Un = "*/".concat("*");
    try {
        Pn = location.href
    } catch (Qn) {
        Pn = mt.createElement("a"), Pn.href = "", Pn = Pn.href
    }
    Mn = Bn.exec(Pn.toLowerCase()) || [], ot.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: Pn,
            type: "GET",
            isLocal: zn.test(Mn[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": Un,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {xml: /xml/, html: /html/, json: /json/},
            responseFields: {xml: "responseXML", text: "responseText", json: "responseJSON"},
            converters: {"* text": String, "text html": !0, "text json": ot.parseJSON, "text xml": ot.parseXML},
            flatOptions: {url: !0, context: !0}
        },
        ajaxSetup: function (e, t) {
            return t ? L(L(e, ot.ajaxSettings), t) : L(ot.ajaxSettings, e)
        },
        ajaxPrefilter: F(Vn),
        ajaxTransport: F(Wn),
        ajax: function (e, t) {
            function n(e, t, n, i) {
                var r, c, v, y, x, k = t;
                2 !== b && (b = 2, s && clearTimeout(s), u = void 0, a = i || "", w.readyState = e > 0 ? 4 : 0, r = e >= 200 && 300 > e || 304 === e, n && (y = H(d, w, n)), y = B(d, y, w, r), r ? (d.ifModified && (x = w.getResponseHeader("Last-Modified"), x && (ot.lastModified[o] = x), x = w.getResponseHeader("etag"), x && (ot.etag[o] = x)), 204 === e || "HEAD" === d.type ? k = "nocontent" : 304 === e ? k = "notmodified" : (k = y.state, c = y.data, v = y.error, r = !v)) : (v = k, (e || !k) && (k = "error", 0 > e && (e = 0))), w.status = e, w.statusText = (t || k) + "", r ? f.resolveWith(p, [c, k, w]) : f.rejectWith(p, [w, k, v]), w.statusCode(g), g = void 0, l && h.trigger(r ? "ajaxSuccess" : "ajaxError", [w, d, r ? c : v]), m.fireWith(p, [w, k]), l && (h.trigger("ajaxComplete", [w, d]), --ot.active || ot.event.trigger("ajaxStop")))
            }

            "object" == typeof e && (t = e, e = void 0), t = t || {};
            var i, r, o, a, s, l, u, c, d = ot.ajaxSetup({}, t), p = d.context || d, h = d.context && (p.nodeType || p.jquery) ? ot(p) : ot.event, f = ot.Deferred(), m = ot.Callbacks("once memory"), g = d.statusCode || {}, v = {}, y = {}, b = 0, x = "canceled", w = {
                readyState: 0,
                getResponseHeader: function (e) {
                    var t;
                    if (2 === b) {
                        if (!c)for (c = {}; t = Fn.exec(a);)c[t[1].toLowerCase()] = t[2];
                        t = c[e.toLowerCase()]
                    }
                    return null == t ? null : t
                },
                getAllResponseHeaders: function () {
                    return 2 === b ? a : null
                },
                setRequestHeader: function (e, t) {
                    var n = e.toLowerCase();
                    return b || (e = y[n] = y[n] || e, v[e] = t), this
                },
                overrideMimeType: function (e) {
                    return b || (d.mimeType = e), this
                },
                statusCode: function (e) {
                    var t;
                    if (e)if (2 > b)for (t in e)g[t] = [g[t], e[t]]; else w.always(e[w.status]);
                    return this
                },
                abort: function (e) {
                    var t = e || x;
                    return u && u.abort(t), n(0, t), this
                }
            };
            if (f.promise(w).complete = m.add, w.success = w.done, w.error = w.fail, d.url = ((e || d.url || Pn) + "").replace(qn, "").replace(Hn, Mn[1] + "//"), d.type = t.method || t.type || d.method || d.type, d.dataTypes = ot.trim(d.dataType || "*").toLowerCase().match(xt) || [""], null == d.crossDomain && (i = Bn.exec(d.url.toLowerCase()), d.crossDomain = !(!i || i[1] === Mn[1] && i[2] === Mn[2] && (i[3] || ("http:" === i[1] ? "80" : "443")) === (Mn[3] || ("http:" === Mn[1] ? "80" : "443")))), d.data && d.processData && "string" != typeof d.data && (d.data = ot.param(d.data, d.traditional)), z(Vn, d, t, w), 2 === b)return w;
            l = d.global, l && 0 === ot.active++ && ot.event.trigger("ajaxStart"), d.type = d.type.toUpperCase(), d.hasContent = !Ln.test(d.type), o = d.url, d.hasContent || (d.data && (o = d.url += (Dn.test(o) ? "&" : "?") + d.data, delete d.data), d.cache === !1 && (d.url = Rn.test(o) ? o.replace(Rn, "$1_=" + On++) : o + (Dn.test(o) ? "&" : "?") + "_=" + On++)), d.ifModified && (ot.lastModified[o] && w.setRequestHeader("If-Modified-Since", ot.lastModified[o]), ot.etag[o] && w.setRequestHeader("If-None-Match", ot.etag[o])), (d.data && d.hasContent && d.contentType !== !1 || t.contentType) && w.setRequestHeader("Content-Type", d.contentType), w.setRequestHeader("Accept", d.dataTypes[0] && d.accepts[d.dataTypes[0]] ? d.accepts[d.dataTypes[0]] + ("*" !== d.dataTypes[0] ? ", " + Un + "; q=0.01" : "") : d.accepts["*"]);
            for (r in d.headers)w.setRequestHeader(r, d.headers[r]);
            if (d.beforeSend && (d.beforeSend.call(p, w, d) === !1 || 2 === b))return w.abort();
            x = "abort";
            for (r in{success: 1, error: 1, complete: 1})w[r](d[r]);
            if (u = z(Wn, d, t, w)) {
                w.readyState = 1, l && h.trigger("ajaxSend", [w, d]), d.async && d.timeout > 0 && (s = setTimeout(function () {
                    w.abort("timeout")
                }, d.timeout));
                try {
                    b = 1, u.send(v, n)
                } catch (k) {
                    if (!(2 > b))throw k;
                    n(-1, k)
                }
            } else n(-1, "No Transport");
            return w
        },
        getJSON: function (e, t, n) {
            return ot.get(e, t, n, "json")
        },
        getScript: function (e, t) {
            return ot.get(e, void 0, t, "script")
        }
    }), ot.each(["get", "post"], function (e, t) {
        ot[t] = function (e, n, i, r) {
            return ot.isFunction(n) && (r = r || i, i = n, n = void 0), ot.ajax({
                url: e,
                type: t,
                dataType: r,
                data: n,
                success: i
            })
        }
    }), ot.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (e, t) {
        ot.fn[t] = function (e) {
            return this.on(t, e)
        }
    }), ot._evalUrl = function (e) {
        return ot.ajax({url: e, type: "GET", dataType: "script", async: !1, global: !1, "throws": !0})
    }, ot.fn.extend({
        wrapAll: function (e) {
            if (ot.isFunction(e))return this.each(function (t) {
                ot(this).wrapAll(e.call(this, t))
            });
            if (this[0]) {
                var t = ot(e, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && t.insertBefore(this[0]), t.map(function () {
                    for (var e = this; e.firstChild && 1 === e.firstChild.nodeType;)e = e.firstChild;
                    return e
                }).append(this)
            }
            return this
        }, wrapInner: function (e) {
            return this.each(ot.isFunction(e) ? function (t) {
                ot(this).wrapInner(e.call(this, t))
            } : function () {
                var t = ot(this), n = t.contents();
                n.length ? n.wrapAll(e) : t.append(e)
            })
        }, wrap: function (e) {
            var t = ot.isFunction(e);
            return this.each(function (n) {
                ot(this).wrapAll(t ? e.call(this, n) : e)
            })
        }, unwrap: function () {
            return this.parent().each(function () {
                ot.nodeName(this, "body") || ot(this).replaceWith(this.childNodes)
            }).end()
        }
    }), ot.expr.filters.hidden = function (e) {
        return e.offsetWidth <= 0 && e.offsetHeight <= 0 || !it.reliableHiddenOffsets() && "none" === (e.style && e.style.display || ot.css(e, "display"))
    }, ot.expr.filters.visible = function (e) {
        return !ot.expr.filters.hidden(e)
    };
    var Xn = /%20/g, Jn = /\[\]$/, Kn = /\r?\n/g, Gn = /^(?:submit|button|image|reset|file)$/i, Zn = /^(?:input|select|textarea|keygen)/i;
    ot.param = function (e, t) {
        var n, i = [], r = function (e, t) {
            t = ot.isFunction(t) ? t() : null == t ? "" : t, i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
        };
        if (void 0 === t && (t = ot.ajaxSettings && ot.ajaxSettings.traditional), ot.isArray(e) || e.jquery && !ot.isPlainObject(e))ot.each(e, function () {
            r(this.name, this.value)
        }); else for (n in e)V(n, e[n], t, r);
        return i.join("&").replace(Xn, "+")
    }, ot.fn.extend({
        serialize: function () {
            return ot.param(this.serializeArray())
        }, serializeArray: function () {
            return this.map(function () {
                var e = ot.prop(this, "elements");
                return e ? ot.makeArray(e) : this
            }).filter(function () {
                var e = this.type;
                return this.name && !ot(this).is(":disabled") && Zn.test(this.nodeName) && !Gn.test(e) && (this.checked || !jt.test(e))
            }).map(function (e, t) {
                var n = ot(this).val();
                return null == n ? null : ot.isArray(n) ? ot.map(n, function (e) {
                    return {name: t.name, value: e.replace(Kn, "\r\n")}
                }) : {name: t.name, value: n.replace(Kn, "\r\n")}
            }).get()
        }
    }), ot.ajaxSettings.xhr = void 0 !== e.ActiveXObject ? function () {
        return !this.isLocal && /^(get|post|head|put|delete|options)$/i.test(this.type) && W() || U()
    } : W;
    var Yn = 0, ei = {}, ti = ot.ajaxSettings.xhr();
    e.ActiveXObject && ot(e).on("unload", function () {
        for (var e in ei)ei[e](void 0, !0)
    }), it.cors = !!ti && "withCredentials" in ti, ti = it.ajax = !!ti, ti && ot.ajaxTransport(function (e) {
        if (!e.crossDomain || it.cors) {
            var t;
            return {
                send: function (n, i) {
                    var r, o = e.xhr(), a = ++Yn;
                    if (o.open(e.type, e.url, e.async, e.username, e.password), e.xhrFields)for (r in e.xhrFields)o[r] = e.xhrFields[r];
                    e.mimeType && o.overrideMimeType && o.overrideMimeType(e.mimeType), e.crossDomain || n["X-Requested-With"] || (n["X-Requested-With"] = "XMLHttpRequest");
                    for (r in n)void 0 !== n[r] && o.setRequestHeader(r, n[r] + "");
                    o.send(e.hasContent && e.data || null), t = function (n, r) {
                        var s, l, u;
                        if (t && (r || 4 === o.readyState))if (delete ei[a], t = void 0, o.onreadystatechange = ot.noop, r)4 !== o.readyState && o.abort(); else {
                            u = {}, s = o.status, "string" == typeof o.responseText && (u.text = o.responseText);
                            try {
                                l = o.statusText
                            } catch (c) {
                                l = ""
                            }
                            s || !e.isLocal || e.crossDomain ? 1223 === s && (s = 204) : s = u.text ? 200 : 404
                        }
                        u && i(s, l, u, o.getAllResponseHeaders())
                    }, e.async ? 4 === o.readyState ? setTimeout(t) : o.onreadystatechange = ei[a] = t : t()
                }, abort: function () {
                    t && t(void 0, !0)
                }
            }
        }
    }), ot.ajaxSetup({
        accepts: {script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},
        contents: {script: /(?:java|ecma)script/},
        converters: {
            "text script": function (e) {
                return ot.globalEval(e), e
            }
        }
    }), ot.ajaxPrefilter("script", function (e) {
        void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET", e.global = !1)
    }), ot.ajaxTransport("script", function (e) {
        if (e.crossDomain) {
            var t, n = mt.head || ot("head")[0] || mt.documentElement;
            return {
                send: function (i, r) {
                    t = mt.createElement("script"), t.async = !0, e.scriptCharset && (t.charset = e.scriptCharset), t.src = e.url, t.onload = t.onreadystatechange = function (e, n) {
                        (n || !t.readyState || /loaded|complete/.test(t.readyState)) && (t.onload = t.onreadystatechange = null, t.parentNode && t.parentNode.removeChild(t), t = null, n || r(200, "success"))
                    }, n.insertBefore(t, n.firstChild)
                }, abort: function () {
                    t && t.onload(void 0, !0)
                }
            }
        }
    });
    var ni = [], ii = /(=)\?(?=&|$)|\?\?/;
    ot.ajaxSetup({
        jsonp: "callback", jsonpCallback: function () {
            var e = ni.pop() || ot.expando + "_" + On++;
            return this[e] = !0, e
        }
    }), ot.ajaxPrefilter("json jsonp", function (t, n, i) {
        var r, o, a, s = t.jsonp !== !1 && (ii.test(t.url) ? "url" : "string" == typeof t.data && !(t.contentType || "").indexOf("application/x-www-form-urlencoded") && ii.test(t.data) && "data");
        return s || "jsonp" === t.dataTypes[0] ? (r = t.jsonpCallback = ot.isFunction(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback, s ? t[s] = t[s].replace(ii, "$1" + r) : t.jsonp !== !1 && (t.url += (Dn.test(t.url) ? "&" : "?") + t.jsonp + "=" + r), t.converters["script json"] = function () {
            return a || ot.error(r + " was not called"), a[0]
        }, t.dataTypes[0] = "json", o = e[r], e[r] = function () {
            a = arguments
        }, i.always(function () {
            e[r] = o, t[r] && (t.jsonpCallback = n.jsonpCallback, ni.push(r)), a && ot.isFunction(o) && o(a[0]), a = o = void 0
        }), "script") : void 0
    }), ot.parseHTML = function (e, t, n) {
        if (!e || "string" != typeof e)return null;
        "boolean" == typeof t && (n = t, t = !1), t = t || mt;
        var i = pt.exec(e), r = !n && [];
        return i ? [t.createElement(i[1])] : (i = ot.buildFragment([e], t, r), r && r.length && ot(r).remove(), ot.merge([], i.childNodes))
    };
    var ri = ot.fn.load;
    ot.fn.load = function (e, t, n) {
        if ("string" != typeof e && ri)return ri.apply(this, arguments);
        var i, r, o, a = this, s = e.indexOf(" ");
        return s >= 0 && (i = e.slice(s, e.length), e = e.slice(0, s)), ot.isFunction(t) ? (n = t, t = void 0) : t && "object" == typeof t && (o = "POST"), a.length > 0 && ot.ajax({
            url: e,
            type: o,
            dataType: "html",
            data: t
        }).done(function (e) {
            r = arguments, a.html(i ? ot("<div>").append(ot.parseHTML(e)).find(i) : e)
        }).complete(n && function (e, t) {
                a.each(n, r || [e.responseText, t, e])
            }), this
    }, ot.expr.filters.animated = function (e) {
        return ot.grep(ot.timers, function (t) {
            return e === t.elem
        }).length
    };
    var oi = e.document.documentElement;
    ot.offset = {
        setOffset: function (e, t, n) {
            var i, r, o, a, s, l, u, c = ot.css(e, "position"), d = ot(e), p = {};
            "static" === c && (e.style.position = "relative"), s = d.offset(), o = ot.css(e, "top"), l = ot.css(e, "left"), u = ("absolute" === c || "fixed" === c) && ot.inArray("auto", [o, l]) > -1, u ? (i = d.position(), a = i.top, r = i.left) : (a = parseFloat(o) || 0, r = parseFloat(l) || 0), ot.isFunction(t) && (t = t.call(e, n, s)), null != t.top && (p.top = t.top - s.top + a), null != t.left && (p.left = t.left - s.left + r), "using" in t ? t.using.call(e, p) : d.css(p)
        }
    }, ot.fn.extend({
        offset: function (e) {
            if (arguments.length)return void 0 === e ? this : this.each(function (t) {
                ot.offset.setOffset(this, e, t)
            });
            var t, n, i = {top: 0, left: 0}, r = this[0], o = r && r.ownerDocument;
            if (o)return t = o.documentElement, ot.contains(t, r) ? (typeof r.getBoundingClientRect !== Ct && (i = r.getBoundingClientRect()), n = Q(o), {
                top: i.top + (n.pageYOffset || t.scrollTop) - (t.clientTop || 0),
                left: i.left + (n.pageXOffset || t.scrollLeft) - (t.clientLeft || 0)
            }) : i
        }, position: function () {
            if (this[0]) {
                var e, t, n = {top: 0, left: 0}, i = this[0];
                return "fixed" === ot.css(i, "position") ? t = i.getBoundingClientRect() : (e = this.offsetParent(), t = this.offset(), ot.nodeName(e[0], "html") || (n = e.offset()), n.top += ot.css(e[0], "borderTopWidth", !0), n.left += ot.css(e[0], "borderLeftWidth", !0)), {
                    top: t.top - n.top - ot.css(i, "marginTop", !0),
                    left: t.left - n.left - ot.css(i, "marginLeft", !0)
                }
            }
        }, offsetParent: function () {
            return this.map(function () {
                for (var e = this.offsetParent || oi; e && !ot.nodeName(e, "html") && "static" === ot.css(e, "position");)e = e.offsetParent;
                return e || oi
            })
        }
    }), ot.each({scrollLeft: "pageXOffset", scrollTop: "pageYOffset"}, function (e, t) {
        var n = /Y/.test(t);
        ot.fn[e] = function (i) {
            return At(this, function (e, i, r) {
                var o = Q(e);
                return void 0 === r ? o ? t in o ? o[t] : o.document.documentElement[i] : e[i] : void(o ? o.scrollTo(n ? ot(o).scrollLeft() : r, n ? r : ot(o).scrollTop()) : e[i] = r)
            }, e, i, arguments.length, null)
        }
    }), ot.each(["top", "left"], function (e, t) {
        ot.cssHooks[t] = S(it.pixelPosition, function (e, n) {
            return n ? (n = nn(e, t), on.test(n) ? ot(e).position()[t] + "px" : n) : void 0
        })
    }), ot.each({Height: "height", Width: "width"}, function (e, t) {
        ot.each({padding: "inner" + e, content: t, "": "outer" + e}, function (n, i) {
            ot.fn[i] = function (i, r) {
                var o = arguments.length && (n || "boolean" != typeof i), a = n || (i === !0 || r === !0 ? "margin" : "border");
                return At(this, function (t, n, i) {
                    var r;
                    return ot.isWindow(t) ? t.document.documentElement["client" + e] : 9 === t.nodeType ? (r = t.documentElement, Math.max(t.body["scroll" + e], r["scroll" + e], t.body["offset" + e], r["offset" + e], r["client" + e])) : void 0 === i ? ot.css(t, n, a) : ot.style(t, n, i, a)
                }, t, o ? i : void 0, o, null)
            }
        })
    }), ot.fn.size = function () {
        return this.length
    }, ot.fn.andSelf = ot.fn.addBack, "function" == typeof define && define.amd && define("jquery", [], function () {
        return ot
    });
    var ai = e.jQuery, si = e.$;
    return ot.noConflict = function (t) {
        return e.$ === ot && (e.$ = si), t && e.jQuery === ot && (e.jQuery = ai), ot
    }, typeof t === Ct && (e.jQuery = e.$ = ot), ot
}), function () {
    var e = this, t = e._, n = {}, i = Array.prototype, r = Object.prototype, o = Function.prototype, a = i.push, s = i.slice, l = i.concat, u = r.toString, c = r.hasOwnProperty, d = i.forEach, p = i.map, h = i.reduce, f = i.reduceRight, m = i.filter, g = i.every, v = i.some, y = i.indexOf, b = i.lastIndexOf, x = Array.isArray, w = Object.keys, k = o.bind, _ = function (e) {
        return e instanceof _ ? e : this instanceof _ ? void(this._wrapped = e) : new _(e)
    };
    "undefined" != typeof exports ? ("undefined" != typeof module && module.exports && (exports = module.exports = _), exports._ = _) : e._ = _, _.VERSION = "1.6.0";
    var C = _.each = _.forEach = function (e, t, i) {
        if (null == e)return e;
        if (d && e.forEach === d)e.forEach(t, i);
        else if (e.length === +e.length) {
            for (var r = 0, o = e.length; o > r; r++)if (t.call(i, e[r], r, e) === n)return
        } else for (var a = _.keys(e), r = 0, o = a.length; o > r; r++)if (t.call(i, e[a[r]], a[r], e) === n)return;
        return e
    };
    _.map = _.collect = function (e, t, n) {
        var i = [];
        return null == e ? i : p && e.map === p ? e.map(t, n) : (C(e, function (e, r, o) {
            i.push(t.call(n, e, r, o))
        }), i)
    };
    var T = "Reduce of empty array with no initial value";
    _.reduce = _.foldl = _.inject = function (e, t, n, i) {
        var r = arguments.length > 2;
        if (null == e && (e = []), h && e.reduce === h)return i && (t = _.bind(t, i)), r ? e.reduce(t, n) : e.reduce(t);
        if (C(e, function (e, o, a) {
                r ? n = t.call(i, n, e, o, a) : (n = e, r = !0)
            }), !r)throw new TypeError(T);
        return n
    }, _.reduceRight = _.foldr = function (e, t, n, i) {
        var r = arguments.length > 2;
        if (null == e && (e = []), f && e.reduceRight === f)return i && (t = _.bind(t, i)), r ? e.reduceRight(t, n) : e.reduceRight(t);
        var o = e.length;
        if (o !== +o) {
            var a = _.keys(e);
            o = a.length
        }
        if (C(e, function (s, l, u) {
                l = a ? a[--o] : --o, r ? n = t.call(i, n, e[l], l, u) : (n = e[l], r = !0)
            }), !r)throw new TypeError(T);
        return n
    }, _.find = _.detect = function (e, t, n) {
        var i;
        return S(e, function (e, r, o) {
            return t.call(n, e, r, o) ? (i = e, !0) : void 0
        }), i
    }, _.filter = _.select = function (e, t, n) {
        var i = [];
        return null == e ? i : m && e.filter === m ? e.filter(t, n) : (C(e, function (e, r, o) {
            t.call(n, e, r, o) && i.push(e)
        }), i)
    }, _.reject = function (e, t, n) {
        return _.filter(e, function (e, i, r) {
            return !t.call(n, e, i, r)
        }, n)
    }, _.every = _.all = function (e, t, i) {
        t || (t = _.identity);
        var r = !0;
        return null == e ? r : g && e.every === g ? e.every(t, i) : (C(e, function (e, o, a) {
            return (r = r && t.call(i, e, o, a)) ? void 0 : n
        }), !!r)
    };
    var S = _.some = _.any = function (e, t, i) {
        t || (t = _.identity);
        var r = !1;
        return null == e ? r : v && e.some === v ? e.some(t, i) : (C(e, function (e, o, a) {
            return r || (r = t.call(i, e, o, a)) ? n : void 0
        }), !!r)
    };
    _.contains = _.include = function (e, t) {
        return null == e ? !1 : y && e.indexOf === y ? -1 != e.indexOf(t) : S(e, function (e) {
            return e === t
        })
    }, _.invoke = function (e, t) {
        var n = s.call(arguments, 2), i = _.isFunction(t);
        return _.map(e, function (e) {
            return (i ? t : e[t]).apply(e, n)
        })
    }, _.pluck = function (e, t) {
        return _.map(e, _.property(t))
    }, _.where = function (e, t) {
        return _.filter(e, _.matches(t))
    }, _.findWhere = function (e, t) {
        return _.find(e, _.matches(t))
    }, _.max = function (e, t, n) {
        if (!t && _.isArray(e) && e[0] === +e[0] && e.length < 65535)return Math.max.apply(Math, e);
        var i = -1 / 0, r = -1 / 0;
        return C(e, function (e, o, a) {
            var s = t ? t.call(n, e, o, a) : e;
            s > r && (i = e, r = s)
        }), i
    }, _.min = function (e, t, n) {
        if (!t && _.isArray(e) && e[0] === +e[0] && e.length < 65535)return Math.min.apply(Math, e);
        var i = 1 / 0, r = 1 / 0;
        return C(e, function (e, o, a) {
            var s = t ? t.call(n, e, o, a) : e;
            r > s && (i = e, r = s)
        }), i
    }, _.shuffle = function (e) {
        var t, n = 0, i = [];
        return C(e, function (e) {
            t = _.random(n++), i[n - 1] = i[t], i[t] = e
        }), i
    }, _.sample = function (e, t, n) {
        return null == t || n ? (e.length !== +e.length && (e = _.values(e)), e[_.random(e.length - 1)]) : _.shuffle(e).slice(0, Math.max(0, t))
    };
    var E = function (e) {
        return null == e ? _.identity : _.isFunction(e) ? e : _.property(e)
    };
    _.sortBy = function (e, t, n) {
        return t = E(t), _.pluck(_.map(e, function (e, i, r) {
            return {value: e, index: i, criteria: t.call(n, e, i, r)}
        }).sort(function (e, t) {
            var n = e.criteria, i = t.criteria;
            if (n !== i) {
                if (n > i || void 0 === n)return 1;
                if (i > n || void 0 === i)return -1
            }
            return e.index - t.index
        }), "value")
    };
    var $ = function (e) {
        return function (t, n, i) {
            var r = {};
            return n = E(n), C(t, function (o, a) {
                var s = n.call(i, o, a, t);
                e(r, s, o)
            }), r
        }
    };
    _.groupBy = $(function (e, t, n) {
        _.has(e, t) ? e[t].push(n) : e[t] = [n]
    }), _.indexBy = $(function (e, t, n) {
        e[t] = n
    }), _.countBy = $(function (e, t) {
        _.has(e, t) ? e[t]++ : e[t] = 1
    }), _.sortedIndex = function (e, t, n, i) {
        n = E(n);
        for (var r = n.call(i, t), o = 0, a = e.length; a > o;) {
            var s = o + a >>> 1;
            n.call(i, e[s]) < r ? o = s + 1 : a = s
        }
        return o
    }, _.toArray = function (e) {
        return e ? _.isArray(e) ? s.call(e) : e.length === +e.length ? _.map(e, _.identity) : _.values(e) : []
    }, _.size = function (e) {
        return null == e ? 0 : e.length === +e.length ? e.length : _.keys(e).length
    }, _.first = _.head = _.take = function (e, t, n) {
        return null == e ? void 0 : null == t || n ? e[0] : 0 > t ? [] : s.call(e, 0, t)
    }, _.initial = function (e, t, n) {
        return s.call(e, 0, e.length - (null == t || n ? 1 : t))
    }, _.last = function (e, t, n) {
        return null == e ? void 0 : null == t || n ? e[e.length - 1] : s.call(e, Math.max(e.length - t, 0))
    }, _.rest = _.tail = _.drop = function (e, t, n) {
        return s.call(e, null == t || n ? 1 : t)
    }, _.compact = function (e) {
        return _.filter(e, _.identity)
    };
    var N = function (e, t, n) {
        return t && _.every(e, _.isArray) ? l.apply(n, e) : (C(e, function (e) {
            _.isArray(e) || _.isArguments(e) ? t ? a.apply(n, e) : N(e, t, n) : n.push(e)
        }), n)
    };
    _.flatten = function (e, t) {
        return N(e, t, [])
    }, _.without = function (e) {
        return _.difference(e, s.call(arguments, 1))
    }, _.partition = function (e, t) {
        var n = [], i = [];
        return C(e, function (e) {
            (t(e) ? n : i).push(e)
        }), [n, i]
    }, _.uniq = _.unique = function (e, t, n, i) {
        _.isFunction(t) && (i = n, n = t, t = !1);
        var r = n ? _.map(e, n, i) : e, o = [], a = [];
        return C(r, function (n, i) {
            (t ? i && a[a.length - 1] === n : _.contains(a, n)) || (a.push(n), o.push(e[i]))
        }), o
    }, _.union = function () {
        return _.uniq(_.flatten(arguments, !0))
    }, _.intersection = function (e) {
        var t = s.call(arguments, 1);
        return _.filter(_.uniq(e), function (e) {
            return _.every(t, function (t) {
                return _.contains(t, e)
            })
        })
    }, _.difference = function (e) {
        var t = l.apply(i, s.call(arguments, 1));
        return _.filter(e, function (e) {
            return !_.contains(t, e)
        })
    }, _.zip = function () {
        for (var e = _.max(_.pluck(arguments, "length").concat(0)), t = new Array(e), n = 0; e > n; n++)t[n] = _.pluck(arguments, "" + n);
        return t
    }, _.object = function (e, t) {
        if (null == e)return {};
        for (var n = {}, i = 0, r = e.length; r > i; i++)t ? n[e[i]] = t[i] : n[e[i][0]] = e[i][1];
        return n
    }, _.indexOf = function (e, t, n) {
        if (null == e)return -1;
        var i = 0, r = e.length;
        if (n) {
            if ("number" != typeof n)return i = _.sortedIndex(e, t), e[i] === t ? i : -1;
            i = 0 > n ? Math.max(0, r + n) : n
        }
        if (y && e.indexOf === y)return e.indexOf(t, n);
        for (; r > i; i++)if (e[i] === t)return i;
        return -1
    }, _.lastIndexOf = function (e, t, n) {
        if (null == e)return -1;
        var i = null != n;
        if (b && e.lastIndexOf === b)return i ? e.lastIndexOf(t, n) : e.lastIndexOf(t);
        for (var r = i ? n : e.length; r--;)if (e[r] === t)return r;
        return -1
    }, _.range = function (e, t, n) {
        arguments.length <= 1 && (t = e || 0, e = 0), n = arguments[2] || 1;
        for (var i = Math.max(Math.ceil((t - e) / n), 0), r = 0, o = new Array(i); i > r;)o[r++] = e, e += n;
        return o
    };
    var A = function () {
    };
    _.bind = function (e, t) {
        var n, i;
        if (k && e.bind === k)return k.apply(e, s.call(arguments, 1));
        if (!_.isFunction(e))throw new TypeError;
        return n = s.call(arguments, 2), i = function () {
            if (!(this instanceof i))return e.apply(t, n.concat(s.call(arguments)));
            A.prototype = e.prototype;
            var r = new A;
            A.prototype = null;
            var o = e.apply(r, n.concat(s.call(arguments)));
            return Object(o) === o ? o : r
        }
    }, _.partial = function (e) {
        var t = s.call(arguments, 1);
        return function () {
            for (var n = 0, i = t.slice(), r = 0, o = i.length; o > r; r++)i[r] === _ && (i[r] = arguments[n++]);
            for (; n < arguments.length;)i.push(arguments[n++]);
            return e.apply(this, i)
        }
    }, _.bindAll = function (e) {
        var t = s.call(arguments, 1);
        if (0 === t.length)throw new Error("bindAll must be passed function names");
        return C(t, function (t) {
            e[t] = _.bind(e[t], e)
        }), e
    }, _.memoize = function (e, t) {
        var n = {};
        return t || (t = _.identity), function () {
            var i = t.apply(this, arguments);
            return _.has(n, i) ? n[i] : n[i] = e.apply(this, arguments)
        }
    }, _.delay = function (e, t) {
        var n = s.call(arguments, 2);
        return setTimeout(function () {
            return e.apply(null, n)
        }, t)
    }, _.defer = function (e) {
        return _.delay.apply(_, [e, 1].concat(s.call(arguments, 1)))
    }, _.throttle = function (e, t, n) {
        var i, r, o, a = null, s = 0;
        n || (n = {});
        var l = function () {
            s = n.leading === !1 ? 0 : _.now(), a = null, o = e.apply(i, r), i = r = null
        };
        return function () {
            var u = _.now();
            s || n.leading !== !1 || (s = u);
            var c = t - (u - s);
            return i = this, r = arguments, 0 >= c ? (clearTimeout(a), a = null, s = u, o = e.apply(i, r), i = r = null) : a || n.trailing === !1 || (a = setTimeout(l, c)), o
        }
    }, _.debounce = function (e, t, n) {
        var i, r, o, a, s, l = function () {
            var u = _.now() - a;
            t > u ? i = setTimeout(l, t - u) : (i = null, n || (s = e.apply(o, r), o = r = null))
        };
        return function () {
            o = this, r = arguments, a = _.now();
            var u = n && !i;
            return i || (i = setTimeout(l, t)), u && (s = e.apply(o, r), o = r = null), s
        }
    }, _.once = function (e) {
        var t, n = !1;
        return function () {
            return n ? t : (n = !0, t = e.apply(this, arguments), e = null, t)
        }
    }, _.wrap = function (e, t) {
        return _.partial(t, e)
    }, _.compose = function () {
        var e = arguments;
        return function () {
            for (var t = arguments, n = e.length - 1; n >= 0; n--)t = [e[n].apply(this, t)];
            return t[0]
        }
    }, _.after = function (e, t) {
        return function () {
            return --e < 1 ? t.apply(this, arguments) : void 0
        }
    }, _.keys = function (e) {
        if (!_.isObject(e))return [];
        if (w)return w(e);
        var t = [];
        for (var n in e)_.has(e, n) && t.push(n);
        return t
    }, _.values = function (e) {
        for (var t = _.keys(e), n = t.length, i = new Array(n), r = 0; n > r; r++)i[r] = e[t[r]];
        return i
    }, _.pairs = function (e) {
        for (var t = _.keys(e), n = t.length, i = new Array(n), r = 0; n > r; r++)i[r] = [t[r], e[t[r]]];
        return i
    }, _.invert = function (e) {
        for (var t = {}, n = _.keys(e), i = 0, r = n.length; r > i; i++)t[e[n[i]]] = n[i];
        return t
    }, _.functions = _.methods = function (e) {
        var t = [];
        for (var n in e)_.isFunction(e[n]) && t.push(n);
        return t.sort()
    }, _.extend = function (e) {
        return C(s.call(arguments, 1), function (t) {
            if (t)for (var n in t)e[n] = t[n]
        }), e
    }, _.pick = function (e) {
        var t = {}, n = l.apply(i, s.call(arguments, 1));
        return C(n, function (n) {
            n in e && (t[n] = e[n])
        }), t
    }, _.omit = function (e) {
        var t = {}, n = l.apply(i, s.call(arguments, 1));
        for (var r in e)_.contains(n, r) || (t[r] = e[r]);
        return t
    }, _.defaults = function (e) {
        return C(s.call(arguments, 1), function (t) {
            if (t)for (var n in t)void 0 === e[n] && (e[n] = t[n])
        }), e
    }, _.clone = function (e) {
        return _.isObject(e) ? _.isArray(e) ? e.slice() : _.extend({}, e) : e
    }, _.tap = function (e, t) {
        return t(e), e
    };
    var j = function (e, t, n, i) {
        if (e === t)return 0 !== e || 1 / e == 1 / t;
        if (null == e || null == t)return e === t;
        e instanceof _ && (e = e._wrapped), t instanceof _ && (t = t._wrapped);
        var r = u.call(e);
        if (r != u.call(t))return !1;
        switch (r) {
            case"[object String]":
                return e == String(t);
            case"[object Number]":
                return e != +e ? t != +t : 0 == e ? 1 / e == 1 / t : e == +t;
            case"[object Date]":
            case"[object Boolean]":
                return +e == +t;
            case"[object RegExp]":
                return e.source == t.source && e.global == t.global && e.multiline == t.multiline && e.ignoreCase == t.ignoreCase
        }
        if ("object" != typeof e || "object" != typeof t)return !1;
        for (var o = n.length; o--;)if (n[o] == e)return i[o] == t;
        var a = e.constructor, s = t.constructor;
        if (a !== s && !(_.isFunction(a) && a instanceof a && _.isFunction(s) && s instanceof s) && "constructor" in e && "constructor" in t)return !1;
        n.push(e), i.push(t);
        var l = 0, c = !0;
        if ("[object Array]" == r) {
            if (l = e.length, c = l == t.length)for (; l-- && (c = j(e[l], t[l], n, i)););
        } else {
            for (var d in e)if (_.has(e, d) && (l++, !(c = _.has(t, d) && j(e[d], t[d], n, i))))break;
            if (c) {
                for (d in t)if (_.has(t, d) && !l--)break;
                c = !l
            }
        }
        return n.pop(), i.pop(), c
    };
    _.isEqual = function (e, t) {
        return j(e, t, [], [])
    }, _.isEmpty = function (e) {
        if (null == e)return !0;
        if (_.isArray(e) || _.isString(e))return 0 === e.length;
        for (var t in e)if (_.has(e, t))return !1;
        return !0
    }, _.isElement = function (e) {
        return !(!e || 1 !== e.nodeType)
    }, _.isArray = x || function (e) {
            return "[object Array]" == u.call(e)
        }, _.isObject = function (e) {
        return e === Object(e)
    }, C(["Arguments", "Function", "String", "Number", "Date", "RegExp"], function (e) {
        _["is" + e] = function (t) {
            return u.call(t) == "[object " + e + "]"
        }
    }), _.isArguments(arguments) || (_.isArguments = function (e) {
        return !(!e || !_.has(e, "callee"))
    }), "function" != typeof/./ && (_.isFunction = function (e) {
        return "function" == typeof e
    }), _.isFinite = function (e) {
        return isFinite(e) && !isNaN(parseFloat(e))
    }, _.isNaN = function (e) {
        return _.isNumber(e) && e != +e
    }, _.isBoolean = function (e) {
        return e === !0 || e === !1 || "[object Boolean]" == u.call(e)
    }, _.isNull = function (e) {
        return null === e
    }, _.isUndefined = function (e) {
        return void 0 === e
    }, _.has = function (e, t) {
        return c.call(e, t)
    }, _.noConflict = function () {
        return e._ = t, this
    }, _.identity = function (e) {
        return e
    }, _.constant = function (e) {
        return function () {
            return e
        }
    }, _.property = function (e) {
        return function (t) {
            return t[e]
        }
    }, _.matches = function (e) {
        return function (t) {
            if (t === e)return !0;
            for (var n in e)if (e[n] !== t[n])return !1;
            return !0
        }
    }, _.times = function (e, t, n) {
        for (var i = Array(Math.max(0, e)), r = 0; e > r; r++)i[r] = t.call(n, r);
        return i
    }, _.random = function (e, t) {
        return null == t && (t = e, e = 0), e + Math.floor(Math.random() * (t - e + 1))
    }, _.now = Date.now || function () {
            return (new Date).getTime()
        };
    var O = {escape: {"&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#x27;"}};
    O.unescape = _.invert(O.escape);
    var D = {
        escape: new RegExp("[" + _.keys(O.escape).join("") + "]", "g"),
        unescape: new RegExp("(" + _.keys(O.unescape).join("|") + ")", "g")
    };
    _.each(["escape", "unescape"], function (e) {
        _[e] = function (t) {
            return null == t ? "" : ("" + t).replace(D[e], function (t) {
                return O[e][t]
            })
        }
    }), _.result = function (e, t) {
        if (null == e)return void 0;
        var n = e[t];
        return _.isFunction(n) ? n.call(e) : n
    }, _.mixin = function (e) {
        C(_.functions(e), function (t) {
            var n = _[t] = e[t];
            _.prototype[t] = function () {
                var e = [this._wrapped];
                return a.apply(e, arguments), R.call(this, n.apply(_, e))
            }
        })
    };
    var I = 0;
    _.uniqueId = function (e) {
        var t = ++I + "";
        return e ? e + t : t
    }, _.templateSettings = {evaluate: /<%([\s\S]+?)%>/g, interpolate: /<%=([\s\S]+?)%>/g, escape: /<%-([\s\S]+?)%>/g};
    var M = /(.)^/, P = {
        "'": "'",
        "\\": "\\",
        "\r": "r",
        "\n": "n",
        "	": "t",
        "\u2028": "u2028",
        "\u2029": "u2029"
    }, q = /\\|'|\r|\n|\t|\u2028|\u2029/g;
    _.template = function (e, t, n) {
        var i;
        n = _.defaults({}, n, _.templateSettings);
        var r = new RegExp([(n.escape || M).source, (n.interpolate || M).source, (n.evaluate || M).source].join("|") + "|$", "g"), o = 0, a = "__p+='";
        e.replace(r, function (t, n, i, r, s) {
            return a += e.slice(o, s).replace(q, function (e) {
                return "\\" + P[e]
            }), n && (a += "'+\n((__t=(" + n + "))==null?'':_.escape(__t))+\n'"), i && (a += "'+\n((__t=(" + i + "))==null?'':__t)+\n'"), r && (a += "';\n" + r + "\n__p+='"), o = s + t.length, t
        }), a += "';\n", n.variable || (a = "with(obj||{}){\n" + a + "}\n"), a = "var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n" + a + "return __p;\n";
        try {
            i = new Function(n.variable || "obj", "_", a)
        } catch (s) {
            throw s.source = a, s
        }
        if (t)return i(t, _);
        var l = function (e) {
            return i.call(this, e, _)
        };
        return l.source = "function(" + (n.variable || "obj") + "){\n" + a + "}", l
    }, _.chain = function (e) {
        return _(e).chain()
    };
    var R = function (e) {
        return this._chain ? _(e).chain() : e
    };
    _.mixin(_), C(["pop", "push", "reverse", "shift", "sort", "splice", "unshift"], function (e) {
        var t = i[e];
        _.prototype[e] = function () {
            var n = this._wrapped;
            return t.apply(n, arguments), "shift" != e && "splice" != e || 0 !== n.length || delete n[0], R.call(this, n)
        }
    }), C(["concat", "join", "slice"], function (e) {
        var t = i[e];
        _.prototype[e] = function () {
            return R.call(this, t.apply(this._wrapped, arguments))
        }
    }), _.extend(_.prototype, {
        chain: function () {
            return this._chain = !0, this
        }, value: function () {
            return this._wrapped
        }
    }), "function" == typeof define && define.amd && define("underscore", [], function () {
        return _
    })
}.call(this), function (e, t) {
    if ("function" == typeof define && define.amd)define(["underscore", "jquery", "exports"], function (n, i, r) {
        e.Backbone = t(e, r, n, i)
    }); else if ("undefined" != typeof exports) {
        var n = require("underscore");
        t(e, exports, n)
    } else e.Backbone = t(e, {}, e._, e.jQuery || e.Zepto || e.ender || e.$)
}(this, function (e, t, n, i) {
    {
        var r = e.Backbone, o = [], a = (o.push, o.slice);
        o.splice
    }
    t.VERSION = "1.1.2", t.$ = i, t.noConflict = function () {
        return e.Backbone = r, this
    }, t.emulateHTTP = !1, t.emulateJSON = !1;
    var s = t.Events = {
        on: function (e, t, n) {
            if (!u(this, "on", e, [t, n]) || !t)return this;
            this._events || (this._events = {});
            var i = this._events[e] || (this._events[e] = []);
            return i.push({callback: t, context: n, ctx: n || this}), this
        }, once: function (e, t, i) {
            if (!u(this, "once", e, [t, i]) || !t)return this;
            var r = this, o = n.once(function () {
                r.off(e, o), t.apply(this, arguments)
            });
            return o._callback = t, this.on(e, o, i)
        }, off: function (e, t, i) {
            var r, o, a, s, l, c, d, p;
            if (!this._events || !u(this, "off", e, [t, i]))return this;
            if (!e && !t && !i)return this._events = void 0, this;
            for (s = e ? [e] : n.keys(this._events), l = 0, c = s.length; c > l; l++)if (e = s[l], a = this._events[e]) {
                if (this._events[e] = r = [], t || i)for (d = 0, p = a.length; p > d; d++)o = a[d], (t && t !== o.callback && t !== o.callback._callback || i && i !== o.context) && r.push(o);
                r.length || delete this._events[e]
            }
            return this
        }, trigger: function (e) {
            if (!this._events)return this;
            var t = a.call(arguments, 1);
            if (!u(this, "trigger", e, t))return this;
            var n = this._events[e], i = this._events.all;
            return n && c(n, t), i && c(i, arguments), this
        }, stopListening: function (e, t, i) {
            var r = this._listeningTo;
            if (!r)return this;
            var o = !t && !i;
            i || "object" != typeof t || (i = this), e && ((r = {})[e._listenId] = e);
            for (var a in r)e = r[a], e.off(t, i, this), (o || n.isEmpty(e._events)) && delete this._listeningTo[a];
            return this
        }
    }, l = /\s+/, u = function (e, t, n, i) {
        if (!n)return !0;
        if ("object" == typeof n) {
            for (var r in n)e[t].apply(e, [r, n[r]].concat(i));
            return !1
        }
        if (l.test(n)) {
            for (var o = n.split(l), a = 0, s = o.length; s > a; a++)e[t].apply(e, [o[a]].concat(i));
            return !1
        }
        return !0
    }, c = function (e, t) {
        var n, i = -1, r = e.length, o = t[0], a = t[1], s = t[2];
        switch (t.length) {
            case 0:
                for (; ++i < r;)(n = e[i]).callback.call(n.ctx);
                return;
            case 1:
                for (; ++i < r;)(n = e[i]).callback.call(n.ctx, o);
                return;
            case 2:
                for (; ++i < r;)(n = e[i]).callback.call(n.ctx, o, a);
                return;
            case 3:
                for (; ++i < r;)(n = e[i]).callback.call(n.ctx, o, a, s);
                return;
            default:
                for (; ++i < r;)(n = e[i]).callback.apply(n.ctx, t);
                return
        }
    }, d = {listenTo: "on", listenToOnce: "once"};
    n.each(d, function (e, t) {
        s[t] = function (t, i, r) {
            var o = this._listeningTo || (this._listeningTo = {}), a = t._listenId || (t._listenId = n.uniqueId("l"));
            return o[a] = t, r || "object" != typeof i || (r = this), t[e](i, r, this), this
        }
    }), s.bind = s.on, s.unbind = s.off, n.extend(t, s);
    var p = t.Model = function (e, t) {
        var i = e || {};
        t || (t = {}), this.cid = n.uniqueId("c"), this.attributes = {}, t.collection && (this.collection = t.collection), t.parse && (i = this.parse(i, t) || {}), i = n.defaults({}, i, n.result(this, "defaults")), this.set(i, t), this.changed = {}, this.initialize.apply(this, arguments)
    };
    n.extend(p.prototype, s, {
        changed: null, validationError: null, idAttribute: "id", initialize: function () {
        }, toJSON: function () {
            return n.clone(this.attributes)
        }, sync: function () {
            return t.sync.apply(this, arguments)
        }, get: function (e) {
            return this.attributes[e]
        }, escape: function (e) {
            return n.escape(this.get(e))
        }, has: function (e) {
            return null != this.get(e)
        }, set: function (e, t, i) {
            var r, o, a, s, l, u, c, d;
            if (null == e)return this;
            if ("object" == typeof e ? (o = e, i = t) : (o = {})[e] = t, i || (i = {}), !this._validate(o, i))return !1;
            a = i.unset, l = i.silent, s = [], u = this._changing, this._changing = !0, u || (this._previousAttributes = n.clone(this.attributes), this.changed = {}), d = this.attributes, c = this._previousAttributes, this.idAttribute in o && (this.id = o[this.idAttribute]);
            for (r in o)t = o[r], n.isEqual(d[r], t) || s.push(r), n.isEqual(c[r], t) ? delete this.changed[r] : this.changed[r] = t, a ? delete d[r] : d[r] = t;
            if (!l) {
                s.length && (this._pending = i);
                for (var p = 0, h = s.length; h > p; p++)this.trigger("change:" + s[p], this, d[s[p]], i)
            }
            if (u)return this;
            if (!l)for (; this._pending;)i = this._pending, this._pending = !1, this.trigger("change", this, i);
            return this._pending = !1, this._changing = !1, this
        }, unset: function (e, t) {
            return this.set(e, void 0, n.extend({}, t, {unset: !0}))
        }, clear: function (e) {
            var t = {};
            for (var i in this.attributes)t[i] = void 0;
            return this.set(t, n.extend({}, e, {unset: !0}))
        }, hasChanged: function (e) {
            return null == e ? !n.isEmpty(this.changed) : n.has(this.changed, e)
        }, changedAttributes: function (e) {
            if (!e)return this.hasChanged() ? n.clone(this.changed) : !1;
            var t, i = !1, r = this._changing ? this._previousAttributes : this.attributes;
            for (var o in e)n.isEqual(r[o], t = e[o]) || ((i || (i = {}))[o] = t);
            return i
        }, previous: function (e) {
            return null != e && this._previousAttributes ? this._previousAttributes[e] : null
        }, previousAttributes: function () {
            return n.clone(this._previousAttributes)
        }, fetch: function (e) {
            e = e ? n.clone(e) : {}, void 0 === e.parse && (e.parse = !0);
            var t = this, i = e.success;
            return e.success = function (n) {
                return t.set(t.parse(n, e), e) ? (i && i(t, n, e), void t.trigger("sync", t, n, e)) : !1
            }, q(this, e), this.sync("read", this, e)
        }, save: function (e, t, i) {
            var r, o, a, s = this.attributes;
            if (null == e || "object" == typeof e ? (r = e, i = t) : (r = {})[e] = t, i = n.extend({validate: !0}, i), r && !i.wait) {
                if (!this.set(r, i))return !1
            } else if (!this._validate(r, i))return !1;
            r && i.wait && (this.attributes = n.extend({}, s, r)), void 0 === i.parse && (i.parse = !0);
            var l = this, u = i.success;
            return i.success = function (e) {
                l.attributes = s;
                var t = l.parse(e, i);
                return i.wait && (t = n.extend(r || {}, t)), n.isObject(t) && !l.set(t, i) ? !1 : (u && u(l, e, i), void l.trigger("sync", l, e, i))
            }, q(this, i), o = this.isNew() ? "create" : i.patch ? "patch" : "update", "patch" === o && (i.attrs = r), a = this.sync(o, this, i), r && i.wait && (this.attributes = s), a
        }, destroy: function (e) {
            e = e ? n.clone(e) : {};
            var t = this, i = e.success, r = function () {
                t.trigger("destroy", t, t.collection, e)
            };
            if (e.success = function (n) {
                    (e.wait || t.isNew()) && r(), i && i(t, n, e), t.isNew() || t.trigger("sync", t, n, e)
                }, this.isNew())return e.success(), !1;
            q(this, e);
            var o = this.sync("delete", this, e);
            return e.wait || r(), o
        }, url: function () {
            var e = n.result(this, "urlRoot") || n.result(this.collection, "url") || P();
            return this.isNew() ? e : e.replace(/([^\/])$/, "$1/") + encodeURIComponent(this.id)
        }, parse: function (e) {
            return e
        }, clone: function () {
            return new this.constructor(this.attributes)
        }, isNew: function () {
            return !this.has(this.idAttribute)
        }, isValid: function (e) {
            return this._validate({}, n.extend(e || {}, {validate: !0}))
        }, _validate: function (e, t) {
            if (!t.validate || !this.validate)return !0;
            e = n.extend({}, this.attributes, e);
            var i = this.validationError = this.validate(e, t) || null;
            return i ? (this.trigger("invalid", this, i, n.extend(t, {validationError: i})), !1) : !0
        }
    });
    var h = ["keys", "values", "pairs", "invert", "pick", "omit"];
    n.each(h, function (e) {
        p.prototype[e] = function () {
            var t = a.call(arguments);
            return t.unshift(this.attributes), n[e].apply(n, t)
        }
    });
    var f = t.Collection = function (e, t) {
        t || (t = {}), t.model && (this.model = t.model), void 0 !== t.comparator && (this.comparator = t.comparator), this._reset(), this.initialize.apply(this, arguments), e && this.reset(e, n.extend({silent: !0}, t))
    }, m = {add: !0, remove: !0, merge: !0}, g = {add: !0, remove: !1};
    n.extend(f.prototype, s, {
        model: p, initialize: function () {
        }, toJSON: function (e) {
            return this.map(function (t) {
                return t.toJSON(e)
            })
        }, sync: function () {
            return t.sync.apply(this, arguments)
        }, add: function (e, t) {
            return this.set(e, n.extend({merge: !1}, t, g))
        }, remove: function (e, t) {
            var i = !n.isArray(e);
            e = i ? [e] : n.clone(e), t || (t = {});
            var r, o, a, s;
            for (r = 0, o = e.length; o > r; r++)s = e[r] = this.get(e[r]), s && (delete this._byId[s.id], delete this._byId[s.cid], a = this.indexOf(s), this.models.splice(a, 1), this.length--, t.silent || (t.index = a, s.trigger("remove", s, this, t)), this._removeReference(s, t));
            return i ? e[0] : e
        }, set: function (e, t) {
            t = n.defaults({}, t, m), t.parse && (e = this.parse(e, t));
            var i = !n.isArray(e);
            e = i ? e ? [e] : [] : n.clone(e);
            var r, o, a, s, l, u, c, d = t.at, h = this.model, f = this.comparator && null == d && t.sort !== !1, g = n.isString(this.comparator) ? this.comparator : null, v = [], y = [], b = {}, x = t.add, w = t.merge, k = t.remove, _ = !f && x && k ? [] : !1;
            for (r = 0, o = e.length; o > r; r++) {
                if (l = e[r] || {}, a = l instanceof p ? s = l : l[h.prototype.idAttribute || "id"], u = this.get(a))k && (b[u.cid] = !0), w && (l = l === s ? s.attributes : l, t.parse && (l = u.parse(l, t)), u.set(l, t), f && !c && u.hasChanged(g) && (c = !0)), e[r] = u; else if (x) {
                    if (s = e[r] = this._prepareModel(l, t), !s)continue;
                    v.push(s), this._addReference(s, t)
                }
                s = u || s, !_ || !s.isNew() && b[s.id] || _.push(s), b[s.id] = !0
            }
            if (k) {
                for (r = 0, o = this.length; o > r; ++r)b[(s = this.models[r]).cid] || y.push(s);
                y.length && this.remove(y, t)
            }
            if (v.length || _ && _.length)if (f && (c = !0), this.length += v.length, null != d)for (r = 0, o = v.length; o > r; r++)this.models.splice(d + r, 0, v[r]); else {
                _ && (this.models.length = 0);
                var C = _ || v;
                for (r = 0, o = C.length; o > r; r++)this.models.push(C[r])
            }
            if (c && this.sort({silent: !0}), !t.silent) {
                for (r = 0, o = v.length; o > r; r++)(s = v[r]).trigger("add", s, this, t);
                (c || _ && _.length) && this.trigger("sort", this, t)
            }
            return i ? e[0] : e
        }, reset: function (e, t) {
            t || (t = {});
            for (var i = 0, r = this.models.length; r > i; i++)this._removeReference(this.models[i], t);
            return t.previousModels = this.models, this._reset(), e = this.add(e, n.extend({silent: !0}, t)), t.silent || this.trigger("reset", this, t), e
        }, push: function (e, t) {
            return this.add(e, n.extend({at: this.length}, t))
        }, pop: function (e) {
            var t = this.at(this.length - 1);
            return this.remove(t, e), t
        }, unshift: function (e, t) {
            return this.add(e, n.extend({at: 0}, t))
        }, shift: function (e) {
            var t = this.at(0);
            return this.remove(t, e), t
        }, slice: function () {
            return a.apply(this.models, arguments)
        }, get: function (e) {
            return null == e ? void 0 : this._byId[e] || this._byId[e.id] || this._byId[e.cid]
        }, at: function (e) {
            return this.models[e]
        }, where: function (e, t) {
            return n.isEmpty(e) ? t ? void 0 : [] : this[t ? "find" : "filter"](function (t) {
                for (var n in e)if (e[n] !== t.get(n))return !1;
                return !0
            })
        }, findWhere: function (e) {
            return this.where(e, !0)
        }, sort: function (e) {
            if (!this.comparator)throw new Error("Cannot sort a set without a comparator");
            return e || (e = {}), n.isString(this.comparator) || 1 === this.comparator.length ? this.models = this.sortBy(this.comparator, this) : this.models.sort(n.bind(this.comparator, this)), e.silent || this.trigger("sort", this, e), this
        }, pluck: function (e) {
            return n.invoke(this.models, "get", e)
        }, fetch: function (e) {
            e = e ? n.clone(e) : {}, void 0 === e.parse && (e.parse = !0);
            var t = e.success, i = this;
            return e.success = function (n) {
                var r = e.reset ? "reset" : "set";
                i[r](n, e), t && t(i, n, e), i.trigger("sync", i, n, e)
            }, q(this, e), this.sync("read", this, e)
        }, create: function (e, t) {
            if (t = t ? n.clone(t) : {}, !(e = this._prepareModel(e, t)))return !1;
            t.wait || this.add(e, t);
            var i = this, r = t.success;
            return t.success = function (e, n) {
                t.wait && i.add(e, t), r && r(e, n, t)
            }, e.save(null, t), e
        }, parse: function (e) {
            return e
        }, clone: function () {
            return new this.constructor(this.models)
        }, _reset: function () {
            this.length = 0, this.models = [], this._byId = {}
        }, _prepareModel: function (e, t) {
            if (e instanceof p)return e;
            t = t ? n.clone(t) : {}, t.collection = this;
            var i = new this.model(e, t);
            return i.validationError ? (this.trigger("invalid", this, i.validationError, t), !1) : i
        }, _addReference: function (e) {
            this._byId[e.cid] = e, null != e.id && (this._byId[e.id] = e), e.collection || (e.collection = this), e.on("all", this._onModelEvent, this)
        }, _removeReference: function (e) {
            this === e.collection && delete e.collection, e.off("all", this._onModelEvent, this)
        }, _onModelEvent: function (e, t, n, i) {
            ("add" !== e && "remove" !== e || n === this) && ("destroy" === e && this.remove(t, i), t && e === "change:" + t.idAttribute && (delete this._byId[t.previous(t.idAttribute)], null != t.id && (this._byId[t.id] = t)), this.trigger.apply(this, arguments))
        }
    });
    var v = ["forEach", "each", "map", "collect", "reduce", "foldl", "inject", "reduceRight", "foldr", "find", "detect", "filter", "select", "reject", "every", "all", "some", "any", "include", "contains", "invoke", "max", "min", "toArray", "size", "first", "head", "take", "initial", "rest", "tail", "drop", "last", "without", "difference", "indexOf", "shuffle", "lastIndexOf", "isEmpty", "chain", "sample"];
    n.each(v, function (e) {
        f.prototype[e] = function () {
            var t = a.call(arguments);
            return t.unshift(this.models), n[e].apply(n, t)
        }
    });
    var y = ["groupBy", "countBy", "sortBy", "indexBy"];
    n.each(y, function (e) {
        f.prototype[e] = function (t, i) {
            var r = n.isFunction(t) ? t : function (e) {
                return e.get(t)
            };
            return n[e](this.models, r, i)
        }
    });
    var b = t.View = function (e) {
        this.cid = n.uniqueId("view"), e || (e = {}), n.extend(this, n.pick(e, w)), this._ensureElement(), this.initialize.apply(this, arguments), this.delegateEvents()
    }, x = /^(\S+)\s*(.*)$/, w = ["model", "collection", "el", "id", "attributes", "className", "tagName", "events"];
    n.extend(b.prototype, s, {
        tagName: "div", $: function (e) {
            return this.$el.find(e)
        }, initialize: function () {
        }, render: function () {
            return this
        }, remove: function () {
            return this.$el.remove(), this.stopListening(), this
        }, setElement: function (e, n) {
            return this.$el && this.undelegateEvents(), this.$el = e instanceof t.$ ? e : t.$(e), this.el = this.$el[0], n !== !1 && this.delegateEvents(), this
        }, delegateEvents: function (e) {
            if (!e && !(e = n.result(this, "events")))return this;
            this.undelegateEvents();
            for (var t in e) {
                var i = e[t];
                if (n.isFunction(i) || (i = this[e[t]]), i) {
                    var r = t.match(x), o = r[1], a = r[2];
                    i = n.bind(i, this), o += ".delegateEvents" + this.cid, "" === a ? this.$el.on(o, i) : this.$el.on(o, a, i)
                }
            }
            return this
        }, undelegateEvents: function () {
            return this.$el.off(".delegateEvents" + this.cid), this
        }, _ensureElement: function () {
            if (this.el)this.setElement(n.result(this, "el"), !1); else {
                var e = n.extend({}, n.result(this, "attributes"));
                this.id && (e.id = n.result(this, "id")), this.className && (e["class"] = n.result(this, "className"));
                var i = t.$("<" + n.result(this, "tagName") + ">").attr(e);
                this.setElement(i, !1)
            }
        }
    }), t.sync = function (e, i, r) {
        var o = _[e];
        n.defaults(r || (r = {}), {emulateHTTP: t.emulateHTTP, emulateJSON: t.emulateJSON});
        var a = {type: o, dataType: "json"};
        if (r.url || (a.url = n.result(i, "url") || P()), null != r.data || !i || "create" !== e && "update" !== e && "patch" !== e || (a.contentType = "application/json", a.data = JSON.stringify(r.attrs || i.toJSON(r))), r.emulateJSON && (a.contentType = "application/x-www-form-urlencoded", a.data = a.data ? {model: a.data} : {}), r.emulateHTTP && ("PUT" === o || "DELETE" === o || "PATCH" === o)) {
            a.type = "POST", r.emulateJSON && (a.data._method = o);
            var s = r.beforeSend;
            r.beforeSend = function (e) {
                return e.setRequestHeader("X-HTTP-Method-Override", o), s ? s.apply(this, arguments) : void 0
            }
        }
        "GET" === a.type || r.emulateJSON || (a.processData = !1), "PATCH" === a.type && k && (a.xhr = function () {
            return new ActiveXObject("Microsoft.XMLHTTP")
        });
        var l = r.xhr = t.ajax(n.extend(a, r));
        return i.trigger("request", i, l, r), l
    };
    var k = !("undefined" == typeof window || !window.ActiveXObject || window.XMLHttpRequest && (new XMLHttpRequest).dispatchEvent), _ = {
        create: "POST",
        update: "PUT",
        patch: "PATCH",
        "delete": "DELETE",
        read: "GET"
    };
    t.ajax = function () {
        return t.$.ajax.apply(t.$, arguments)
    };
    var C = t.Router = function (e) {
        e || (e = {}), e.routes && (this.routes = e.routes), this._bindRoutes(), this.initialize.apply(this, arguments)
    }, T = /\((.*?)\)/g, S = /(\(\?)?:\w+/g, E = /\*\w+/g, $ = /[\-{}\[\]+?.,\\\^$|#\s]/g;
    n.extend(C.prototype, s, {
        initialize: function () {
        }, route: function (e, i, r) {
            n.isRegExp(e) || (e = this._routeToRegExp(e)), n.isFunction(i) && (r = i, i = ""), r || (r = this[i]);
            var o = this;
            return t.history.route(e, function (n) {
                var a = o._extractParameters(e, n);
                o.execute(r, a), o.trigger.apply(o, ["route:" + i].concat(a)), o.trigger("route", i, a), t.history.trigger("route", o, i, a)
            }), this
        }, execute: function (e, t) {
            e && e.apply(this, t)
        }, navigate: function (e, n) {
            return t.history.navigate(e, n), this
        }, _bindRoutes: function () {
            if (this.routes) {
                this.routes = n.result(this, "routes");
                for (var e, t = n.keys(this.routes); null != (e = t.pop());)this.route(e, this.routes[e])
            }
        }, _routeToRegExp: function (e) {
            return e = e.replace($, "\\$&").replace(T, "(?:$1)?").replace(S, function (e, t) {
                return t ? e : "([^/?]+)"
            }).replace(E, "([^?]*?)"), new RegExp("^" + e + "(?:\\?([\\s\\S]*))?$")
        }, _extractParameters: function (e, t) {
            var i = e.exec(t).slice(1);
            return n.map(i, function (e, t) {
                return t === i.length - 1 ? e || null : e ? decodeURIComponent(e) : null
            })
        }
    });
    var N = t.History = function () {
        this.handlers = [], n.bindAll(this, "checkUrl"), "undefined" != typeof window && (this.location = window.location, this.history = window.history)
    }, A = /^[#\/]|\s+$/g, j = /^\/+|\/+$/g, O = /msie [\w.]+/, D = /\/$/, I = /#.*$/;
    N.started = !1, n.extend(N.prototype, s, {
        interval: 50, atRoot: function () {
            return this.location.pathname.replace(/[^\/]$/, "$&/") === this.root
        }, getHash: function (e) {
            var t = (e || this).location.href.match(/#(.*)$/);
            return t ? t[1] : ""
        }, getFragment: function (e, t) {
            if (null == e)if (this._hasPushState || !this._wantsHashChange || t) {
                e = decodeURI(this.location.pathname + this.location.search);
                var n = this.root.replace(D, "");
                e.indexOf(n) || (e = e.slice(n.length))
            } else e = this.getHash();
            return e.replace(A, "")
        }, start: function (e) {
            if (N.started)throw new Error("Backbone.history has already been started");
            N.started = !0, this.options = n.extend({root: "/"}, this.options, e), this.root = this.options.root, this._wantsHashChange = this.options.hashChange !== !1, this._wantsPushState = !!this.options.pushState, this._hasPushState = !!(this.options.pushState && this.history && this.history.pushState);
            var i = this.getFragment(), r = document.documentMode, o = O.exec(navigator.userAgent.toLowerCase()) && (!r || 7 >= r);
            if (this.root = ("/" + this.root + "/").replace(j, "/"), o && this._wantsHashChange) {
                var a = t.$('<iframe src="javascript:0" tabindex="-1">');
                this.iframe = a.hide().appendTo("body")[0].contentWindow, this.navigate(i)
            }
            this._hasPushState ? t.$(window).on("popstate", this.checkUrl) : this._wantsHashChange && "onhashchange" in window && !o ? t.$(window).on("hashchange", this.checkUrl) : this._wantsHashChange && (this._checkUrlInterval = setInterval(this.checkUrl, this.interval)), this.fragment = i;
            var s = this.location;
            if (this._wantsHashChange && this._wantsPushState) {
                if (!this._hasPushState && !this.atRoot())return this.fragment = this.getFragment(null, !0), this.location.replace(this.root + "#" + this.fragment), !0;
                this._hasPushState && this.atRoot() && s.hash && (this.fragment = this.getHash().replace(A, ""), this.history.replaceState({}, document.title, this.root + this.fragment))
            }
            return this.options.silent ? void 0 : this.loadUrl()
        }, stop: function () {
            t.$(window).off("popstate", this.checkUrl).off("hashchange", this.checkUrl), this._checkUrlInterval && clearInterval(this._checkUrlInterval), N.started = !1
        }, route: function (e, t) {
            this.handlers.unshift({route: e, callback: t})
        }, checkUrl: function () {
            var e = this.getFragment();
            return e === this.fragment && this.iframe && (e = this.getFragment(this.getHash(this.iframe))), e === this.fragment ? !1 : (this.iframe && this.navigate(e), void this.loadUrl())
        }, loadUrl: function (e) {
            return e = this.fragment = this.getFragment(e), n.any(this.handlers, function (t) {
                return t.route.test(e) ? (t.callback(e), !0) : void 0
            })
        }, navigate: function (e, t) {
            if (!N.started)return !1;
            t && t !== !0 || (t = {trigger: !!t});
            var n = this.root + (e = this.getFragment(e || ""));
            if (e = e.replace(I, ""), this.fragment !== e) {
                if (this.fragment = e, "" === e && "/" !== n && (n = n.slice(0, -1)), this._hasPushState)this.history[t.replace ? "replaceState" : "pushState"]({}, document.title, n); else {
                    if (!this._wantsHashChange)return this.location.assign(n);
                    this._updateHash(this.location, e, t.replace), this.iframe && e !== this.getFragment(this.getHash(this.iframe)) && (t.replace || this.iframe.document.open().close(), this._updateHash(this.iframe.location, e, t.replace))
                }
                return t.trigger ? this.loadUrl(e) : void 0
            }
        }, _updateHash: function (e, t, n) {
            if (n) {
                var i = e.href.replace(/(javascript:|#).*$/, "");
                e.replace(i + "#" + t)
            } else e.hash = "#" + t
        }
    }), t.history = new N;
    var M = function (e, t) {
        var i, r = this;
        i = e && n.has(e, "constructor") ? e.constructor : function () {
            return r.apply(this, arguments)
        }, n.extend(i, r, t);
        var o = function () {
            this.constructor = i
        };
        return o.prototype = r.prototype, i.prototype = new o, e && n.extend(i.prototype, e), i.__super__ = r.prototype, i
    };
    p.extend = f.extend = C.extend = b.extend = N.extend = M;
    var P = function () {
        throw new Error('A "url" property or function must be specified')
    }, q = function (e, t) {
        var n = t.error;
        t.error = function (i) {
            n && n(e, i, t), e.trigger("error", e, i, t)
        }
    };
    return t
}), function () {
    function e(e, t, n) {
        e[t] = n(e[t]) || e[t]
    }

    function t(e, t) {
        return "function" == typeof e[t] ? e[t]() : e[t]
    }

    function n(e, t) {
        var n;
        if ("function" == typeof e.find)return e.find(t);
        if ("function" == typeof e.down)return e.down(t);
        if ("function" == typeof e.query)return e.query(t);
        if (Backbone.$.length >= 2) {
            try {
                if (n = Backbone.$(t, e), n.length > 0)return n
            } catch (i) {
            }
            try {
                for (var r = [], o = 0, a = e.length; a > o; o++)r.push.apply(r, Backbone.$(t, e[o]));
                return n = Backbone.$(r), l(n) && 0 === n.length ? r : n
            } catch (i) {
            }
        }
        return console.error("Unable to make a child selection with the installed selector engine"), []
    }

    function i(e, t, n) {
        var i = {};
        for (var r in e) {
            var o = t.call(n || this, r, e[r], i);
            "undefined" != typeof o && (i[r] = o)
        }
        return i
    }

    function r(e, t) {
        var i = n(e, t);
        return i.refresh = function () {
            var i;
            for (i = 0, len = this.length; len > i; i++)delete this[i];
            this.length = 0;
            var r = s.call(n(e, t));
            if ("function" == typeof this.push)this.push.apply(this, r); else {
                for (i = 0, len = r.length; len > i; i++)this[i] = r[i];
                this.length = r.length
            }
            return this
        }, i.refresh.unclassified = u, i
    }

    function o(e, t, n, a) {
        return n ? "string" == typeof n ? r(e, t[a] = n) : i(n, function (i) {
            var r = a ? a + "." + i : i;
            return o(e, t, n[i], r)
        }) : void 0
    }

    if ("undefined" == typeof Backbone)return console.error("backbone.unclassified must be included after backbone");
    var a = Object.prototype.toString, s = Array.prototype.slice, l = Array.isArray || function (e) {
            return "[object Array]" === a.call(e)
        }, u = {};
    e(Backbone.View.prototype, "setElement", function (e) {
        return function () {
            var t = e.apply(this, arguments);
            return this._uiSelectorMap = {}, this.ui = o(this.$el, this._uiSelectorMap, this.constructor.prototype.ui), t
        }
    }), e(Backbone.View.prototype, "delegateEvents", function (e) {
        var n = /^(\S+)\s*(.*)$/;
        return function (r) {
            return r || (r = t(this, "events")) ? e.call(this, i(r, function (e, t, i) {
                var r = e.match(n), o = r[1], a = r[2], s = a ? " " + (this._uiSelectorMap[a] || a) : "";
                i[o + s] = t
            }, this)) : this
        }
    }), Backbone.View.prototype.refreshUi = function (e) {
        e = e || this.ui;
        for (var t in e)if (e.hasOwnProperty(t)) {
            var n = e[t];
            "function" == typeof n.refresh && n.refresh.unclassified === u ? n.refresh() : this.refreshUi(n)
        }
    }
}(), function (e) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], e) : e(jQuery)
}(function (e) {
    "use strict";
    function t(n, i) {
        var r = function () {
        }, o = this, a = {
            autoSelectFirst: !1,
            appendTo: "body",
            serviceUrl: null,
            lookup: null,
            onSelect: null,
            width: "auto",
            minChars: 1,
            maxHeight: 300,
            deferRequestBy: 0,
            params: {},
            formatResult: t.formatResult,
            delimiter: null,
            zIndex: 9999,
            type: "GET",
            noCache: !1,
            onSearchStart: r,
            onSearchComplete: r,
            onSearchError: r,
            containerClass: "autocomplete-suggestions",
            tabDisabled: !1,
            dataType: "text",
            currentRequest: null,
            triggerSelectOnValidInput: !0,
            lookupFilter: function (e, t, n) {
                return -1 !== e.value.toLowerCase().indexOf(n)
            },
            paramName: "query",
            transformResult: function (t) {
                return "string" == typeof t ? e.parseJSON(t) : t
            }
        };
        o.element = n, o.el = e(n), o.suggestions = [], o.badQueries = [], o.selectedIndex = -1, o.currentValue = o.element.value, o.intervalId = 0, o.cachedResponse = {}, o.onChangeInterval = null, o.onChange = null, o.isLocal = !1, o.suggestionsContainer = null, o.options = e.extend({}, a, i), o.classes = {
            selected: "autocomplete-selected",
            suggestion: "autocomplete-suggestion"
        }, o.hint = null, o.hintValue = "", o.selection = null, o.initialize(), o.setOptions(i)
    }

    var n = function () {
        return {
            escapeRegExChars: function (e) {
                return e.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&")
            }, createNode: function (e) {
                var t = document.createElement("div");
                return t.className = e, t.style.position = "absolute", t.style.display = "none", t
            }
        }
    }(), i = {ESC: 27, TAB: 9, RETURN: 13, LEFT: 37, UP: 38, RIGHT: 39, DOWN: 40};
    t.utils = n, e.Autocomplete = t, t.formatResult = function (e, t) {
        var i = "(" + n.escapeRegExChars(t) + ")";
        return e.value.replace(new RegExp(i, "gi"), "<strong>$1</strong>")
    }, t.prototype = {
        killerFn: null, initialize: function () {
            var n, i = this, r = "." + i.classes.suggestion, o = i.classes.selected, a = i.options;
            i.element.setAttribute("autocomplete", "off"), i.killerFn = function (t) {
                0 === e(t.target).closest("." + i.options.containerClass).length && (i.killSuggestions(), i.disableKillerFn())
            }, i.suggestionsContainer = t.utils.createNode(a.containerClass), n = e(i.suggestionsContainer), n.appendTo(a.appendTo), "auto" !== a.width && n.width(a.width), n.on("mouseover.autocomplete", r, function () {
                i.activate(e(this).data("index"))
            }), n.on("mouseout.autocomplete", function () {
                i.selectedIndex = -1, n.children("." + o).removeClass(o)
            }), n.on("click.autocomplete", r, function () {
                i.select(e(this).data("index"))
            }), i.fixPosition(), i.fixPositionCapture = function () {
                i.visible && i.fixPosition()
            }, e(window).on("resize.autocomplete", i.fixPositionCapture), i.el.on("keydown.autocomplete", function (e) {
                i.onKeyPress(e)
            }), i.el.on("keyup.autocomplete", function (e) {
                i.onKeyUp(e)
            }), i.el.on("blur.autocomplete", function () {
                i.onBlur()
            }), i.el.on("focus.autocomplete", function () {
                i.onFocus()
            }), i.el.on("change.autocomplete", function (e) {
                i.onKeyUp(e)
            })
        }, onFocus: function () {
            var e = this;
            e.fixPosition(), e.options.minChars <= e.el.val().length && e.onValueChange()
        }, onBlur: function () {
            this.enableKillerFn()
        }, setOptions: function (t) {
            var n = this, i = n.options;
            e.extend(i, t), n.isLocal = e.isArray(i.lookup), n.isLocal && (i.lookup = n.verifySuggestionsFormat(i.lookup)), e(n.suggestionsContainer).css({
                "max-height": i.maxHeight + "px",
                width: i.width + "px",
                "z-index": i.zIndex
            })
        }, clearCache: function () {
            this.cachedResponse = {}, this.badQueries = []
        }, clear: function () {
            this.clearCache(), this.currentValue = "", this.suggestions = []
        }, disable: function () {
            var e = this;
            e.disabled = !0, e.currentRequest && e.currentRequest.abort()
        }, enable: function () {
            this.disabled = !1
        }, fixPosition: function () {
            var t, n, i = this;
            "body" === i.options.appendTo && (t = i.el.offset(), n = {
                top: t.top + i.el.outerHeight() + "px",
                left: t.left + "px"
            }, "auto" === i.options.width && (n.width = i.el.outerWidth() - 2 + "px"), e(i.suggestionsContainer).css(n))
        }, enableKillerFn: function () {
            var t = this;
            e(document).on("click.autocomplete", t.killerFn)
        }, disableKillerFn: function () {
            var t = this;
            e(document).off("click.autocomplete", t.killerFn)
        }, killSuggestions: function () {
            var e = this;
            e.stopKillSuggestions(), e.intervalId = window.setInterval(function () {
                e.hide(), e.stopKillSuggestions()
            }, 50)
        }, stopKillSuggestions: function () {
            window.clearInterval(this.intervalId)
        }, isCursorAtEnd: function () {
            var e, t = this, n = t.el.val().length, i = t.element.selectionStart;
            return "number" == typeof i ? i === n : document.selection ? (e = document.selection.createRange(), e.moveStart("character", -n), n === e.text.length) : !0
        }, onKeyPress: function (e) {
            var t = this;
            if (!t.disabled && !t.visible && e.which === i.DOWN && t.currentValue)return void t.suggest();
            if (!t.disabled && t.visible) {
                switch (e.which) {
                    case i.ESC:
                        t.el.val(t.currentValue), t.hide();
                        break;
                    case i.RIGHT:
                        if (t.hint && t.options.onHint && t.isCursorAtEnd()) {
                            t.selectHint();
                            break
                        }
                        return;
                    case i.TAB:
                        if (t.hint && t.options.onHint)return void t.selectHint();
                    case i.RETURN:
                        if (-1 === t.selectedIndex)return void t.hide();
                        if (t.select(t.selectedIndex), e.which === i.TAB && t.options.tabDisabled === !1)return;
                        break;
                    case i.UP:
                        t.moveUp();
                        break;
                    case i.DOWN:
                        t.moveDown();
                        break;
                    default:
                        return
                }
                e.stopImmediatePropagation(), e.preventDefault()
            }
        }, onKeyUp: function (e) {
            var t = this;
            if (!t.disabled) {
                switch (e.which) {
                    case i.UP:
                    case i.DOWN:
                        return
                }
                clearInterval(t.onChangeInterval), t.currentValue !== t.el.val() && (t.findBestHint(), t.options.deferRequestBy > 0 ? t.onChangeInterval = setInterval(function () {
                    t.onValueChange()
                }, t.options.deferRequestBy) : t.onValueChange())
            }
        }, onValueChange: function () {
            var t, n = this, i = n.options, r = n.el.val(), o = n.getQuery(r);
            return n.selection && (n.selection = null, (i.onInvalidateSelection || e.noop).call(n.element)), clearInterval(n.onChangeInterval), n.currentValue = r, n.selectedIndex = -1, i.triggerSelectOnValidInput && (t = n.findSuggestionIndex(o), -1 !== t) ? void n.select(t) : void(o.length < i.minChars ? n.hide() : n.getSuggestions(o))
        }, findSuggestionIndex: function (t) {
            var n = this, i = -1, r = t.toLowerCase();
            return e.each(n.suggestions, function (e, t) {
                return t.value.toLowerCase() === r ? (i = e, !1) : void 0
            }), i
        }, getQuery: function (t) {
            var n, i = this.options.delimiter;
            return i ? (n = t.split(i), e.trim(n[n.length - 1])) : t
        }, getSuggestionsLocal: function (t) {
            var n, i = this, r = i.options, o = t.toLowerCase(), a = r.lookupFilter, s = parseInt(r.lookupLimit, 10);
            return n = {
                suggestions: e.grep(r.lookup, function (e) {
                    return a(e, t, o)
                })
            }, s && n.suggestions.length > s && (n.suggestions = n.suggestions.slice(0, s)), n
        }, getSuggestions: function (t) {
            var n, i, r, o = this, a = o.options, s = a.serviceUrl;
            if (a.params[a.paramName] = t, i = a.ignoreParams ? null : a.params, o.isLocal ? n = o.getSuggestionsLocal(t) : (e.isFunction(s) && (s = s.call(o.element, t)), r = s + "?" + e.param(i || {}), n = o.cachedResponse[r]), n && e.isArray(n.suggestions))o.suggestions = n.suggestions, o.suggest(); else if (!o.isBadQuery(t)) {
                if (a.onSearchStart.call(o.element, a.params) === !1)return;
                o.currentRequest && o.currentRequest.abort(), o.currentRequest = e.ajax({
                    url: s,
                    data: i,
                    type: a.type,
                    dataType: a.dataType
                }).done(function (e) {
                    o.currentRequest = null, o.processResponse(e, t, r), a.onSearchComplete.call(o.element, t)
                }).fail(function (e, n, i) {
                    a.onSearchError.call(o.element, t, e, n, i)
                })
            }
        }, isBadQuery: function (e) {
            for (var t = this.badQueries, n = t.length; n--;)if (0 === e.indexOf(t[n]))return !0;
            return !1
        }, hide: function () {
            var t = this;
            t.visible = !1, t.selectedIndex = -1, e(t.suggestionsContainer).hide(), t.signalHint(null)
        }, suggest: function () {
            if (0 === this.suggestions.length)return void this.hide();
            var t, n, i = this, r = i.options, o = r.formatResult, a = i.getQuery(i.currentValue), s = i.classes.suggestion, l = i.classes.selected, u = e(i.suggestionsContainer), c = r.beforeRender, d = "";
            return r.triggerSelectOnValidInput && (t = i.findSuggestionIndex(a), -1 !== t) ? void i.select(t) : (e.each(i.suggestions, function (e, t) {
                d += '<div class="' + s + '" data-index="' + e + '">' + o(t, a) + "</div>"
            }), "auto" === r.width && (n = i.el.outerWidth() - 2, u.width(n > 0 ? n : 300)), u.html(d), r.autoSelectFirst && (i.selectedIndex = 0, u.children().first().addClass(l)), e.isFunction(c) && c.call(i.element, u), u.show(), i.visible = !0, void i.findBestHint())
        }, findBestHint: function () {
            var t = this, n = t.el.val().toLowerCase(), i = null;
            n && (e.each(t.suggestions, function (e, t) {
                var r = 0 === t.value.toLowerCase().indexOf(n);
                return r && (i = t), !r
            }), t.signalHint(i))
        }, signalHint: function (t) {
            var n = "", i = this;
            t && (n = i.currentValue + t.value.substr(i.currentValue.length)), i.hintValue !== n && (i.hintValue = n, i.hint = t, (this.options.onHint || e.noop)(n))
        }, verifySuggestionsFormat: function (t) {
            return t.length && "string" == typeof t[0] ? e.map(t, function (e) {
                return {value: e, data: null}
            }) : t
        }, processResponse: function (e, t, n) {
            var i = this, r = i.options, o = r.transformResult(e, t);
            o.suggestions = i.verifySuggestionsFormat(o.suggestions), r.noCache || (i.cachedResponse[n] = o, 0 === o.suggestions.length && i.badQueries.push(n)), t === i.getQuery(i.currentValue) && (i.suggestions = o.suggestions, i.suggest())
        }, activate: function (t) {
            var n, i = this, r = i.classes.selected, o = e(i.suggestionsContainer), a = o.children();
            return o.children("." + r).removeClass(r), i.selectedIndex = t, -1 !== i.selectedIndex && a.length > i.selectedIndex ? (n = a.get(i.selectedIndex), e(n).addClass(r), n) : null
        }, selectHint: function () {
            var t = this, n = e.inArray(t.hint, t.suggestions);
            t.select(n)
        }, select: function (e) {
            var t = this;
            t.hide(), t.onSelect(e)
        }, moveUp: function () {
            var t = this;
            if (-1 !== t.selectedIndex)return 0 === t.selectedIndex ? (e(t.suggestionsContainer).children().first().removeClass(t.classes.selected), t.selectedIndex = -1, t.el.val(t.currentValue), void t.findBestHint()) : void t.adjustScroll(t.selectedIndex - 1)
        }, moveDown: function () {
            var e = this;
            e.selectedIndex !== e.suggestions.length - 1 && e.adjustScroll(e.selectedIndex + 1)
        }, adjustScroll: function (t) {
            var n, i, r, o = this, a = o.activate(t), s = 25;
            a && (n = a.offsetTop, i = e(o.suggestionsContainer).scrollTop(), r = i + o.options.maxHeight - s, i > n ? e(o.suggestionsContainer).scrollTop(n) : n > r && e(o.suggestionsContainer).scrollTop(n - o.options.maxHeight + s), o.el.val(o.getValue(o.suggestions[t].value)), o.signalHint(null))
        }, onSelect: function (t) {
            var n = this, i = n.options.onSelect, r = n.suggestions[t];
            n.currentValue = n.getValue(r.value), n.el.val(n.currentValue), n.signalHint(null), n.suggestions = [], n.selection = r, e.isFunction(i) && i.call(n.element, r)
        }, getValue: function (e) {
            var t, n, i = this, r = i.options.delimiter;
            return r ? (t = i.currentValue, n = t.split(r), 1 === n.length ? e : t.substr(0, t.length - n[n.length - 1].length) + e) : e
        }, dispose: function () {
            var t = this;
            t.el.off(".autocomplete").removeData("autocomplete"), t.disableKillerFn(), e(window).off("resize.autocomplete", t.fixPositionCapture), e(t.suggestionsContainer).remove()
        }
    }, e.fn.autocomplete = function (n, i) {
        var r = "autocomplete";
        return 0 === arguments.length ? this.first().data(r) : this.each(function () {
            var o = e(this), a = o.data(r);
            "string" == typeof n ? a && "function" == typeof a[n] && a[n](i) : (a && a.dispose && a.dispose(), a = new t(this, n), o.data(r, a))
        })
    }
}), +function (e) {
    "use strict";
    function t(t) {
        return this.each(function () {
            var i = e(this), r = i.data("bs.tooltip"), o = "object" == typeof t && t;
            (r || !/destroy|hide/.test(t)) && (r || i.data("bs.tooltip", r = new n(this, o)), "string" == typeof t && r[t]())
        })
    }

    var n = function (e, t) {
        this.type = null, this.options = null, this.enabled = null, this.timeout = null, this.hoverState = null, this.$element = null, this.inState = null, this.init("tooltip", e, t)
    };
    n.VERSION = "3.3.7", n.TRANSITION_DURATION = 150, n.DEFAULTS = {
        animation: !0,
        placement: "top",
        selector: !1,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        container: !1,
        viewport: {selector: "body", padding: 0}
    }, n.prototype.init = function (t, n, i) {
        if (this.enabled = !0, this.type = t, this.$element = e(n), this.options = this.getOptions(i), this.$viewport = this.options.viewport && e(e.isFunction(this.options.viewport) ? this.options.viewport.call(this, this.$element) : this.options.viewport.selector || this.options.viewport), this.inState = {
                click: !1,
                hover: !1,
                focus: !1
            }, this.$element[0] instanceof document.constructor && !this.options.selector)throw new Error("`selector` option must be specified when initializing " + this.type + " on the window.document object!");
        for (var r = this.options.trigger.split(" "), o = r.length; o--;) {
            var a = r[o];
            if ("click" == a)this.$element.on("click." + this.type, this.options.selector, e.proxy(this.toggle, this)); else if ("manual" != a) {
                var s = "hover" == a ? "mouseenter" : "focusin", l = "hover" == a ? "mouseleave" : "focusout";
                this.$element.on(s + "." + this.type, this.options.selector, e.proxy(this.enter, this)), this.$element.on(l + "." + this.type, this.options.selector, e.proxy(this.leave, this))
            }
        }
        this.options.selector ? this._options = e.extend({}, this.options, {
            trigger: "manual",
            selector: ""
        }) : this.fixTitle()
    }, n.prototype.getDefaults = function () {
        return n.DEFAULTS
    }, n.prototype.getOptions = function (t) {
        return t = e.extend({}, this.getDefaults(), this.$element.data(), t), t.delay && "number" == typeof t.delay && (t.delay = {
            show: t.delay,
            hide: t.delay
        }), t
    }, n.prototype.getDelegateOptions = function () {
        var t = {}, n = this.getDefaults();
        return this._options && e.each(this._options, function (e, i) {
            n[e] != i && (t[e] = i)
        }), t
    }, n.prototype.enter = function (t) {
        var n = t instanceof this.constructor ? t : e(t.currentTarget).data("bs." + this.type);
        return n || (n = new this.constructor(t.currentTarget, this.getDelegateOptions()), e(t.currentTarget).data("bs." + this.type, n)), t instanceof e.Event && (n.inState["focusin" == t.type ? "focus" : "hover"] = !0), n.tip().hasClass("in") || "in" == n.hoverState ? void(n.hoverState = "in") : (clearTimeout(n.timeout), n.hoverState = "in", n.options.delay && n.options.delay.show ? void(n.timeout = setTimeout(function () {
            "in" == n.hoverState && n.show()
        }, n.options.delay.show)) : n.show())
    }, n.prototype.isInStateTrue = function () {
        for (var e in this.inState)if (this.inState[e])return !0;
        return !1
    }, n.prototype.leave = function (t) {
        var n = t instanceof this.constructor ? t : e(t.currentTarget).data("bs." + this.type);
        return n || (n = new this.constructor(t.currentTarget, this.getDelegateOptions()), e(t.currentTarget).data("bs." + this.type, n)), t instanceof e.Event && (n.inState["focusout" == t.type ? "focus" : "hover"] = !1), n.isInStateTrue() ? void 0 : (clearTimeout(n.timeout), n.hoverState = "out", n.options.delay && n.options.delay.hide ? void(n.timeout = setTimeout(function () {
            "out" == n.hoverState && n.hide()
        }, n.options.delay.hide)) : n.hide())
    }, n.prototype.show = function () {
        var t = e.Event("show.bs." + this.type);
        if (this.hasContent() && this.enabled) {
            this.$element.trigger(t);
            var i = e.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
            if (t.isDefaultPrevented() || !i)return;
            var r = this, o = this.tip(), a = this.getUID(this.type);
            this.setContent(), o.attr("id", a), this.$element.attr("aria-describedby", a), this.options.animation && o.addClass("fade");
            var s = "function" == typeof this.options.placement ? this.options.placement.call(this, o[0], this.$element[0]) : this.options.placement, l = /\s?auto?\s?/i, u = l.test(s);
            u && (s = s.replace(l, "") || "top"), o.detach().css({
                top: 0,
                left: 0,
                display: "block"
            }).addClass(s).data("bs." + this.type, this), this.options.container ? o.appendTo(this.options.container) : o.insertAfter(this.$element), this.$element.trigger("inserted.bs." + this.type);
            var c = this.getPosition(), d = o[0].offsetWidth, p = o[0].offsetHeight;
            if (u) {
                var h = s, f = this.getPosition(this.$viewport);
                s = "bottom" == s && c.bottom + p > f.bottom ? "top" : "top" == s && c.top - p < f.top ? "bottom" : "right" == s && c.right + d > f.width ? "left" : "left" == s && c.left - d < f.left ? "right" : s, o.removeClass(h).addClass(s)
            }
            var m = this.getCalculatedOffset(s, c, d, p);
            this.applyPlacement(m, s);
            var g = function () {
                var e = r.hoverState;
                r.$element.trigger("shown.bs." + r.type), r.hoverState = null, "out" == e && r.leave(r)
            };
            e.support.transition && this.$tip.hasClass("fade") ? o.one("bsTransitionEnd", g).emulateTransitionEnd(n.TRANSITION_DURATION) : g()
        }
    }, n.prototype.applyPlacement = function (t, n) {
        var i = this.tip(), r = i[0].offsetWidth, o = i[0].offsetHeight, a = parseInt(i.css("margin-top"), 10), s = parseInt(i.css("margin-left"), 10);
        isNaN(a) && (a = 0), isNaN(s) && (s = 0), t.top += a, t.left += s, e.offset.setOffset(i[0], e.extend({
            using: function (e) {
                i.css({top: Math.round(e.top), left: Math.round(e.left)})
            }
        }, t), 0), i.addClass("in");
        var l = i[0].offsetWidth, u = i[0].offsetHeight;
        "top" == n && u != o && (t.top = t.top + o - u);
        var c = this.getViewportAdjustedDelta(n, t, l, u);
        c.left ? t.left += c.left : t.top += c.top;
        var d = /top|bottom/.test(n), p = d ? 2 * c.left - r + l : 2 * c.top - o + u, h = d ? "offsetWidth" : "offsetHeight";
        i.offset(t), this.replaceArrow(p, i[0][h], d)
    }, n.prototype.replaceArrow = function (e, t, n) {
        this.arrow().css(n ? "left" : "top", 50 * (1 - e / t) + "%").css(n ? "top" : "left", "")
    }, n.prototype.setContent = function () {
        var e = this.tip(), t = this.getTitle();
        e.find(".tooltip-inner")[this.options.html ? "html" : "text"](t), e.removeClass("fade in top bottom left right")
    }, n.prototype.hide = function (t) {
        function i() {
            "in" != r.hoverState && o.detach(), r.$element && r.$element.removeAttr("aria-describedby").trigger("hidden.bs." + r.type), t && t()
        }

        var r = this, o = e(this.$tip), a = e.Event("hide.bs." + this.type);
        return this.$element.trigger(a), a.isDefaultPrevented() ? void 0 : (o.removeClass("in"), e.support.transition && o.hasClass("fade") ? o.one("bsTransitionEnd", i).emulateTransitionEnd(n.TRANSITION_DURATION) : i(), this.hoverState = null, this)
    }, n.prototype.fixTitle = function () {
        var e = this.$element;
        (e.attr("title") || "string" != typeof e.attr("data-original-title")) && e.attr("data-original-title", e.attr("title") || "").attr("title", "")
    }, n.prototype.hasContent = function () {
        return this.getTitle()
    }, n.prototype.getPosition = function (t) {
        t = t || this.$element;
        var n = t[0], i = "BODY" == n.tagName, r = n.getBoundingClientRect();
        null == r.width && (r = e.extend({}, r, {width: r.right - r.left, height: r.bottom - r.top}));
        var o = window.SVGElement && n instanceof window.SVGElement, a = i ? {
            top: 0,
            left: 0
        } : o ? null : t.offset(), s = {scroll: i ? document.documentElement.scrollTop || document.body.scrollTop : t.scrollTop()}, l = i ? {
            width: e(window).width(),
            height: e(window).height()
        } : null;
        return e.extend({}, r, s, l, a)
    }, n.prototype.getCalculatedOffset = function (e, t, n, i) {
        return "bottom" == e ? {
            top: t.top + t.height,
            left: t.left + t.width / 2 - n / 2
        } : "top" == e ? {
            top: t.top - i,
            left: t.left + t.width / 2 - n / 2
        } : "left" == e ? {top: t.top + t.height / 2 - i / 2, left: t.left - n} : {
            top: t.top + t.height / 2 - i / 2,
            left: t.left + t.width
        }
    }, n.prototype.getViewportAdjustedDelta = function (e, t, n, i) {
        var r = {top: 0, left: 0};
        if (!this.$viewport)return r;
        var o = this.options.viewport && this.options.viewport.padding || 0, a = this.getPosition(this.$viewport);
        if (/right|left/.test(e)) {
            var s = t.top - o - a.scroll, l = t.top + o - a.scroll + i;
            s < a.top ? r.top = a.top - s : l > a.top + a.height && (r.top = a.top + a.height - l)
        } else {
            var u = t.left - o, c = t.left + o + n;
            u < a.left ? r.left = a.left - u : c > a.right && (r.left = a.left + a.width - c)
        }
        return r
    }, n.prototype.getTitle = function () {
        var e, t = this.$element, n = this.options;
        return e = t.attr("data-original-title") || ("function" == typeof n.title ? n.title.call(t[0]) : n.title)
    }, n.prototype.getUID = function (e) {
        do e += ~~(1e6 * Math.random()); while (document.getElementById(e));
        return e
    }, n.prototype.tip = function () {
        if (!this.$tip && (this.$tip = e(this.options.template), 1 != this.$tip.length))throw new Error(this.type + " `template` option must consist of exactly 1 top-level element!");
        return this.$tip
    }, n.prototype.arrow = function () {
        return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
    }, n.prototype.enable = function () {
        this.enabled = !0
    }, n.prototype.disable = function () {
        this.enabled = !1
    }, n.prototype.toggleEnabled = function () {
        this.enabled = !this.enabled
    }, n.prototype.toggle = function (t) {
        var n = this;
        t && (n = e(t.currentTarget).data("bs." + this.type), n || (n = new this.constructor(t.currentTarget, this.getDelegateOptions()), e(t.currentTarget).data("bs." + this.type, n))), t ? (n.inState.click = !n.inState.click, n.isInStateTrue() ? n.enter(n) : n.leave(n)) : n.tip().hasClass("in") ? n.leave(n) : n.enter(n)
    }, n.prototype.destroy = function () {
        var e = this;
        clearTimeout(this.timeout), this.hide(function () {
            e.$element.off("." + e.type).removeData("bs." + e.type), e.$tip && e.$tip.detach(), e.$tip = null, e.$arrow = null, e.$viewport = null, e.$element = null
        })
    };
    var i = e.fn.tooltip;
    e.fn.tooltip = t, e.fn.tooltip.Constructor = n, e.fn.tooltip.noConflict = function () {
        return e.fn.tooltip = i, this
    }
}(jQuery), +function (e) {
    "use strict";
    function t(t) {
        return this.each(function () {
            var i = e(this), r = i.data("bs.tab");
            r || i.data("bs.tab", r = new n(this)), "string" == typeof t && r[t]()
        })
    }

    var n = function (t) {
        this.element = e(t)
    };
    n.VERSION = "3.3.7", n.TRANSITION_DURATION = 150, n.prototype.show = function () {
        var t = this.element, n = t.closest("ul:not(.dropdown-menu)"), i = t.data("target");
        if (i || (i = t.attr("href"), i = i && i.replace(/.*(?=#[^\s]*$)/, "")), !t.parent("li").hasClass("active")) {
            var r = n.find(".active:last a"), o = e.Event("hide.bs.tab", {relatedTarget: t[0]}), a = e.Event("show.bs.tab", {relatedTarget: r[0]});
            if (r.trigger(o), t.trigger(a), !a.isDefaultPrevented() && !o.isDefaultPrevented()) {
                var s = e(i);
                this.activate(t.closest("li"), n), this.activate(s, s.parent(), function () {
                    r.trigger({type: "hidden.bs.tab", relatedTarget: t[0]}), t.trigger({
                        type: "shown.bs.tab",
                        relatedTarget: r[0]
                    })
                })
            }
        }
    }, n.prototype.activate = function (t, i, r) {
        function o() {
            a.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1), t.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0), s ? (t[0].offsetWidth, t.addClass("in")) : t.removeClass("fade"), t.parent(".dropdown-menu").length && t.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0), r && r()
        }

        var a = i.find("> .active"), s = r && e.support.transition && (a.length && a.hasClass("fade") || !!i.find("> .fade").length);
        a.length && s ? a.one("bsTransitionEnd", o).emulateTransitionEnd(n.TRANSITION_DURATION) : o(), a.removeClass("in")
    };
    var i = e.fn.tab;
    e.fn.tab = t, e.fn.tab.Constructor = n, e.fn.tab.noConflict = function () {
        return e.fn.tab = i, this
    };
    var r = function (n) {
        n.preventDefault(), t.call(e(this), "show")
    };
    e(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', r).on("click.bs.tab.data-api", '[data-toggle="pill"]', r)
}(jQuery), +function (e) {
    "use strict";
    function t(t) {
        var n = t.attr("data-target");
        n || (n = t.attr("href"), n = n && /#[A-Za-z]/.test(n) && n.replace(/.*(?=#[^\s]*$)/, ""));
        var i = n && e(n);
        return i && i.length ? i : t.parent()
    }

    function n(n) {
        n && 3 === n.which || (e(r).remove(), e(o).each(function () {
            var i = e(this), r = t(i), o = {relatedTarget: this};
            r.hasClass("open") && (n && "click" == n.type && /input|textarea/i.test(n.target.tagName) && e.contains(r[0], n.target) || (r.trigger(n = e.Event("hide.bs.dropdown", o)), n.isDefaultPrevented() || (i.attr("aria-expanded", "false"), r.removeClass("open").trigger(e.Event("hidden.bs.dropdown", o)))))
        }))
    }

    function i(t) {
        return this.each(function () {
            var n = e(this), i = n.data("bs.dropdown");
            i || n.data("bs.dropdown", i = new a(this)), "string" == typeof t && i[t].call(n)
        })
    }

    var r = ".dropdown-backdrop", o = '[data-toggle="dropdown"]', a = function (t) {
        e(t).on("click.bs.dropdown", this.toggle)
    };
    a.VERSION = "3.3.7", a.prototype.toggle = function (i) {
        var r = e(this);
        if (!r.is(".disabled, :disabled")) {
            var o = t(r), a = o.hasClass("open");
            if (n(), !a) {
                "ontouchstart" in document.documentElement && !o.closest(".navbar-nav").length && e(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(e(this)).on("click", n);
                var s = {relatedTarget: this};
                if (o.trigger(i = e.Event("show.bs.dropdown", s)), i.isDefaultPrevented())return;
                r.trigger("focus").attr("aria-expanded", "true"), o.toggleClass("open").trigger(e.Event("shown.bs.dropdown", s))
            }
            return !1
        }
    }, a.prototype.keydown = function (n) {
        if (/(38|40|27|32)/.test(n.which) && !/input|textarea/i.test(n.target.tagName)) {
            var i = e(this);
            if (n.preventDefault(), n.stopPropagation(), !i.is(".disabled, :disabled")) {
                var r = t(i), a = r.hasClass("open");
                if (!a && 27 != n.which || a && 27 == n.which)return 27 == n.which && r.find(o).trigger("focus"), i.trigger("click");
                var s = " li:not(.disabled):visible a", l = r.find(".dropdown-menu" + s);
                if (l.length) {
                    var u = l.index(n.target);
                    38 == n.which && u > 0 && u--, 40 == n.which && u < l.length - 1 && u++, ~u || (u = 0), l.eq(u).trigger("focus")
                }
            }
        }
    };
    var s = e.fn.dropdown;
    e.fn.dropdown = i, e.fn.dropdown.Constructor = a, e.fn.dropdown.noConflict = function () {
        return e.fn.dropdown = s, this
    }, e(document).on("click.bs.dropdown.data-api", n).on("click.bs.dropdown.data-api", ".dropdown form", function (e) {
        e.stopPropagation()
    }).on("click.bs.dropdown.data-api", o, a.prototype.toggle).on("keydown.bs.dropdown.data-api", o, a.prototype.keydown).on("keydown.bs.dropdown.data-api", ".dropdown-menu", a.prototype.keydown)
}(jQuery), function (e, t) {
    e.rails !== t && e.error("jquery-ujs has already been loaded!");
    var n, i = e(document);
    e.rails = n = {
        linkClickSelector: "a[data-confirm], a[data-method], a[data-remote], a[data-disable-with], a[data-disable]",
        buttonClickSelector: "button[data-remote], button[data-confirm]",
        inputChangeSelector: "select[data-remote], input[data-remote], textarea[data-remote]",
        formSubmitSelector: "form",
        formInputClickSelector: "form input[type=submit], form input[type=image], form button[type=submit], form button:not([type])",
        disableSelector: "input[data-disable-with]:enabled, button[data-disable-with]:enabled, textarea[data-disable-with]:enabled, input[data-disable]:enabled, button[data-disable]:enabled, textarea[data-disable]:enabled",
        enableSelector: "input[data-disable-with]:disabled, button[data-disable-with]:disabled, textarea[data-disable-with]:disabled, input[data-disable]:disabled, button[data-disable]:disabled, textarea[data-disable]:disabled",
        requiredInputSelector: "input[name][required]:not([disabled]),textarea[name][required]:not([disabled])",
        fileInputSelector: "input[type=file]",
        linkDisableSelector: "a[data-disable-with], a[data-disable]",
        buttonDisableSelector: "button[data-remote][data-disable-with], button[data-remote][data-disable]",
        CSRFProtection: function (t) {
            var n = e('meta[name="csrf-token"]').attr("content");
            n && t.setRequestHeader("X-CSRF-Token", n)
        },
        refreshCSRFTokens: function () {
            var t = e("meta[name=csrf-token]").attr("content"), n = e("meta[name=csrf-param]").attr("content");
            e('form input[name="' + n + '"]').val(t)
        },
        fire: function (t, n, i) {
            var r = e.Event(n);
            return t.trigger(r, i), r.result !== !1
        },
        confirm: function (e) {
            return confirm(e)
        },
        ajax: function (t) {
            return e.ajax(t)
        },
        href: function (e) {
            return e.attr("href")
        },
        handleRemote: function (i) {
            var r, o, a, s, l, u, c, d;
            if (n.fire(i, "ajax:before")) {
                if (s = i.data("cross-domain"), l = s === t ? null : s, u = i.data("with-credentials") || null, c = i.data("type") || e.ajaxSettings && e.ajaxSettings.dataType, i.is("form")) {
                    r = i.attr("method"), o = i.attr("action"), a = i.serializeArray();
                    var p = i.data("ujs:submit-button");
                    p && (a.push(p), i.data("ujs:submit-button", null))
                } else i.is(n.inputChangeSelector) ? (r = i.data("method"), o = i.data("url"), a = i.serialize(), i.data("params") && (a = a + "&" + i.data("params"))) : i.is(n.buttonClickSelector) ? (r = i.data("method") || "get", o = i.data("url"), a = i.serialize(), i.data("params") && (a = a + "&" + i.data("params"))) : (r = i.data("method"), o = n.href(i), a = i.data("params") || null);
                return d = {
                    type: r || "GET", data: a, dataType: c, beforeSend: function (e, r) {
                        return r.dataType === t && e.setRequestHeader("accept", "*/*;q=0.5, " + r.accepts.script), n.fire(i, "ajax:beforeSend", [e, r]) ? void i.trigger("ajax:send", e) : !1
                    }, success: function (e, t, n) {
                        i.trigger("ajax:success", [e, t, n])
                    }, complete: function (e, t) {
                        i.trigger("ajax:complete", [e, t])
                    }, error: function (e, t, n) {
                        i.trigger("ajax:error", [e, t, n])
                    }, crossDomain: l
                }, u && (d.xhrFields = {withCredentials: u}), o && (d.url = o), n.ajax(d)
            }
            return !1
        },
        handleMethod: function (i) {
            var r = n.href(i), o = i.data("method"), a = i.attr("target"), s = e("meta[name=csrf-token]").attr("content"), l = e("meta[name=csrf-param]").attr("content"), u = e('<form method="post" action="' + r + '"></form>'), c = '<input name="_method" value="' + o + '" type="hidden" />';
            l !== t && s !== t && (c += '<input name="' + l + '" value="' + s + '" type="hidden" />'), a && u.attr("target", a), u.hide().append(c).appendTo("body"), u.submit()
        },
        formElements: function (t, n) {
            return t.is("form") ? e(t[0].elements).filter(n) : t.find(n)
        },
        disableFormElements: function (t) {
            n.formElements(t, n.disableSelector).each(function () {
                n.disableFormElement(e(this))
            })
        },
        disableFormElement: function (e) {
            var n, i;
            n = e.is("button") ? "html" : "val", i = e.data("disable-with"), e.data("ujs:enable-with", e[n]()), i !== t && e[n](i), e.prop("disabled", !0)
        },
        enableFormElements: function (t) {
            n.formElements(t, n.enableSelector).each(function () {
                n.enableFormElement(e(this))
            })
        },
        enableFormElement: function (e) {
            var t = e.is("button") ? "html" : "val";
            e.data("ujs:enable-with") && e[t](e.data("ujs:enable-with")), e.prop("disabled", !1)
        },
        allowAction: function (e) {
            var t, i = e.data("confirm"), r = !1;
            return i ? (n.fire(e, "confirm") && (r = n.confirm(i), t = n.fire(e, "confirm:complete", [r])), r && t) : !0
        },
        blankInputs: function (t, n, i) {
            var r, o, a = e(), s = n || "input,textarea", l = t.find(s);
            return l.each(function () {
                if (r = e(this), o = r.is("input[type=checkbox],input[type=radio]") ? r.is(":checked") : r.val(), !o == !i) {
                    if (r.is("input[type=radio]") && l.filter('input[type=radio]:checked[name="' + r.attr("name") + '"]').length)return !0;
                    a = a.add(r)
                }
            }), a.length ? a : !1
        },
        nonBlankInputs: function (e, t) {
            return n.blankInputs(e, t, !0)
        },
        stopEverything: function (t) {
            return e(t.target).trigger("ujs:everythingStopped"), t.stopImmediatePropagation(), !1
        },
        disableElement: function (e) {
            var i = e.data("disable-with");
            e.data("ujs:enable-with", e.html()), i !== t && e.html(i), e.bind("click.railsDisable", function (e) {
                return n.stopEverything(e)
            })
        },
        enableElement: function (e) {
            e.data("ujs:enable-with") !== t && (e.html(e.data("ujs:enable-with")), e.removeData("ujs:enable-with")), e.unbind("click.railsDisable")
        }
    }, n.fire(i, "rails:attachBindings") && (e.ajaxPrefilter(function (e, t, i) {
        e.crossDomain || n.CSRFProtection(i)
    }), i.delegate(n.linkDisableSelector, "ajax:complete", function () {
        n.enableElement(e(this))
    }), i.delegate(n.buttonDisableSelector, "ajax:complete", function () {
        n.enableFormElement(e(this))
    }), i.delegate(n.linkClickSelector, "click.rails", function (i) {
        var r = e(this), o = r.data("method"), a = r.data("params"), s = i.metaKey || i.ctrlKey;
        if (!n.allowAction(r))return n.stopEverything(i);
        if (!s && r.is(n.linkDisableSelector) && n.disableElement(r), r.data("remote") !== t) {
            if (s && (!o || "GET" === o) && !a)return !0;
            var l = n.handleRemote(r);
            return l === !1 ? n.enableElement(r) : l.error(function () {
                n.enableElement(r)
            }), !1
        }
        return r.data("method") ? (n.handleMethod(r), !1) : void 0
    }), i.delegate(n.buttonClickSelector, "click.rails", function (t) {
        var i = e(this);
        if (!n.allowAction(i))return n.stopEverything(t);
        i.is(n.buttonDisableSelector) && n.disableFormElement(i);
        var r = n.handleRemote(i);
        return r === !1 ? n.enableFormElement(i) : r.error(function () {
            n.enableFormElement(i)
        }), !1
    }), i.delegate(n.inputChangeSelector, "change.rails", function (t) {
        var i = e(this);
        return n.allowAction(i) ? (n.handleRemote(i), !1) : n.stopEverything(t)
    }), i.delegate(n.formSubmitSelector, "submit.rails", function (i) {
        var r, o, a = e(this), s = a.data("remote") !== t;
        if (!n.allowAction(a))return n.stopEverything(i);
        if (a.attr("novalidate") == t && (r = n.blankInputs(a, n.requiredInputSelector), r && n.fire(a, "ajax:aborted:required", [r])))return n.stopEverything(i);
        if (s) {
            if (o = n.nonBlankInputs(a, n.fileInputSelector)) {
                setTimeout(function () {
                    n.disableFormElements(a)
                }, 13);
                var l = n.fire(a, "ajax:aborted:file", [o]);
                return l || setTimeout(function () {
                    n.enableFormElements(a)
                }, 13), l
            }
            return n.handleRemote(a), !1
        }
        setTimeout(function () {
            n.disableFormElements(a)
        }, 13)
    }), i.delegate(n.formInputClickSelector, "click.rails", function (t) {
        var i = e(this);
        if (!n.allowAction(i))return n.stopEverything(t);
        var r = i.attr("name"), o = r ? {name: r, value: i.val()} : null;
        i.closest("form").data("ujs:submit-button", o)
    }), i.delegate(n.formSubmitSelector, "ajax:send.rails", function (t) {
        this == t.target && n.disableFormElements(e(this))
    }), i.delegate(n.formSubmitSelector, "ajax:complete.rails", function (t) {
        this == t.target && n.enableFormElements(e(this))
    }), e(function () {
        n.refreshCSRFTokens()
    }))
}(jQuery), jQuery.easing.jswing = jQuery.easing.swing, jQuery.extend(jQuery.easing, {
    def: "easeOutQuad",
    swing: function (e, t, n, i, r) {
        return jQuery.easing[jQuery.easing.def](e, t, n, i, r)
    },
    easeInQuad: function (e, t, n, i, r) {
        return i * (t /= r) * t + n
    },
    easeOutQuad: function (e, t, n, i, r) {
        return -i * (t /= r) * (t - 2) + n
    },
    easeInOutQuad: function (e, t, n, i, r) {
        return (t /= r / 2) < 1 ? i / 2 * t * t + n : -i / 2 * (--t * (t - 2) - 1) + n
    },
    easeInCubic: function (e, t, n, i, r) {
        return i * (t /= r) * t * t + n
    },
    easeOutCubic: function (e, t, n, i, r) {
        return i * ((t = t / r - 1) * t * t + 1) + n
    },
    easeInOutCubic: function (e, t, n, i, r) {
        return (t /= r / 2) < 1 ? i / 2 * t * t * t + n : i / 2 * ((t -= 2) * t * t + 2) + n
    },
    easeInQuart: function (e, t, n, i, r) {
        return i * (t /= r) * t * t * t + n
    },
    easeOutQuart: function (e, t, n, i, r) {
        return -i * ((t = t / r - 1) * t * t * t - 1) + n
    },
    easeInOutQuart: function (e, t, n, i, r) {
        return (t /= r / 2) < 1 ? i / 2 * t * t * t * t + n : -i / 2 * ((t -= 2) * t * t * t - 2) + n
    },
    easeInQuint: function (e, t, n, i, r) {
        return i * (t /= r) * t * t * t * t + n
    },
    easeOutQuint: function (e, t, n, i, r) {
        return i * ((t = t / r - 1) * t * t * t * t + 1) + n
    },
    easeInOutQuint: function (e, t, n, i, r) {
        return (t /= r / 2) < 1 ? i / 2 * t * t * t * t * t + n : i / 2 * ((t -= 2) * t * t * t * t + 2) + n
    },
    easeInSine: function (e, t, n, i, r) {
        return -i * Math.cos(t / r * (Math.PI / 2)) + i + n
    },
    easeOutSine: function (e, t, n, i, r) {
        return i * Math.sin(t / r * (Math.PI / 2)) + n
    },
    easeInOutSine: function (e, t, n, i, r) {
        return -i / 2 * (Math.cos(Math.PI * t / r) - 1) + n
    },
    easeInExpo: function (e, t, n, i, r) {
        return 0 == t ? n : i * Math.pow(2, 10 * (t / r - 1)) + n
    },
    easeOutExpo: function (e, t, n, i, r) {
        return t == r ? n + i : i * (-Math.pow(2, -10 * t / r) + 1) + n
    },
    easeInOutExpo: function (e, t, n, i, r) {
        return 0 == t ? n : t == r ? n + i : (t /= r / 2) < 1 ? i / 2 * Math.pow(2, 10 * (t - 1)) + n : i / 2 * (-Math.pow(2, -10 * --t) + 2) + n
    },
    easeInCirc: function (e, t, n, i, r) {
        return -i * (Math.sqrt(1 - (t /= r) * t) - 1) + n
    },
    easeOutCirc: function (e, t, n, i, r) {
        return i * Math.sqrt(1 - (t = t / r - 1) * t) + n
    },
    easeInOutCirc: function (e, t, n, i, r) {
        return (t /= r / 2) < 1 ? -i / 2 * (Math.sqrt(1 - t * t) - 1) + n : i / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + n
    },
    easeInElastic: function (e, t, n, i, r) {
        var o = 1.70158, a = 0, s = i;
        if (0 == t)return n;
        if (1 == (t /= r))return n + i;
        if (a || (a = .3 * r), s < Math.abs(i)) {
            s = i;
            var o = a / 4
        } else var o = a / (2 * Math.PI) * Math.asin(i / s);
        return -(s * Math.pow(2, 10 * (t -= 1)) * Math.sin(2 * (t * r - o) * Math.PI / a)) + n
    },
    easeOutElastic: function (e, t, n, i, r) {
        var o = 1.70158, a = 0, s = i;
        if (0 == t)return n;
        if (1 == (t /= r))return n + i;
        if (a || (a = .3 * r), s < Math.abs(i)) {
            s = i;
            var o = a / 4
        } else var o = a / (2 * Math.PI) * Math.asin(i / s);
        return s * Math.pow(2, -10 * t) * Math.sin(2 * (t * r - o) * Math.PI / a) + i + n
    },
    easeInOutElastic: function (e, t, n, i, r) {
        var o = 1.70158, a = 0, s = i;
        if (0 == t)return n;
        if (2 == (t /= r / 2))return n + i;
        if (a || (a = .3 * r * 1.5), s < Math.abs(i)) {
            s = i;
            var o = a / 4
        } else var o = a / (2 * Math.PI) * Math.asin(i / s);
        return 1 > t ? -.5 * s * Math.pow(2, 10 * (t -= 1)) * Math.sin(2 * (t * r - o) * Math.PI / a) + n : s * Math.pow(2, -10 * (t -= 1)) * Math.sin(2 * (t * r - o) * Math.PI / a) * .5 + i + n
    },
    easeInBack: function (e, t, n, i, r, o) {
        return void 0 == o && (o = 1.70158), i * (t /= r) * t * ((o + 1) * t - o) + n
    },
    easeOutBack: function (e, t, n, i, r, o) {
        return void 0 == o && (o = 1.70158), i * ((t = t / r - 1) * t * ((o + 1) * t + o) + 1) + n
    },
    easeInOutBack: function (e, t, n, i, r, o) {
        return void 0 == o && (o = 1.70158), (t /= r / 2) < 1 ? i / 2 * t * t * (((o *= 1.525) + 1) * t - o) + n : i / 2 * ((t -= 2) * t * (((o *= 1.525) + 1) * t + o) + 2) + n
    },
    easeInBounce: function (e, t, n, i, r) {
        return i - jQuery.easing.easeOutBounce(e, r - t, 0, i, r) + n
    },
    easeOutBounce: function (e, t, n, i, r) {
        return (t /= r) < 1 / 2.75 ? 7.5625 * i * t * t + n : 2 / 2.75 > t ? i * (7.5625 * (t -= 1.5 / 2.75) * t + .75) + n : 2.5 / 2.75 > t ? i * (7.5625 * (t -= 2.25 / 2.75) * t + .9375) + n : i * (7.5625 * (t -= 2.625 / 2.75) * t + .984375) + n
    },
    easeInOutBounce: function (e, t, n, i, r) {
        return r / 2 > t ? .5 * jQuery.easing.easeInBounce(e, 2 * t, 0, i, r) + n : .5 * jQuery.easing.easeOutBounce(e, 2 * t - r, 0, i, r) + .5 * i + n
    }
}), function (e) {
    "function" == typeof define && define.amd ? define(["jquery"], e) : e(jQuery)
}(function (e) {
    e.extend(e.fn, {
        validate: function (t) {
            if (!this.length)return void(t && t.debug && window.console && console.warn("Nothing selected, can't validate, returning nothing."));
            var n = e.data(this[0], "validator");
            return n ? n : (this.attr("novalidate", "novalidate"), n = new e.validator(t, this[0]), e.data(this[0], "validator", n), n.settings.onsubmit && (this.on("click.validate", ":submit", function (t) {
                n.settings.submitHandler && (n.submitButton = t.target), e(this).hasClass("cancel") && (n.cancelSubmit = !0), void 0 !== e(this).attr("formnovalidate") && (n.cancelSubmit = !0)
            }), this.on("submit.validate", function (t) {
                function i() {
                    var i, r;
                    return n.settings.submitHandler ? (n.submitButton && (i = e("<input type='hidden'/>").attr("name", n.submitButton.name).val(e(n.submitButton).val()).appendTo(n.currentForm)), r = n.settings.submitHandler.call(n, n.currentForm, t), n.submitButton && i.remove(), void 0 !== r ? r : !1) : !0
                }

                return n.settings.debug && t.preventDefault(), n.cancelSubmit ? (n.cancelSubmit = !1, i()) : n.form() ? n.pendingRequest ? (n.formSubmitted = !0, !1) : i() : (n.focusInvalid(), !1)
            })), n)
        }, valid: function () {
            var t, n, i;
            return e(this[0]).is("form") ? t = this.validate().form() : (i = [], t = !0, n = e(this[0].form).validate(), this.each(function () {
                t = n.element(this) && t, i = i.concat(n.errorList)
            }), n.errorList = i), t
        }, rules: function (t, n) {
            var i, r, o, a, s, l, u = this[0];
            if (t)switch (i = e.data(u.form, "validator").settings, r = i.rules, o = e.validator.staticRules(u), t) {
                case"add":
                    e.extend(o, e.validator.normalizeRule(n)), delete o.messages, r[u.name] = o, n.messages && (i.messages[u.name] = e.extend(i.messages[u.name], n.messages));
                    break;
                case"remove":
                    return n ? (l = {}, e.each(n.split(/\s/), function (t, n) {
                        l[n] = o[n], delete o[n], "required" === n && e(u).removeAttr("aria-required")
                    }), l) : (delete r[u.name], o)
            }
            return a = e.validator.normalizeRules(e.extend({}, e.validator.classRules(u), e.validator.attributeRules(u), e.validator.dataRules(u), e.validator.staticRules(u)), u), a.required && (s = a.required, delete a.required, a = e.extend({required: s}, a), e(u).attr("aria-required", "true")), a.remote && (s = a.remote, delete a.remote, a = e.extend(a, {remote: s})), a
        }
    }), e.extend(e.expr[":"], {
        blank: function (t) {
            return !e.trim("" + e(t).val())
        }, filled: function (t) {
            return !!e.trim("" + e(t).val())
        }, unchecked: function (t) {
            return !e(t).prop("checked")
        }
    }), e.validator = function (t, n) {
        this.settings = e.extend(!0, {}, e.validator.defaults, t), this.currentForm = n, this.init()
    }, e.validator.format = function (t, n) {
        return 1 === arguments.length ? function () {
            var n = e.makeArray(arguments);
            return n.unshift(t), e.validator.format.apply(this, n)
        } : (arguments.length > 2 && n.constructor !== Array && (n = e.makeArray(arguments).slice(1)), n.constructor !== Array && (n = [n]), e.each(n, function (e, n) {
            t = t.replace(new RegExp("\\{" + e + "\\}", "g"), function () {
                return n
            })
        }), t)
    }, e.extend(e.validator, {
        defaults: {
            messages: {},
            groups: {},
            rules: {},
            errorClass: "error",
            validClass: "valid",
            errorElement: "label",
            focusCleanup: !1,
            focusInvalid: !0,
            errorContainer: e([]),
            errorLabelContainer: e([]),
            onsubmit: !0,
            ignore: ":hidden",
            ignoreTitle: !1,
            onfocusin: function (e) {
                this.lastActive = e, this.settings.focusCleanup && (this.settings.unhighlight && this.settings.unhighlight.call(this, e, this.settings.errorClass, this.settings.validClass), this.hideThese(this.errorsFor(e)))
            },
            onfocusout: function (e) {
                this.checkable(e) || !(e.name in this.submitted) && this.optional(e) || this.element(e)
            },
            onkeyup: function (t, n) {
                var i = [16, 17, 18, 20, 35, 36, 37, 38, 39, 40, 45, 144, 225];
                9 === n.which && "" === this.elementValue(t) || -1 !== e.inArray(n.keyCode, i) || (t.name in this.submitted || t === this.lastElement) && this.element(t)
            },
            onclick: function (e) {
                e.name in this.submitted ? this.element(e) : e.parentNode.name in this.submitted && this.element(e.parentNode)
            },
            highlight: function (t, n, i) {
                "radio" === t.type ? this.findByName(t.name).addClass(n).removeClass(i) : e(t).addClass(n).removeClass(i)
            },
            unhighlight: function (t, n, i) {
                "radio" === t.type ? this.findByName(t.name).removeClass(n).addClass(i) : e(t).removeClass(n).addClass(i)
            }
        },
        setDefaults: function (t) {
            e.extend(e.validator.defaults, t)
        },
        messages: {
            required: "This field is required.",
            remote: "Please fix this field.",
            email: "Please enter a valid email address.",
            url: "Please enter a valid URL.",
            date: "Please enter a valid date.",
            dateISO: "Please enter a valid date ( ISO ).",
            number: "Please enter a valid number.",
            digits: "Please enter only digits.",
            creditcard: "Please enter a valid credit card number.",
            equalTo: "Please enter the same value again.",
            maxlength: e.validator.format("Please enter no more than {0} characters."),
            minlength: e.validator.format("Please enter at least {0} characters."),
            rangelength: e.validator.format("Please enter a value between {0} and {1} characters long."),
            range: e.validator.format("Please enter a value between {0} and {1}."),
            max: e.validator.format("Please enter a value less than or equal to {0}."),
            min: e.validator.format("Please enter a value greater than or equal to {0}.")
        },
        autoCreateRanges: !1,
        prototype: {
            init: function () {
                function t(t) {
                    var n = e.data(this.form, "validator"), i = "on" + t.type.replace(/^validate/, ""), r = n.settings;
                    r[i] && !e(this).is(r.ignore) && r[i].call(n, this, t)
                }

                this.labelContainer = e(this.settings.errorLabelContainer), this.errorContext = this.labelContainer.length && this.labelContainer || e(this.currentForm), this.containers = e(this.settings.errorContainer).add(this.settings.errorLabelContainer), this.submitted = {}, this.valueCache = {}, this.pendingRequest = 0, this.pending = {}, this.invalid = {}, this.reset();
                var n, i = this.groups = {};
                e.each(this.settings.groups, function (t, n) {
                    "string" == typeof n && (n = n.split(/\s/)), e.each(n, function (e, n) {
                        i[n] = t
                    })
                }), n = this.settings.rules, e.each(n, function (t, i) {
                    n[t] = e.validator.normalizeRule(i)
                }), e(this.currentForm).on("focusin.validate focusout.validate keyup.validate", ":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'], [type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'], [type='radio'], [type='checkbox']", t).on("click.validate", "select, option, [type='radio'], [type='checkbox']", t), this.settings.invalidHandler && e(this.currentForm).on("invalid-form.validate", this.settings.invalidHandler), e(this.currentForm).find("[required], [data-rule-required], .required").attr("aria-required", "true")
            }, form: function () {
                return this.checkForm(), e.extend(this.submitted, this.errorMap), this.invalid = e.extend({}, this.errorMap), this.valid() || e(this.currentForm).triggerHandler("invalid-form", [this]), this.showErrors(), this.valid()
            }, checkForm: function () {
                this.prepareForm();
                for (var e = 0, t = this.currentElements = this.elements(); t[e]; e++)this.check(t[e]);
                return this.valid()
            }, element: function (t) {
                var n = this.clean(t), i = this.validationTargetFor(n), r = !0;
                return this.lastElement = i, void 0 === i ? delete this.invalid[n.name] : (this.prepareElement(i), this.currentElements = e(i), r = this.check(i) !== !1, r ? delete this.invalid[i.name] : this.invalid[i.name] = !0), e(t).attr("aria-invalid", !r), this.numberOfInvalids() || (this.toHide = this.toHide.add(this.containers)), this.showErrors(), r
            }, showErrors: function (t) {
                if (t) {
                    e.extend(this.errorMap, t), this.errorList = [];
                    for (var n in t)this.errorList.push({message: t[n], element: this.findByName(n)[0]});
                    this.successList = e.grep(this.successList, function (e) {
                        return !(e.name in t)
                    })
                }
                this.settings.showErrors ? this.settings.showErrors.call(this, this.errorMap, this.errorList) : this.defaultShowErrors()
            }, resetForm: function () {
                e.fn.resetForm && e(this.currentForm).resetForm(), this.submitted = {}, this.lastElement = null, this.prepareForm(), this.hideErrors();
                var t, n = this.elements().removeData("previousValue").removeAttr("aria-invalid");
                if (this.settings.unhighlight)for (t = 0; n[t]; t++)this.settings.unhighlight.call(this, n[t], this.settings.errorClass, ""); else n.removeClass(this.settings.errorClass)
            }, numberOfInvalids: function () {
                return this.objectLength(this.invalid)
            }, objectLength: function (e) {
                var t, n = 0;
                for (t in e)n++;
                return n
            }, hideErrors: function () {
                this.hideThese(this.toHide)
            }, hideThese: function (e) {
                e.not(this.containers).text(""), this.addWrapper(e).hide()
            }, valid: function () {
                return 0 === this.size()
            }, size: function () {
                return this.errorList.length
            }, focusInvalid: function () {
                if (this.settings.focusInvalid)try {
                    e(this.findLastActive() || this.errorList.length && this.errorList[0].element || []).filter(":visible").focus().trigger("focusin")
                } catch (t) {
                }
            }, findLastActive: function () {
                var t = this.lastActive;
                return t && 1 === e.grep(this.errorList, function (e) {
                        return e.element.name === t.name
                    }).length && t
            }, elements: function () {
                var t = this, n = {};
                return e(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, :disabled").not(this.settings.ignore).filter(function () {
                    return !this.name && t.settings.debug && window.console && console.error("%o has no name assigned", this), this.name in n || !t.objectLength(e(this).rules()) ? !1 : (n[this.name] = !0, !0)
                })
            }, clean: function (t) {
                return e(t)[0]
            }, errors: function () {
                var t = this.settings.errorClass.split(" ").join(".");
                return e(this.settings.errorElement + "." + t, this.errorContext)
            }, reset: function () {
                this.successList = [], this.errorList = [], this.errorMap = {}, this.toShow = e([]), this.toHide = e([]), this.currentElements = e([])
            }, prepareForm: function () {
                this.reset(), this.toHide = this.errors().add(this.containers)
            }, prepareElement: function (e) {
                this.reset(), this.toHide = this.errorsFor(e)
            }, elementValue: function (t) {
                var n, i = e(t), r = t.type;
                return "radio" === r || "checkbox" === r ? this.findByName(t.name).filter(":checked").val() : "number" === r && "undefined" != typeof t.validity ? t.validity.badInput ? !1 : i.val() : (n = i.val(), "string" == typeof n ? n.replace(/\r/g, "") : n)
            }, check: function (t) {
                t = this.validationTargetFor(this.clean(t));
                var n, i, r, o = e(t).rules(), a = e.map(o, function (e, t) {
                    return t
                }).length, s = !1, l = this.elementValue(t);
                for (i in o) {
                    r = {method: i, parameters: o[i]};
                    try {
                        if (n = e.validator.methods[i].call(this, l, t, r.parameters), "dependency-mismatch" === n && 1 === a) {
                            s = !0;
                            continue
                        }
                        if (s = !1, "pending" === n)return void(this.toHide = this.toHide.not(this.errorsFor(t)));
                        if (!n)return this.formatAndAdd(t, r), !1
                    } catch (u) {
                        throw this.settings.debug && window.console && console.log("Exception occurred when checking element " + t.id + ", check the '" + r.method + "' method.", u), u instanceof TypeError && (u.message += ".  Exception occurred when checking element " + t.id + ", check the '" + r.method + "' method."), u
                    }
                }
                if (!s)return this.objectLength(o) && this.successList.push(t), !0
            }, customDataMessage: function (t, n) {
                return e(t).data("msg" + n.charAt(0).toUpperCase() + n.substring(1).toLowerCase()) || e(t).data("msg")
            }, customMessage: function (e, t) {
                var n = this.settings.messages[e];
                return n && (n.constructor === String ? n : n[t])
            }, findDefined: function () {
                for (var e = 0; e < arguments.length; e++)if (void 0 !== arguments[e])return arguments[e];
                return void 0
            }, defaultMessage: function (t, n) {
                return this.findDefined(this.customMessage(t.name, n), this.customDataMessage(t, n), !this.settings.ignoreTitle && t.title || void 0, e.validator.messages[n], "<strong>Warning: No message defined for " + t.name + "</strong>")
            }, formatAndAdd: function (t, n) {
                var i = this.defaultMessage(t, n.method), r = /\$?\{(\d+)\}/g;
                "function" == typeof i ? i = i.call(this, n.parameters, t) : r.test(i) && (i = e.validator.format(i.replace(r, "{$1}"), n.parameters)), this.errorList.push({
                    message: i,
                    element: t,
                    method: n.method
                }), this.errorMap[t.name] = i, this.submitted[t.name] = i
            }, addWrapper: function (e) {
                return this.settings.wrapper && (e = e.add(e.parent(this.settings.wrapper))), e
            }, defaultShowErrors: function () {
                var e, t, n;
                for (e = 0; this.errorList[e]; e++)n = this.errorList[e], this.settings.highlight && this.settings.highlight.call(this, n.element, this.settings.errorClass, this.settings.validClass), this.showLabel(n.element, n.message);
                if (this.errorList.length && (this.toShow = this.toShow.add(this.containers)), this.settings.success)for (e = 0; this.successList[e]; e++)this.showLabel(this.successList[e]);
                if (this.settings.unhighlight)for (e = 0, t = this.validElements(); t[e]; e++)this.settings.unhighlight.call(this, t[e], this.settings.errorClass, this.settings.validClass);
                this.toHide = this.toHide.not(this.toShow), this.hideErrors(), this.addWrapper(this.toShow).show()
            }, validElements: function () {
                return this.currentElements.not(this.invalidElements())
            }, invalidElements: function () {
                return e(this.errorList).map(function () {
                    return this.element
                })
            }, showLabel: function (t, n) {
                var i, r, o, a = this.errorsFor(t), s = this.idOrName(t), l = e(t).attr("aria-describedby");
                a.length ? (a.removeClass(this.settings.validClass).addClass(this.settings.errorClass), a.html(n)) : (a = e("<" + this.settings.errorElement + ">").attr("id", s + "-error").addClass(this.settings.errorClass).html(n || ""), i = a, this.settings.wrapper && (i = a.hide().show().wrap("<" + this.settings.wrapper + "/>").parent()), this.labelContainer.length ? this.labelContainer.append(i) : this.settings.errorPlacement ? this.settings.errorPlacement(i, e(t)) : i.insertAfter(t), a.is("label") ? a.attr("for", s) : 0 === a.parents("label[for='" + s + "']").length && (o = a.attr("id").replace(/(:|\.|\[|\]|\$)/g, "\\$1"), l ? l.match(new RegExp("\\b" + o + "\\b")) || (l += " " + o) : l = o, e(t).attr("aria-describedby", l), r = this.groups[t.name], r && e.each(this.groups, function (t, n) {
                    n === r && e("[name='" + t + "']", this.currentForm).attr("aria-describedby", a.attr("id"))
                }))), !n && this.settings.success && (a.text(""), "string" == typeof this.settings.success ? a.addClass(this.settings.success) : this.settings.success(a, t)), this.toShow = this.toShow.add(a)
            }, errorsFor: function (t) {
                var n = this.idOrName(t), i = e(t).attr("aria-describedby"), r = "label[for='" + n + "'], label[for='" + n + "'] *";
                return i && (r = r + ", #" + i.replace(/\s+/g, ", #")), this.errors().filter(r)
            }, idOrName: function (e) {
                return this.groups[e.name] || (this.checkable(e) ? e.name : e.id || e.name)
            }, validationTargetFor: function (t) {
                return this.checkable(t) && (t = this.findByName(t.name)), e(t).not(this.settings.ignore)[0]
            }, checkable: function (e) {
                return /radio|checkbox/i.test(e.type)
            }, findByName: function (t) {
                return e(this.currentForm).find("[name='" + t + "']")
            }, getLength: function (t, n) {
                switch (n.nodeName.toLowerCase()) {
                    case"select":
                        return e("option:selected", n).length;
                    case"input":
                        if (this.checkable(n))return this.findByName(n.name).filter(":checked").length
                }
                return t.length
            }, depend: function (e, t) {
                return this.dependTypes[typeof e] ? this.dependTypes[typeof e](e, t) : !0
            }, dependTypes: {
                "boolean": function (e) {
                    return e
                }, string: function (t, n) {
                    return !!e(t, n.form).length
                }, "function": function (e, t) {
                    return e(t)
                }
            }, optional: function (t) {
                var n = this.elementValue(t);
                return !e.validator.methods.required.call(this, n, t) && "dependency-mismatch"
            }, startRequest: function (e) {
                this.pending[e.name] || (this.pendingRequest++, this.pending[e.name] = !0)
            }, stopRequest: function (t, n) {
                this.pendingRequest--, this.pendingRequest < 0 && (this.pendingRequest = 0), delete this.pending[t.name], n && 0 === this.pendingRequest && this.formSubmitted && this.form() ? (e(this.currentForm).submit(), this.formSubmitted = !1) : !n && 0 === this.pendingRequest && this.formSubmitted && (e(this.currentForm).triggerHandler("invalid-form", [this]), this.formSubmitted = !1)
            }, previousValue: function (t) {
                return e.data(t, "previousValue") || e.data(t, "previousValue", {
                        old: null,
                        valid: !0,
                        message: this.defaultMessage(t, "remote")
                    })
            }, destroy: function () {
                this.resetForm(), e(this.currentForm).off(".validate").removeData("validator")
            }
        },
        classRuleSettings: {
            required: {required: !0},
            email: {email: !0},
            url: {url: !0},
            date: {date: !0},
            dateISO: {dateISO: !0},
            number: {number: !0},
            digits: {digits: !0},
            creditcard: {creditcard: !0}
        },
        addClassRules: function (t, n) {
            t.constructor === String ? this.classRuleSettings[t] = n : e.extend(this.classRuleSettings, t)
        },
        classRules: function (t) {
            var n = {}, i = e(t).attr("class");
            return i && e.each(i.split(" "), function () {
                this in e.validator.classRuleSettings && e.extend(n, e.validator.classRuleSettings[this])
            }), n
        },
        normalizeAttributeRule: function (e, t, n, i) {
            /min|max/.test(n) && (null === t || /number|range|text/.test(t)) && (i = Number(i), isNaN(i) && (i = void 0)), i || 0 === i ? e[n] = i : t === n && "range" !== t && (e[n] = !0)
        },
        attributeRules: function (t) {
            var n, i, r = {}, o = e(t), a = t.getAttribute("type");
            for (n in e.validator.methods)"required" === n ? (i = t.getAttribute(n), "" === i && (i = !0), i = !!i) : i = o.attr(n), this.normalizeAttributeRule(r, a, n, i);
            return r.maxlength && /-1|2147483647|524288/.test(r.maxlength) && delete r.maxlength, r
        },
        dataRules: function (t) {
            var n, i, r = {}, o = e(t), a = t.getAttribute("type");
            for (n in e.validator.methods)i = o.data("rule" + n.charAt(0).toUpperCase() + n.substring(1).toLowerCase()), this.normalizeAttributeRule(r, a, n, i);
            return r
        },
        staticRules: function (t) {
            var n = {}, i = e.data(t.form, "validator");
            return i.settings.rules && (n = e.validator.normalizeRule(i.settings.rules[t.name]) || {}), n
        },
        normalizeRules: function (t, n) {
            return e.each(t, function (i, r) {
                if (r === !1)return void delete t[i];
                if (r.param || r.depends) {
                    var o = !0;
                    switch (typeof r.depends) {
                        case"string":
                            o = !!e(r.depends, n.form).length;
                            break;
                        case"function":
                            o = r.depends.call(n, n)
                    }
                    o ? t[i] = void 0 !== r.param ? r.param : !0 : delete t[i]
                }
            }), e.each(t, function (i, r) {
                t[i] = e.isFunction(r) ? r(n) : r
            }), e.each(["minlength", "maxlength"], function () {
                t[this] && (t[this] = Number(t[this]))
            }), e.each(["rangelength", "range"], function () {
                var n;
                t[this] && (e.isArray(t[this]) ? t[this] = [Number(t[this][0]), Number(t[this][1])] : "string" == typeof t[this] && (n = t[this].replace(/[\[\]]/g, "").split(/[\s,]+/), t[this] = [Number(n[0]), Number(n[1])]))
            }), e.validator.autoCreateRanges && (null != t.min && null != t.max && (t.range = [t.min, t.max], delete t.min, delete t.max), null != t.minlength && null != t.maxlength && (t.rangelength = [t.minlength, t.maxlength], delete t.minlength, delete t.maxlength)), t
        },
        normalizeRule: function (t) {
            if ("string" == typeof t) {
                var n = {};
                e.each(t.split(/\s/), function () {
                    n[this] = !0
                }), t = n
            }
            return t
        },
        addMethod: function (t, n, i) {
            e.validator.methods[t] = n, e.validator.messages[t] = void 0 !== i ? i : e.validator.messages[t], n.length < 3 && e.validator.addClassRules(t, e.validator.normalizeRule(t))
        },
        methods: {
            required: function (t, n, i) {
                if (!this.depend(i, n))return "dependency-mismatch";
                if ("select" === n.nodeName.toLowerCase()) {
                    var r = e(n).val();
                    return r && r.length > 0
                }
                return this.checkable(n) ? this.getLength(t, n) > 0 : t.length > 0
            }, email: function (e, t) {
                return this.optional(t) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(e)
            }, url: function (e, t) {
                return this.optional(t) || /^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})).?)(?::\d{2,5})?(?:[/?#]\S*)?$/i.test(e)
            }, date: function (e, t) {
                return this.optional(t) || !/Invalid|NaN/.test(new Date(e).toString())
            }, dateISO: function (e, t) {
                return this.optional(t) || /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(e)
            }, number: function (e, t) {
                return this.optional(t) || /^(?:-?\d+|-?\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(e)
            }, digits: function (e, t) {
                return this.optional(t) || /^\d+$/.test(e)
            }, creditcard: function (e, t) {
                if (this.optional(t))return "dependency-mismatch";
                if (/[^0-9 \-]+/.test(e))return !1;
                var n, i, r = 0, o = 0, a = !1;
                if (e = e.replace(/\D/g, ""), e.length < 13 || e.length > 19)return !1;
                for (n = e.length - 1; n >= 0; n--)i = e.charAt(n), o = parseInt(i, 10), a && (o *= 2) > 9 && (o -= 9), r += o, a = !a;
                return r % 10 === 0
            }, minlength: function (t, n, i) {
                var r = e.isArray(t) ? t.length : this.getLength(t, n);
                return this.optional(n) || r >= i
            }, maxlength: function (t, n, i) {
                var r = e.isArray(t) ? t.length : this.getLength(t, n);
                return this.optional(n) || i >= r
            }, rangelength: function (t, n, i) {
                var r = e.isArray(t) ? t.length : this.getLength(t, n);
                return this.optional(n) || r >= i[0] && r <= i[1]
            }, min: function (e, t, n) {
                return this.optional(t) || e >= n
            }, max: function (e, t, n) {
                return this.optional(t) || n >= e
            }, range: function (e, t, n) {
                return this.optional(t) || e >= n[0] && e <= n[1]
            }, equalTo: function (t, n, i) {
                var r = e(i);
                return this.settings.onfocusout && r.off(".validate-equalTo").on("blur.validate-equalTo", function () {
                    e(n).valid()
                }), console.log(t, "+", e(i)), t === r.val()
            }, remote: function (t, n, i) {
                if (this.optional(n))return "dependency-mismatch";
                var r, o, a = this.previousValue(n);
                return this.settings.messages[n.name] || (this.settings.messages[n.name] = {}), a.originalMessage = this.settings.messages[n.name].remote, this.settings.messages[n.name].remote = a.message, i = "string" == typeof i && {url: i} || i, a.old === t ? a.valid : (a.old = t, r = this, this.startRequest(n), o = {}, o[n.name] = t, e.ajax(e.extend(!0, {
                    mode: "abort",
                    port: "validate" + n.name,
                    dataType: "json",
                    data: o,
                    context: r.currentForm,
                    success: function (i) {
                        var o, s, l, u = i === !0 || "true" === i;
                        r.settings.messages[n.name].remote = a.originalMessage, u ? (l = r.formSubmitted, r.prepareElement(n), r.formSubmitted = l, r.successList.push(n), delete r.invalid[n.name], r.showErrors()) : (o = {}, s = i || r.defaultMessage(n, "remote"), o[n.name] = a.message = e.isFunction(s) ? s(t) : s, r.invalid[n.name] = !0, r.showErrors(o)), a.valid = u, r.stopRequest(n, u)
                    }
                }, i)), "pending")
            }
        }
    });
    var t, n = {};
    e.ajaxPrefilter ? e.ajaxPrefilter(function (e, t, i) {
        var r = e.port;
        "abort" === e.mode && (n[r] && n[r].abort(), n[r] = i)
    }) : (t = e.ajax, e.ajax = function (i) {
        var r = ("mode" in i ? i : e.ajaxSettings).mode, o = ("port" in i ? i : e.ajaxSettings).port;
        return "abort" === r ? (n[o] && n[o].abort(), n[o] = t.apply(this, arguments), n[o]) : t.apply(this, arguments)
    })
}), $.extend($.validator.messages, {
    required: "\u042d\u0442\u043e \u043f\u043e\u043b\u0435 \u043d\u0435\u043e\u0431\u0445\u043e\u0434\u0438\u043c\u043e \u0437\u0430\u043f\u043e\u043b\u043d\u0438\u0442\u044c.",
    remote: "\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u043f\u0440\u0430\u0432\u0438\u043b\u044c\u043d\u043e\u0435 \u0437\u043d\u0430\u0447\u0435\u043d\u0438\u0435.",
    email: "\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u043a\u043e\u0440\u0440\u0435\u043a\u0442\u043d\u044b\u0439 \u0430\u0434\u0440\u0435\u0441 \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043d\u043d\u043e\u0439 \u043f\u043e\u0447\u0442\u044b.",
    url: "\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u043a\u043e\u0440\u0440\u0435\u043a\u0442\u043d\u044b\u0439 URL.",
    date: "\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u043a\u043e\u0440\u0440\u0435\u043a\u0442\u043d\u0443\u044e \u0434\u0430\u0442\u0443.",
    dateISO: "\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u043a\u043e\u0440\u0440\u0435\u043a\u0442\u043d\u0443\u044e \u0434\u0430\u0442\u0443 \u0432 \u0444\u043e\u0440\u043c\u0430\u0442\u0435 ISO.",
    number: "\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u0447\u0438\u0441\u043b\u043e.",
    digits: "\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u043e\u0434\u0438\u0442\u0435 \u0442\u043e\u043b\u044c\u043a\u043e \u0446\u0438\u0444\u0440\u044b.",
    creditcard: "\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u043f\u0440\u0430\u0432\u0438\u043b\u044c\u043d\u044b\u0439 \u043d\u043e\u043c\u0435\u0440 \u043a\u0440\u0435\u0434\u0438\u0442\u043d\u043e\u0439 \u043a\u0430\u0440\u0442\u044b.",
    equalTo: "\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u0442\u0430\u043a\u043e\u0435 \u0436\u0435 \u0437\u043d\u0430\u0447\u0435\u043d\u0438\u0435 \u0435\u0449\u0451 \u0440\u0430\u0437.",
    extension: "\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u044b\u0431\u0435\u0440\u0438\u0442\u0435 \u0444\u0430\u0439\u043b \u0441 \u043f\u0440\u0430\u0432\u0438\u043b\u044c\u043d\u044b\u043c \u0440\u0430\u0441\u0448\u0438\u0440\u0435\u043d\u0438\u0435\u043c.",
    maxlength: $.validator.format("\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u043d\u0435 \u0431\u043e\u043b\u044c\u0448\u0435 {0} \u0441\u0438\u043c\u0432\u043e\u043b\u043e\u0432."),
    minlength: $.validator.format("\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u043d\u0435 \u043c\u0435\u043d\u044c\u0448\u0435 {0} \u0441\u0438\u043c\u0432\u043e\u043b\u043e\u0432."),
    rangelength: $.validator.format("\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u0437\u043d\u0430\u0447\u0435\u043d\u0438\u0435 \u0434\u043b\u0438\u043d\u043e\u0439 \u043e\u0442 {0} \u0434\u043e {1} \u0441\u0438\u043c\u0432\u043e\u043b\u043e\u0432."),
    range: $.validator.format("\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u0447\u0438\u0441\u043b\u043e \u043e\u0442 {0} \u0434\u043e {1}."),
    max: $.validator.format("\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u0447\u0438\u0441\u043b\u043e, \u043c\u0435\u043d\u044c\u0448\u0435\u0435 \u0438\u043b\u0438 \u0440\u0430\u0432\u043d\u043e\u0435\xa0{0}."),
    min: $.validator.format("\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u0432\u0435\u0434\u0438\u0442\u0435 \u0447\u0438\u0441\u043b\u043e, \u0431\u043e\u043b\u044c\u0448\u0435\u0435 \u0438\u043b\u0438 \u0440\u0430\u0432\u043d\u043e\u0435 {0}.")
}), !function (e) {
    "function" == typeof define && define.amd ? define(["jquery"], e) : e("object" == typeof exports ? require("jquery") : jQuery)
}(function (e) {
    var t, n = navigator.userAgent, i = /iphone/i.test(n), r = /chrome/i.test(n), o = /android/i.test(n);
    e.mask = {
        definitions: {9: "[0-9]", a: "[A-Za-z]", "*": "[A-Za-z0-9]"},
        autoclear: !0,
        dataName: "rawMaskFn",
        placeholder: "_"
    }, e.fn.extend({
        caret: function (e, t) {
            var n;
            return 0 === this.length || this.is(":hidden") ? void 0 : "number" == typeof e ? (t = "number" == typeof t ? t : e, this.each(function () {
                this.setSelectionRange ? this.setSelectionRange(e, t) : this.createTextRange && (n = this.createTextRange(), n.collapse(!0), n.moveEnd("character", t), n.moveStart("character", e), n.select())
            })) : (this[0].setSelectionRange ? (e = this[0].selectionStart, t = this[0].selectionEnd) : document.selection && document.selection.createRange && (n = document.selection.createRange(), e = 0 - n.duplicate().moveStart("character", -1e5), t = e + n.text.length), {
                begin: e,
                end: t
            })
        }, unmask: function () {
            return this.trigger("unmask")
        }, mask: function (n, a) {
            var s, l, u, c, d, p, h, f;
            if (!n && this.length > 0) {
                s = e(this[0]);
                var m = s.data(e.mask.dataName);
                return m ? m() : void 0
            }
            return a = e.extend({
                autoclear: e.mask.autoclear,
                placeholder: e.mask.placeholder,
                completed: null
            }, a), l = e.mask.definitions, u = [], c = h = n.length, d = null, e.each(n.split(""), function (e, t) {
                "?" == t ? (h--, c = e) : l[t] ? (u.push(new RegExp(l[t])), null === d && (d = u.length - 1), c > e && (p = u.length - 1)) : u.push(null)
            }), this.trigger("unmask").each(function () {
                function s() {
                    if (a.completed) {
                        for (var e = d; p >= e; e++)if (u[e] && $[e] === m(e))return;
                        a.completed.call(E)
                    }
                }

                function m(e) {
                    return a.placeholder.charAt(e < a.placeholder.length ? e : 0)
                }

                function g(e) {
                    for (; ++e < h && !u[e];);
                    return e
                }

                function v(e) {
                    for (; --e >= 0 && !u[e];);
                    return e
                }

                function y(e, t) {
                    var n, i;
                    if (!(0 > e)) {
                        for (n = e, i = g(t); h > n; n++)if (u[n]) {
                            if (!(h > i && u[n].test($[i])))break;
                            $[n] = $[i], $[i] = m(i), i = g(i)
                        }
                        T(), E.caret(Math.max(d, e))
                    }
                }

                function b(e) {
                    var t, n, i, r;
                    for (t = e, n = m(e); h > t; t++)if (u[t]) {
                        if (i = g(t), r = $[t], $[t] = n, !(h > i && u[i].test(r)))break;
                        n = r
                    }
                }

                function x() {
                    var e = E.val(), t = E.caret();
                    if (f && f.length && f.length > e.length) {
                        for (S(!0); t.begin > 0 && !u[t.begin - 1];)t.begin--;
                        if (0 === t.begin)for (; t.begin < d && !u[t.begin];)t.begin++;
                        E.caret(t.begin, t.begin)
                    } else {
                        for (S(!0); t.begin < h && !u[t.begin];)t.begin++;
                        E.caret(t.begin, t.begin)
                    }
                    s()
                }

                function w() {
                    S(), E.val() != A && E.change()
                }

                function k(e) {
                    if (!E.prop("readonly")) {
                        var t, n, r, o = e.which || e.keyCode;
                        f = E.val(), 8 === o || 46 === o || i && 127 === o ? (t = E.caret(), n = t.begin, r = t.end, r - n === 0 && (n = 46 !== o ? v(n) : r = g(n - 1), r = 46 === o ? g(r) : r), C(n, r), y(n, r - 1), e.preventDefault()) : 13 === o ? w.call(this, e) : 27 === o && (E.val(A), E.caret(0, S()), e.preventDefault())
                    }
                }

                function _(t) {
                    if (!E.prop("readonly")) {
                        var n, i, r, a = t.which || t.keyCode, l = E.caret();
                        if (!(t.ctrlKey || t.altKey || t.metaKey || 32 > a) && a && 13 !== a) {
                            if (l.end - l.begin !== 0 && (C(l.begin, l.end), y(l.begin, l.end - 1)), n = g(l.begin - 1), h > n && (i = String.fromCharCode(a), u[n].test(i))) {
                                if (b(n), $[n] = i, T(), r = g(n), o) {
                                    var c = function () {
                                        e.proxy(e.fn.caret, E, r)()
                                    };
                                    setTimeout(c, 0)
                                } else E.caret(r);
                                l.begin <= p && s()
                            }
                            t.preventDefault()
                        }
                    }
                }

                function C(e, t) {
                    var n;
                    for (n = e; t > n && h > n; n++)u[n] && ($[n] = m(n))
                }

                function T() {
                    E.val($.join(""))
                }

                function S(e) {
                    var t, n, i, r = E.val(), o = -1;
                    for (t = 0, i = 0; h > t; t++)if (u[t]) {
                        for ($[t] = m(t); i++ < r.length;)if (n = r.charAt(i - 1), u[t].test(n)) {
                            $[t] = n, o = t;
                            break
                        }
                        if (i > r.length) {
                            C(t + 1, h);
                            break
                        }
                    } else $[t] === r.charAt(i) && i++, c > t && (o = t);
                    return e ? T() : c > o + 1 ? a.autoclear || $.join("") === N ? (E.val() && E.val(""), C(0, h)) : T() : (T(), E.val(E.val().substring(0, o + 1))), c ? t : d
                }

                var E = e(this), $ = e.map(n.split(""), function (e, t) {
                    return "?" != e ? l[e] ? m(t) : e : void 0
                }), N = $.join(""), A = E.val();
                E.data(e.mask.dataName, function () {
                    return e.map($, function (e, t) {
                        return u[t] && e != m(t) ? e : null
                    }).join("")
                }), E.one("unmask", function () {
                    E.off(".mask").removeData(e.mask.dataName)
                }).on("focus.mask", function () {
                    if (!E.prop("readonly")) {
                        clearTimeout(t);
                        var e;
                        A = E.val(), e = S(), t = setTimeout(function () {
                            E.get(0) === document.activeElement && (T(), e == n.replace("?", "").length ? E.caret(0, e) : E.caret(e))
                        }, 10)
                    }
                }).on("blur.mask", w).on("keydown.mask", k).on("keypress.mask", _).on("input.mask paste.mask", function () {
                    E.prop("readonly") || setTimeout(function () {
                        var e = S(!0);
                        E.caret(e), s()
                    }, 0)
                }), r && o && E.off("input.mask").on("input.mask", x), S()
            })
        }
    })
});
var _gaq = [];
_gaq.push(["_setAccount", "UA-17102959-2"]), _gaq.push(["_setDomainName", "printio.ru"]), _gaq.push.apply(_gaq, __customVars), _gaq.push(["_addOrganic", "images.yandex.ru", "text", !0], ["_addOrganic", "blogsearch.google.ru", "q", !0], ["_addOrganic", "blogs.yandex.ru", "text", !0], ["_addOrganic", "go.mail.ru", "q"], ["_addOrganic", "nova.rambler.ru", "query"], ["_addOrganic", "nigma.ru", "s"], ["_addOrganic", "webalta.ru", "q"], ["_addOrganic", "aport.ru", "r"], ["_addOrganic", "poisk.ru", "text"], ["_addOrganic", "km.ru", "sq"], ["_addOrganic", "liveinternet.ru", "q"], ["_addOrganic", "quintura.ru", "request"], ["_addOrganic", "search.qip.ru", "query"], ["_addOrganic", "gde.ru", "keywords"], ["_addOrganic", "ru.yahoo.com", "p"], ["_addOrganic", "market.yandex.ru", "text", !0], ["_addOrganic", "price.ru", "query"], ["_addOrganic", "tyndex.ru", "pnam"], ["_addOrganic", "torg.mail.ru", "q"], ["_addOrganic", "tiu.ru", "search_term"], ["_addOrganic", "tech2u.ru", "text"], ["_addOrganic", "goods.marketgid.com", "query"], ["_addOrganic", "poisk.ngs.ru", "q"], ["_addOrganic", "sravni.com", "q"], ["_addOrganic", "e-katalog.ru", "search_"]), _gaq.push(["dimension1", "true" === document.getElementById("registered").value ? "registered" : ""]), _gaq.push(["_trackPageview"]), "undefined" != typeof __customAccount && __customAccount && (_gaq.push(["b._setAccount", __customAccount]), "undefined" != typeof __customDomain && (_gaq.push(["b._setDomainName", __customDomain]), _gaq.push(["b._setAllowLinker", !0])), _gaq.push(["b._trackPageview"])), "undefined" != typeof __transaction && _gaq.push.apply(_gaq, __transaction), "undefined" != typeof FB && FB.Event && FB.Event.subscribe && (FB.Event.subscribe("edge.create", function (e) {
    _gaq.push(["_trackSocial", "facebook", "like", e])
}), FB.Event.subscribe("edge.remove", function (e) {
    _gaq.push(["_trackSocial", "facebook", "unlike", e])
})), function (e) {
    var t = e.getElementById("env-staging") || e.getElementById("env-development") || e.getElementById("is-admin");
    if (!t) {
        var n = e.createElement("script"), i = e.getElementsByTagName("head")[0];
        n.async = !0, n.src = "http://www.google-analytics.com/ga.js", i.insertBefore(n, i.firstChild)
    }
}(document);
var _kmq = _kmq || [], _kmk = _kmk || "e12ab06c59351ac3bf7be85c886ba1c60ccb469c";
_kms("//i.kissmetrics.com/i.js"), _kms("//doug1izaerwt3.cloudfront.net/" + _kmk + ".1.js"), function () {
    if (!document.getElementById("env-development")) {
        var e = "8019", t = document.createElement("script");
        t.async = !0, t.src = "//code.jivosite.ru/script/widget/" + e;
        var n = document.getElementsByTagName("script")[0];
        n.parentNode.insertBefore(t, n)
    }
}(), function (e) {
    if (!(document.getElementById("env-development") || document.body.className.indexOf("custom-store") > -1 || document.body.className.indexOf("line-items-index-page") > -1)) {
        var t = "http://widget.reformal.ru/", n = "Printio", i = e.MyOtziv = {
            mo_get_win_width: function () {
                var e = 0;
                return "number" == typeof window.innerWidth ? e = window.innerWidth : document.documentElement && document.documentElement.clientWidth ? e = document.documentElement.clientWidth : document.body && document.body.clientWidth && (e = document.body.clientWidth), e
            }, mo_get_win_height: function () {
                var e = 0;
                return "number" == typeof window.innerHeight ? e = window.innerHeight : document.documentElement && document.documentElement.clientHeight ? e = document.documentElement.clientHeight : document.body && document.body.clientHeight && (e = document.body.clientHeight), e
            }, mo_get_scrol: function () {
                var e = 0;
                return self.pageYOffset ? e = self.pageYOffset : document.documentElement && document.documentElement.scrollTop ? e = document.documentElement.scrollTop : document.body && (e = document.body.scrollTop), e
            }, mo_show_box: function () {
                "" == document.getElementById("fthere").innerHTML && (document.getElementById("fthere").innerHTML = '<iframe src="' + t + "wdg.php?domain=" + n.toLowerCase() + '" width="627" height="250" align="left" style="border: 0; position:relative;" frameborder="0" scrolling="no">Frame error</iframe>');
                var e = this.mo_get_win_width() / 2 - 350, i = this.mo_get_win_height() / 2 - 200 + this.mo_get_scrol();
                document.getElementById("myotziv_box").style.top = i + "px", document.getElementById("myotziv_box").style.left = e + "px", document.getElementById("myotziv_box").style.display = "block"
            }, mo_hide_box: function () {
                document.getElementById("myotziv_box").style.display = "none"
            }, mo_showcss: function () {
                var e = [".tdsfh{background: url('" + t + "tmpl/images/feedback_tab.png');}* html .tdsfh{background-image: none; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + t + 'tmpl/images/feedback_tab.png\');}.widsnjx {margin:0 auto; position:relative;}.widsnjx fieldset {padding:0; border:none; border:0px solid #000; margin:0;}.furjbqy {position:fixed; left:0; top:263px; z-index:5; width:22px; height:151px;}* html .furjbqy {position:absolute;}.furjbqy a {display:block; width:22px; height:151px; background:#FFA000;}.furjbqy a:hover {background:#FFA000;}.furjbqy img {border:0;}.furrghtd {position:fixed; right:1px; top:263px; z-index:5; width:22px; height:151px;}* html .furrghtd {position:absolute;}.furrghtd a {display:block; width:22px; height:151px; background:#FFA000;}.furrghtd a:hover {background:#FFA000;}.furrghtd img {border:0;}#poxupih {position:absolute; z-index:1001; width:689px;  top:0px; left:0px; font-size:11px; color:#3F4543; font-family: "Segoe UI", Arial, Tahoma, sans-serif;}.poxupih_top {width:689px; height:28px; background:transparent url(' + t + "tmpl/images/popup_idea_top.png) 0 0 no-repeat;}.poxupih_bt {width:689px; height:28px; background:transparent url(" + t + "tmpl/images/popup_idea_bt.png) 0 0 no-repeat;}.poxupih_center {width:689px; background:transparent url(" + t + 'tmpl/images/popup_idea_bg.png) 0 0 repeat-y;}.poxupih1 {margin: 0 20px; overflow:hidden; background:#efefef; padding:0px;}.fdsrrel {float:right; margin:-2px 5px 0 0;}.bvnmrte {padding: 15px 20px 20px 12px; _padding-left:1px; font-family: "Segoe UI", Arial, Tahoma, sans-serif; font-size:11px; color:#3F4543; }.poxupih1 .bvnmrte {padding-bottom:10px; padding-top:0px; background:none;}.gertuik {padding:0 8px 0 20px;}#poxupih #hretge {margin:8px 0px; height:96px; background: #fba11f url(' + t + "tmpl/images/search_bg.gif) 0 0px no-repeat; position:relative;}#hretge form {padding: 10px 19px 0 18px;}#poxupih #bulbulh {width:462px; float:left;}#adihet {float:right;background: transparent url(" + t + "tmpl/images/add_idea_go.gif) 0 0px no-repeat; border:none medium; width:132px; height:27px; float:right; margin-right:-3px; cursor:pointer;}#adihet:hover {background-position: 0 -27px;}.drop_right {background: transparent url(" + t + "tmpl/images/q_right1.gif) 0% 0px no-repeat; float:right; display:block; width:8px; height:11px; margin-top:1px; font-size:0;}.drop_left {background: transparent url(" + t + "tmpl/images/q_left1.gif) 0% 0px no-repeat; float:right; display:block; width:8px; height:11px; margin-top:1px;}.status_right {left:15px !important;  text-align:left; float:right; margin:0 -15px 0 0;}#poxupih  a {position:relative; z-index:10;}#poxupih .idea_green_top {height:1%;}.poxupih_top {_background-image:none; _filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + t + "tmpl/images/popup_idea_top.png');}.poxupih_bt {_background-image:none; _filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + t + "tmpl/images/popup_idea_bt.png');}.poxupih_center {_background-image:none; _filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + t + "tmpl/images/popup_idea_bg.png',sizingmethod='scale');}a.pokusijy {display:block; width:16px; height:16px; background: transparent url(" + t + 'tmpl/images/cancel.gif) 100% 0px no-repeat; float:right; position:relative; z-index:101;}a.pokusijy:hover {background-position: 100% 100%; cursor:pointer;}.i_prop {font-size:18px; color:#fff; padding: 0 0 5px 0;}#bulbulh {width:600px; padding: 2px 4px; color:#3F4543; font-family: "Segoe UI", Arial; font-size:16px; margin-bottom:5px;}#hdsfjfsr {background: transparent url(' + t + "tmpl/images/search_go.gif) 0 0px no-repeat; border:none medium; width:97px; height:27px; float:right; margin-right:-3px; cursor:pointer;}#hdsfjfsr:hover {background-position: 0 -27px;}#poxupih .fdsrrel a {z-index:0;}"].join(""), n = document.createElement("style");
                n.type = "text/css", n.rel = "stylesheet";
                try {
                    n.appendChild(document.createTextNode(e))
                } catch (i) {
                    for (var r = document.createStyleSheet(), o = e.split(/\s*[{}]\s*/), a = 0, s = o.length; s > a; a += 2)r.addRule(o[a], o[a + 1])
                }
                document.getElementsByTagName("head")[0].appendChild(n)
            }, mo_showframe: function () {
                this.mo_showcss();
                var e = document.createElement("div");
                e.className = "furjbqy", e.innerHTML = '<a href="javascript:MyOtziv.mo_show_box();"><img src="' + t + 'tmpl/images/transp.gif" width="22" height="151" alt="" style="border: 0;" class="tdsfh" /></a>', document.body.appendChild(e), popupEl = document.createElement("div"), popupEl.id = "myotziv_box", popupEl.style.cssText = "position:absolute; display: none; top: 0px; left: 0px;", popupEl.innerHTML = ['<div class="widsnjx">', '<div id="poxupih">', '<div class="poxupih_top"></div>', '<div class="poxupih_center">', '<div class="poxupih1">', '<div class="gertuik"><a class="pokusijy" title="\u0437\u0430\u043a\u0440\u044b\u0442\u044c" onClick="MyOtziv.mo_hide_box();"></a>', '<div class="fdsrrel"><a href="http://reformal.ru" target="_blank"><img src="' + t + 'tmpl/images/widget_logo.jpg" width="109" height="23" alt="" border="0" /></a></div>', n, "</div>", '<div id="hretge"><form target="_blank" action="http://' + n.toLowerCase() + '.reformal.ru/proj/" method="get"><input type="hidden" name="charset" value="utf-8" /><fieldset><div class="i_prop">\u042f \u043f\u0440\u0435\u0434\u043b\u0430\u0433\u0430\u044e \u0432\u0430\u043c...</div><input id="bulbulh" name="idea" type="text" /><input type="submit" value="" id="adihet" /></fieldset></form></div>', '<div class="bvnmrte" style="height: 250px;" id="fthere"></div>', "</div>", "</div>", '<div class="poxupih_bt"></div>', "</div>"].join(""), document.body.appendChild(popupEl)
            }
        };
        i.mo_showframe()
    }
}(this), function () {
    function e() {
        var e = document.location.search;
        return {
            source: (e.match(/[?&]utm_source=([^&$]*)/) || [])[1],
            medium: (e.match(/[?&]utm_medium=([^&$]*)/) || [])[1],
            userId: (e.match(/[?&]utm_user_id=([^&$]*)/) || [])[1]
        }
    }

    var t = e();
    if ("shopogoliq" === t.source && "cpl" === t.medium && "undefined" != typeof t.userId) {
        var n = new Date;
        n.setMonth(n.getMonth() + 1);
        var i = n.toGMTString();
        document.cookie = "shopogoliq=" + t.userId + ";expires=" + i + ";"
    }
}(), function () {
    function e() {
        var e = document.location.search;
        return {
            source: (e.match(/[?&]source=([^&$]*)/) || [])[1],
            apclick: (e.match(/[?&]apclick=([^&$]*)/) || [])[1],
            apsource: (e.match(/[?&]apsource=([^&$]*)/) || [])[1]
        }
    }

    var t = e();
    if ("actionpay" === t.source && t.apclick) {
        var n = new Date;
        n.setMonth(n.getMonth() + 1);
        var i = n.toGMTString();
        document.cookie = "actionpay=" + t.apclick + ";expires=" + i + ";", document.cookie = "apsource=" + t.apsource + ";expires=" + i + ";"
    }
}(), $(document).ready(function () {
    $(".forgot-password-form").validate({
        rules: {
            "user[email]": {
                required: !0,
                email: !0
            }
        }
    }), $(".signin-form").validate({
        rules: {
            "user[universal_login]": {required: !0},
            "user[email]": {required: !0, email: !0}
        }
    })
}), String.prototype.loadThen = function (e) {
    var t = new Image;
    t.onload = function () {
        t = null, e()
    }, t.src = this
}, String.prototype.format = function (e) {
    return this.replace(/#\{([^}]*)\}/g, function (t, n) {
        var i = e[n];
        return "string" == typeof i || "number" == typeof i ? i : t
    })
}, String.prototype.withoutURLHash = function () {
    return this.replace(/\?\d*$/, "")
}, String.prototype.sopifyUrl = function () {
    return this.replace(/^http:\/\/[^\/]*/, "")
}, String.prototype.underscore = function () {
    return this.replace(/([a-z\d])([A-Z]+)/g, "$1_$2").replace(/[-\s]+/g, "_").toLowerCase()
}, String.prototype.dasherize = function () {
    return this.underscore().replace(/_/g, "-")
}, String.prototype.capitalize = function () {
    return this.charAt(0).toUpperCase() + this.slice(1)
}, Array.prototype.loadAllThen = function (e) {
    for (var t = this.length, n = 0, i = 0; t > i; i++)this[i].loadThen(function () {
        n++, n === t && e()
    })
}, jQuery.fn.extend({
    showAltText: function () {
        var e = $(this), t = e.attr("data-alt-text");
        return e.attr("data-alt-text", e.text()).html(t), this
    }
}), function (e) {
    var t = e(".product-categories-popup > .product-img").get(0);
    e(".product-categories-popup ul li a").mouseenter(function () {
        var e = this.getAttribute("data-image");
        e && (t.src = e)
    })
}(jQuery), function (e) {
    function t(t) {
        var n = e(t);
        if (!n.hasClass("active")) {
            n.parents(".promotion").find(".promo-img")[0].src = t.getAttribute("data-product-img"), n.addClass("active");
            var i = t.innerHTML;
            t.innerHTML = t.getAttribute("data-alt-value"), t.setAttribute("data-alt-value", i)
        }
    }

    function n(t) {
        var n = e(t);
        if (n.hasClass("active")) {
            n.removeClass("active");
            var i = t.innerHTML;
            t.innerHTML = t.getAttribute("data-alt-value"), t.setAttribute("data-alt-value", i)
        }
    }

    e(".promotion").each(function () {
        var i = e(this).find(".promo-links li a");
        i.on("mouseenter mouseleave", function () {
            this.getAttribute("data-no-hover") || (i.each(function (e, t) {
                n(t)
            }), t(this))
        })
    })
}(jQuery), window.__initPlaceholders = function () {
    var e = "undefined" != typeof document.createElement("input").placeholder;
    e && $("input[placeholder]").each(function (e, t) {
        $('label[for="' + t.id + '"]').remove()
    })
}, jQuery(__initPlaceholders), function (e) {
    function t(t) {
        n.removeClass("active"), n.find("> img").each(function (t, n) {
            n.src = e(n).data("inactive")
        }), n.eq(t).addClass("active");
        var a = t * -s, l = parseInt(r.css("left"), 10) || 0, u = l > a ? -1 : 1;
        if (a === l)return !1;
        var c = i[t + u], d = e(i[t]).find(".promo-img");
        d.attr("src", d.attr("data-src")), 0 === o ? r.css({left: a}) : r.animate({left: a}, {duration: 250}), e(c).animate({opacity: 0}, {
            duration: 250,
            complete: function () {
                e(this).css({opacity: 1})
            }
        })
    }

    var n = e(".promo-nav-items > li a"), i = e(".promotions-list > .promotion"), r = e(e(".promotions-list")[0]), o = 0, a = e(".promo-nav-items").width(), s = 745 === a ? 745 : 300 === a ? 320 : 1100, l = {
        clothing: 0,
        iphone: 1,
        bags: 2,
        bizcards: 3,
        home: 4
    };
    n.on("click", function (i) {
        var r = e.trim(e(this).find(".promo-nav-image")[0].className.replace("promo-nav-image", ""));
        document.location.hash = r;
        var o = n.index(i.currentTarget);
        return t(o), "undefined" != typeof _gaq && _gaq.push(["_trackEvent", "Navigation", "Switch promo section"]), !1
    }), window.onpopstate = function () {
        if (document.location.hash) {
            var e = l[document.location.hash.replace("#", "")];
            "undefined" != typeof e && t(e)
        } else t(0);
        o++
    }, e(window).on("load", function () {
        0 === o && window.onpopstate()
    })
}(jQuery), function (e) {
    function t(t) {
        var n = t.next(".thumb");
        if (n.length || (n = t.parent().find(".thumb").first()), n.length) {
            t.addClass("hidden");
            var i = n.find(".wrapper img");
            i.each(function (t, n) {
                var i = e(n).attr("data-src");
                i && e(n).attr("src", i).removeAttr("data-src")
            }), n.removeClass("hidden")
        }
    }

    function n(t) {
        var n = t.prev(".thumb");
        if (n.length || (n = t.parent().find(".thumb").last()), n.length) {
            t.addClass("hidden");
            var i = n.find(".wrapper img");
            i.each(function (t, n) {
                var i = e(n).attr("data-src");
                i && e(n).attr("src", i).removeAttr("data-src")
            }), n.removeClass("hidden")
        }
    }

    e(document).on("click", ".prev-switch, .next-switch", function () {
        var i = e(this).parent()[0];
        if (i) {
            var r = e(i).find(".thumb"), o = r.filter(":visible");
            return e(this).hasClass("next-switch") ? t(o) : e(this).hasClass("prev-switch") && n(o), !1
        }
    })
}(jQuery), function (e) {
    function t() {
        var t = e(this), n = e('[name="' + this.name + '"][data-expand-section]'), i = e(this).siblings(t.data("expand-section"));
        n.each(function (t, n) {
            e(n).siblings(e(n).data("expand-section")).hide()
        }), i.show()
    }

    e("[data-expand-section]").on("click", t);
    var n = e("[data-expand-section]:checked")[0];
    n && t.call(n)
}(jQuery), function (e) {
    function t() {
        e(".modal-shim, .modal-popup").fadeOut(100), e("html").removeClass("modal-popup-mode")
    }

    window.printio = window.printio || {};
    var n = e('<div class="modal-popup"></div>').hide().appendTo("body");
    e(document).on("click", ".close-trigger", function () {
        return t(), !1
    }), e(document).on("click", ".modal-popup .close", function (n) {
        return e(n.currentTarget).parents(".modal-popup").fadeOut(100), t(), !1
    }), e(document).on("keydown", function (e) {
        27 === e.keyCode && t()
    }), e(document).on("click", ".modal-shim", function () {
        t()
    }), e(document).on("click", ".product-closeup.modal-popup", function (n) {
        e(n.target).parents(".body")[0] || (e(n.currentTarget).fadeOut(100), t())
    }), printio.modalPopupShow = function (t, i) {
        e(".modal-shim").fadeIn(100);
        var r = e(i || e(t).data("modal-popup")), o = r.html(), a = r.attr("class");
        return n.attr("class", "modal-popup").addClass(a).html(o).fadeIn(100), e("html").addClass("modal-popup-mode"), "undefined" != typeof _gaq && (e(t).hasClass("phone") ? _gaq.push(["_trackEvent", "Navigation", "Phone Popup"]) : e(t).hasClass("quality-guarantee") && _gaq.push(["_trackEvent", "Navigation", "Quality Guarantee Popup"])), !1
    }, e(document).on("click", "[data-modal-popup]", function (e) {
        return printio.modalPopupShow(e.currentTarget), !1
    })
}(jQuery), function (e) {
    function t() {
        "undefined" != typeof _gaq && _gaq.push(["_trackEvent", "Navigation", "Quick Buy Popup"]);
        var t = e(".modal-popup.product-closeup .content"), n = e(this).closest("li").find(".item-thumb").attr("href"), i = e("body > .spinner").clone().show();
        return t.html('<div class="spinner-wrapper">' + i[0].outerHTML + "<h3>\u0417\u0430\u0433\u0440\u0443\u0436\u0430\u0435\u0442\u0441\u044f...</h3></div>"), e.ajax(n).then(function (i) {
            t.html(i), window.__bootstrapSelectableOptions && window.__bootstrapSelectableOptions(), t.find(".thumbnails .product-thumb:eq(0)").addClass("active"), t.find("fb\\:like").attr("data-href", n), t.find(".twitter-share-button").attr("data-url", n), window.__vkPageUrl = n, window.__initZoomForVisibleView && __initZoomForVisibleView(), window.__loadWidgetDependencies && __loadWidgetDependencies(!0), window.__initRating && __initRating(), window.__initVK && __initVK(), "undefined" != typeof FB && FB.XFBML && FB.XFBML.parse && FB.XFBML.parse(e(".modal-popup .social-links")[0]), t.find(".tags-wrapper").remove(), e("div").is(".design-clones .slick-initialized") || e(".design-clones").slick({
                slidesToShow: 4,
                slidesToScroll: 1
            });
            var r = t.find("#new_line_item");
            r.on("submit", function () {
                return trackAddToCart(this), r.find("input[type=submit]").prop("disabled", !0), e.ajax({
                    url: r.prop("action"),
                    type: r.prop("method"),
                    data: r.serialize()
                }).done(function (n) {
                    e(".cart-popup").replaceWith(n), e(".cart > .amount").html(e(".cart-popup .price").html());
                    var i = t.closest(".product-closeup .body");
                    i.css({overflow: "hidden"}).find(".content").css({opacity: 0}), i.animate({
                        minWidth: "500px",
                        minHeight: "75px",
                        width: "300px",
                        height: "75px",
                        marginLeft: "-250px"
                    }, {
                        duration: 300, easing: "easeInOutExpo", complete: function () {
                            e(this).find(".content").html('<h1 style="margin-top: 27px; text-align: center">\u041f\u0440\u0435\u0434\u043c\u0435\u0442 \u0434\u043e\u0431\u0430\u0432\u043b\u0435\u043d \u0432 \u0437\u0430\u043a\u0430\u0437</h1>').css("opacity", 1)
                        }
                    })
                }).fail(function () {
                    console.log("failed to add to cart", arguments)
                }).always(function () {
                    r.find("input[type=submit]").prop("disabled", !1)
                }), !1
            })
        }), !1
    }

    e(document).on("click", ".quick-buy", t), e(document).on("click", ".modal-popup .item-thumb", t)
}(jQuery);
var printio = printio || {};
printio.SelectedOptions = function (e) {
    this.$productContainer = e, this._selectedValues = {}, this._setSelectedValues()
}, _.extend(printio.SelectedOptions.prototype, {
    defaultValues: {
        color: "",
        paperType: "",
        lamination: "none",
        cornerRadius: 0,
        frameType: "",
        cakeCorner: "",
        cakeFrame: "",
        sprinkled: "",
        notepadCover: "",
        notebookCover: ""
    },
    namesMap: {
        size: "size",
        color: "color",
        paperType: "paper_type",
        lamination: "lamination",
        cornerRadius: "corner_radius",
        frameType: "frame_type",
        cakeCorner: "cake_corner",
        cakeFrame: "cake_frame",
        sprinkled: "sprinkled",
        notepadCover: "notepad_cover",
        notebookCover: "notebook_cover"
    },
    _getActiveOption: function (e) {
        var t = this.$productContainer.find('[data-options-list="' + e + '"] a.active').data(e.replace("_", "-"));
        if ("none" !== t)return t
    },
    _setSelectedValues: function () {
        for (var e in this.defaultValues)this._selectedValues[e] = this._getActiveOption(this.namesMap[e])
    },
    _buildQuery: function (e, t, n) {
        var i = e, r = $.extend({}, this.defaultValues, this._selectedValues);
        for (var o in r) {
            var a = n.replace("{{key}}", this.namesMap[o]).replace("{{val}}", r[o]), s = new RegExp(t.replace("{{key}}", this.namesMap[o]));
            i = i.replace(s, a)
        }
        return i
    },
    _toQueryString: function (e) {
        this._setSelectedValues();
        var t = [];
        e = e || "{{key}}";
        for (var n in this._selectedValues) {
            var i = this._selectedValues[n], r = e.replace("{{key}}", this.namesMap[n]);
            i && t.push(r + "=" + i)
        }
        return t.join("&")
    },
    getSelectedValues: function () {
        return this._selectedValues
    },
    getNewProductUrl: function (e) {
        var t = "?" + this._toQueryString().replace("color=", "default_color=");
        return -1 === e.indexOf("?") ? e + t : e.replace(/\?.*/, t)
    },
    getBlankItemImgUrl: function (e, t, n) {
        var i = this._toQueryString("variant[{{key}}]");
        return "/background_urls/" + e + ".json?style=" + t + (n ? "&side=" + n : "") + (i ? "&" + i : "")
    },
    getCloseupQueryString: function () {
        return document.location.search ? this._buildQuery(document.location.search.replace(/^\?/, ""), "{{key}}%3A([^%$]*)", "{{key}}%3A{{val}}") : "present[side]=front_model_photo&present[variant]=" + this._buildQuery($("#line_item_variant").val(), "{{key}}:([^|$]*)", "{{key}}:{{val}}")
    },
    getVariantValue: function () {
        var e = $("#line_item_variant").val(), t = $.extend({size: this._getActiveOption("size")}, this._selectedValues);
        if (e) {
            for (var n in t) {
                var i = t[n];
                i && (e = e.replace(new RegExp(this.namesMap[n] + ":([^|$]*)"), this.namesMap[n] + ":" + i))
            }
            return e
        }
    }
}), function (e) {
    function t() {
        if (0 !== e(".product-options").size()) {
            var t = 0 !== e(".product-category-items").size();
            e(".product-container:visible").each(function (r, o) {
                var a = new n({stockData: e("#product-stock-data").val(), variant: e("#line_item_variant").val()});
                window.__productModel = a, window.__productView && window.__productView.$el.is(".modal-popup") && window.__productView.undelegateEvents();
                var s = new i({el: o, model: a, skipInitialRender: t});
                window.__productView = s
            })
        }
    }

    _.templateSettings.interpolate = /\#\{(.+?)\}/g;
    var n = Backbone.Model.extend({
        defaults: {
            gender: "",
            color: "",
            size: void 0,
            frameType: "",
            paperType: "",
            lamination: "none",
            cornerRadius: "0",
            sprinkled: "none",
            cakeFrame: "none",
            cakeCorner: "none",
            calendarPaper: "regular",
            notepadCover: "none",
            notebookCover: "none",
            pillowCase: "sew",
            stockData: []
        }, initialize: function (e) {
            var t = e.variant, n = e.stockData;
            for (var i in this.defaults)"stockData" === i ? this.set("stockData", n ? this.getParsedStockData(n) : []) : this.set(i, t ? (t.match(i.underscore() + ":([^|]*)") || {})[1] : "")
        }, isValidSelection: function () {
            var e = this.get("color"), t = this.get("size"), n = this.get("stockData"), i = "" !== t || void 0 === t;
            return "number" == typeof n && 1 > n ? !1 : (_.forEach(n, function (n) {
                n.color === e && n.size === t && n.quantity <= 0 && (i = !1, this.set("invalidSize", n.size))
            }, this), i)
        }, getMissingSizesForSelectedColor: function () {
            var e = this.get("color"), t = [];
            return _.forEach(this.get("stockData"), function (n) {
                n.color === e && n.quantity <= 0 && t.push(n.size)
            }), t
        }, getParsedStockData: function (e) {
            var t = JSON.parse(e);
            return "number" == typeof t ? t : _.map(t, function (e) {
                return {color: e[0].color, size: e[0].size, quantity: e[1]}
            })
        }
    }), i = Backbone.View.extend({
        variantTemplate: function () {
            var e = "";
            for (var t in n.prototype.defaults)"stockData" !== t && (e += "#{" + t + ' ? ("' + t.underscore() + ':" + ' + t + ' + "|") : ""}');
            return _.template(e)
        }(),
        backgroundUrlTemplate: function () {
            var e = "/background_urls/#{productType}.json?style=#{style}&side=#{side}";
            for (var t in n.prototype.defaults)"stockData" !== t && (e += "#{ " + t + ' ? ("&variant[' + t.underscore() + ']=" + ' + t + ') : "" }');
            return _.template(e)
        }(),
        ui: {
            $options: ".product-option-cells:not(.static) > li > a",
            $color: ".product-colors li a",
            $size: ".product-sizes li a",
            $paperType: ".paper_type-vocabulary li a",
            $lamination: ".lamination-vocabulary li a",
            $cornerRadius: ".corner_radius-vocabulary li a",
            $frameType: ".frame_type-vocabulary li a",
            $pillowCase: ".pillow_case-vocabulary li a",
            $sprinkled: ".sprinkled-vocabulary li a",
            $cakeFrame: ".cake_frame-vocabulary li a",
            $cakeCorner: ".cake_corner-vocabulary li a",
            $calendarPaper: ".calendar_paper-vocabulary li a",
            $notepadCover: ".notepad_cover-vocabulary li a",
            $notebookCover: ".notebook_cover-vocabulary li a",
            $variant: "#line_item_variant",
            $permalinkEl: "#product-permalink-link",
            $permalinkField: "#permalink-field",
            $buyButton: ".btn-add-to-cart",
            $buyButtonWrapper: ".btn-add-to-cart-wrapper",
            $productUrl: ".product-url"
        },
        events: {
            "click $color": "onColorClicked",
            "touchstart $color": "onColorClicked",
            "click $size": "onSizeClicked",
            "touchstart $size": "onSizeClicked",
            "click $paperType": "onPaperTypeClicked",
            "click $lamination": "onLaminationClicked",
            "click $cornerRadius": "onCornerRadiusClicked",
            "click $pillowCase": "onPillowCaseClicked",
            "click $frameType": "onFrameTypeClicked",
            "click $sprinkled": "onSprinkledClicked",
            "click $cakeFrame": "onCakeFrameClicked",
            "click $cakeCorner": "onCakeCornerClicked",
            "click $calendarPaper": "onCalendarPaperClicked",
            "click $notepadCover": "onNotepadCoverClicked",
            "click $notebookCover": "onNotebookCoverClicked"
        },
        initialize: function (e) {
            e || (e = {}), this.listenTo(this.model, "change", this.render), this.listenTo(this.model, "change", this.setVariant), this.listenTo(this.model, "change", this.triggerVariantChange), this.listenTo(this.model, "change", this.setProductUrls), e.skipInitialRender || this.render(), _.delay(_.bind(this.render, this), 2e3), this.initTooltips()
        },
        initTooltips: function () {
            this.ui.$options.tooltip()
        },
        onColorClicked: function (t) {
            return this.model.set("color", e(t.currentTarget).data("color")), !1
        },
        onSizeClicked: function (t) {
            return e(t.currentTarget).hasClass("disabled") || this.model.set("size", e(t.currentTarget).data("size")), !1
        },
        onPaperTypeClicked: function (t) {
            return this.model.set("paperType", e(t.currentTarget).data("paper-type")), !1
        },
        onLaminationClicked: function (t) {
            return this.model.set("lamination", e(t.currentTarget).data("lamination")), !1
        },
        onPillowCaseClicked: function (t) {
            return this.model.set("pillowCase", e(t.currentTarget).data("pillow-case")), !1
        },
        onCornerRadiusClicked: function (t) {
            return this.model.set("cornerRadius", e(t.currentTarget).data("corner-radius")), !1
        },
        onFrameTypeClicked: function (t) {
            return this.model.set("frameType", e(t.currentTarget).data("frame-type")), !1
        },
        onSprinkledClicked: function (t) {
            return this.model.set("sprinkled", e(t.currentTarget).data("sprinkled")), !1
        },
        onCakeFrameClicked: function (t) {
            return this.model.set("cakeFrame", e(t.currentTarget).data("cake-frame")), !1
        },
        onCakeCornerClicked: function (t) {
            return this.model.set("cakeCorner", e(t.currentTarget).data("cake-corner")), !1
        },
        onCalendarPaperClicked: function (t) {
            return this.model.set("calendarPaper", e(t.currentTarget).data("calendar-paper")), !1
        },
        onNotepadCoverClicked: function (t) {
            return this.model.set("notepadCover", e(t.currentTarget).data("notepad-cover")), !1
        },
        onNotebookCoverClicked: function (t) {
            return this.model.set("notebookCover", e(t.currentTarget).data("notebook-cover")), !1
        },
        triggerVariantChange: function () {
            0 === this.$el.find(".layered").length && e(document).trigger("variant:change", _.extend(this.model.toJSON(), {productUrl: this.ui.$productUrl.val()}))
        },
        setProductUrls: function () {
            var e = this.model.get("color"), t = this.$el.find(".product-img-wrapper, .product-link");
            t.attr("href") && t.attr("href", _.bind(function (t, n) {
                if (e)return -1 === n.indexOf("default_color=") ? n += "?default_color=" + e : n.replace(/default_color=[\w\-]+/, "default_color=" + e);
                var i = "?paper_type=" + this.model.get("paperType") + "&frame_type=" + this.model.get("frameType") + "&lamination=" + this.model.get("lamination") + "&pillow_case=" + this.model.get("pillowCase") + "&corner_radius=" + this.model.get("cornerRadius") + "&notepad_cover=" + this.model.get("notepadCover") + "&notebook_cover=" + this.model.get("notebookCover") + "&calendar_paper=" + this.model.get("calendarPaper");
                return -1 === n.indexOf("paper_type=") ? n + i : n.replace(/\?.*/, i)
            }, this))
        },
        render: function () {
            this._renderBuyButton(), this._renderOptionsAccordingToStockData(), this._renderOptionsActive(), this._renderImages()
        },
        _renderImages: function () {
            var t = this.$el.find(".product-img-wrapper"), n = t.find(".bg-image");
            "undefined" != typeof JSON && JSON.parse && n.length && (t.each(function (t, n) {
                var i = e("body > .spinner").clone().show();
                e(n).append(i)
            }), _.each(n, this._renderImage, this))
        },
        _renderImage: function (t) {
            var n = e(t).closest("[data-style]").data("style") || "teaser", i = e(t).nextUntil(".product-meta").next().val(), r = (t.className.match(/side-(\w+)/) || {})[1];
            if (i) {
                var o = JSON.parse(i).product, a = this.backgroundUrlTemplate(_.extend(this.model.toJSON(), {
                    productType: o,
                    style: n,
                    side: r
                }));
                e.get(a, function (n) {
                    var i = _.find(_.keys(n), function (e) {
                        return e.indexOf("blank_") > -1
                    }), r = n[i] || n.background;
                    r.loadThen(function () {
                        e(t).prop("src", r), e(t).closest(".product-img-wrapper").find(".spinner").remove()
                    }), n.overlay && e(t).nextAll(".overlay").prop("src", n.overlay)
                })
            }
        },
        _renderBuyButton: function () {
            this.model.isValidSelection() ? (this.ui.$buyButton.prop("disabled", !1), this.ui.$buyButtonWrapper.removeAttr("data-original-title")) : (this.ui.$buyButton.prop("disabled", !0), this.ui.$buyButtonWrapper.attr("data-original-title", "\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0432\u044b\u0431\u0435\u0440\u0438\u0442\u0435 \u0440\u0430\u0437\u043c\u0435\u0440"), this.$el.tooltip({selector: ".btn-add-to-cart-wrapper"}))
        },
        _renderOptionsAccordingToStockData: function () {
            this.ui.$size.removeClass("disabled"), this.ui.$size.each(function (t, n) {
                e(n).attr("data-original-title", e(n).data("size"))
            }), _.forEach(this.model.getMissingSizesForSelectedColor(), function (e) {
                var t = this.ui.$size.filter("[data-size=" + e + "]");
                t.addClass("disabled").attr("data-original-title", "\u041d\u0435\u0442 \u0432 \u043d\u0430\u043b\u0438\u0447\u0438\u0438")
            }, this), this._renderNotepadCoverAccordingToStockData()
        },
        _renderNotepadCoverAccordingToStockData: function () {
            this.ui.$notepadCover.each(function (t, n) {
                e(n).attr("data-original-title", e(n).data("notepad-cover"))
            });
            var t = this.model.get("stockData");
            "number" == typeof t && 1 > t && this.ui.$notepadCover.addClass("disabled").attr("data-original-title", "\u041d\u0435\u0442 \u0432 \u043d\u0430\u043b\u0438\u0447\u0438\u0438")
        },
        _renderNotebookCoverAccordingToStockData: function () {
            this.ui.$notebookCover.each(function (t, n) {
                e(n).attr("data-original-title", e(n).data("notebook-cover"))
            });
            var t = this.model.get("stockData");
            "number" == typeof t && 1 > t && this.ui.$notebookCover.addClass("disabled").attr("data-original-title", "\u041d\u0435\u0442 \u0432 \u043d\u0430\u043b\u0438\u0447\u0438\u0438")
        },
        _renderOptionsActive: function () {
            function e(e) {
                return e.trim().replace(/([A-Z])/g, "-$1").replace(/[-_\s]+/g, "-").toLowerCase()
            }

            _.forEach(this.model.defaults, function (t, n) {
                if (this.ui["$" + n]) {
                    var i = this.ui["$" + n].filter("[data-" + e(n) + "=" + this.model.get(n) + "]");
                    this.ui["$" + n].removeClass("active"), i.addClass("active")
                }
            }, this)
        },
        setVariant: function () {
            var e = this.variantTemplate(this.model.toJSON()).replace(/(^\||\|$)/g, "");
            this.ui.$variant.val(e), this.setVariantInPermalink(e)
        },
        setVariantInPermalink: function (e) {
            var t = decodeURIComponent(this.ui.$permalinkField.val()), n = t.indexOf("present[variant]") > -1 ? t.replace(/(present\[variant\]=)([^&$]+)/, "$1" + e) : t + "?present[variant]=" + e;
            this.ui.$permalinkEl.attr("href", n), this.ui.$permalinkField.val(n)
        }
    });
    window.__bootstrapSelectableOptions = t, t(), window.__ProductModel = n
}(jQuery), function (e) {
    e(document).on("click", ".tab-bar > *", function () {
        var t = e(this).closest(".tab-bar"), n = t.find("> *"), i = n.index(this);
        return n.removeClass("active"), e(this).addClass("active"), e(t.data("tab-panels") + " > li").hide(), e(t.data("tab-panels") + " > li:eq(" + i + ")").show(), !1
    })
}(jQuery), function (e) {
    e(".coupon-trigger").on("click", function () {
        var t = e(this).nextAll(".coupon-field");
        return t.toggle(), t.is(":visible") && t.focus(), !1
    })
}(jQuery), function (e) {
    var t, n = {
        POLL_INTERVAL: 4e3,
        POLL_URL: "/product_renders.json?ids=#{ids}&style=#{style}&present[variant]=#{variant}",
        init: function () {
            var e = this;
            this.pollInterval = setInterval(function () {
                e.onPoll()
            }, this.POLL_INTERVAL), this.onPoll(), t = new Date
        },
        onPoll: function () {
            var t = this.getRasterizingProductsData(), n = this.getLargeRasterizingProductIds();
            e.isEmptyObject(t) || this.requestDesigns(t), n.length > 0 && this.requestDesigns({large: n}), e.isEmptyObject(t) && 0 === n.length && clearInterval(this.pollInterval)
        },
        getUrlsForDesigns: function (t) {
            var n = [];
            for (var i in t) {
                var r = this.POLL_URL.format({
                    style: i,
                    ids: t[i].join(","),
                    variant: e("#line_item_variant").val() || ""
                });
                n.push([r, i])
            }
            return n
        },
        requestDesigns: function (t) {
            var n = this.getUrlsForDesigns(t), i = this;
            e.each(n, function (t, n) {
                e.ajax(n[0]).done(function (e) {
                    i.onDesignsReceived(e, n[1])
                })
            })
        },
        onDesignsReceived: function (t, n) {
            var i = this;
            for (var r in t) {
                var o = t[r];
                e.each(o, function (e, t) {
                    if (t) {
                        "large" === n && 100 === o.progress && "string" == typeof t && i.trackRasterizationTime();
                        try {
                            i.loadDesignImage(r, e, t, n)
                        } catch (a) {
                        }
                    }
                })
            }
        },
        trackRasterizationTime: function () {
            var e = new Date - t;
            "undefined" != typeof _gaq && _gaq.push(["_trackEvent", "Rasterization category", "Rasterization action", "Rasterization label", e, !0])
        },
        loadDesignImage: function (t, n, i, r) {
            var o;
            if ("large" === r)o = e(".product-#{id}-#{side}".format({
                id: t,
                side: n
            })), o.length && i.loadThen(function () {
                var t = o.find(".image-placeholder-front, .image-placeholder-back, .image-placeholder, .design-img");
                t.attr("src", i).animate({opacity: 1}), o.removeClass("rasterizing-view").find(".rasterizing-message").remove();
                var n = o.parents(".modal-popup").length > 0;
                n || (o.find("[data-large-url]").attr("data-large-url", i.replace("/large/", "/detailed/")).addClass("zoomable"), e(document).trigger("design:visibility:changed"))
            }); else {
                o = e("#product-#{id}, #product-#{id}-#{side}".format({id: t, side: n}));
                var a = o.find('.rasterizing-thumb[data-side="' + n + '"]');
                this.replaceRasterizingMessageWithImage(a, i), a.removeClass("rasterizing-thumb").attr("data-large-url", i.replace("/" + r + "/", "/large/"))
            }
        },
        replaceRasterizingMessageWithImage: function (e, t) {
            var n = e.find(".wrapper > .image-placeholder, .wrapper > .image-placeholder-small"), i = e.find(".rasterizing-message-small, .rasterizing-message");
            i.animate({opacity: "0"}, function () {
                i.remove(), n.attr("data-src") ? n.attr("data-src", t) : n.prop("src", t), n.show()
            })
        },
        getRasterizingProductsData: function () {
            var t = {};
            return e(".product-thumb").each(e.proxy(function (n, i) {
                this.setProductId(i);
                var r = e(i).find(".rasterizing-thumb");
                if (r.length) {
                    var o = this.getProductStyle(i), a = this.getProductId(i);
                    t[o] || (t[o] = []), t[o].push(a)
                }
            }, this)), t
        },
        getLargeRasterizingProductIds: function () {
            return e.map(e(".rasterizing-view .product-id"), function (e) {
                return e.value
            })
        },
        getProductId: function (t) {
            return e(t).find(".product-id").val()
        },
        getProductStyle: function (t) {
            return e(t).find("[data-style]").attr("data-style")
        },
        setProductId: function (t) {
            t.id = e(t).hasClass("closeup-thumb") ? "product-" + this.getProductId(t) + "-" + e(t).find("[data-side]").attr("data-side") : "product-" + this.getProductId(t)
        }
    };
    0 === e("#product-meta").length && n.init()
}(jQuery), $(function () {
    if ("undefined" != typeof _ && $("#settlement-suggestions")[0] && ($("body").hasClass("checkout-show-page") || $("body").hasClass("orders-update-page") || $("body").hasClass("pages-show-delivery-payment-page"))) {
        $.ajaxSetup({timeout: 2e4});
        var e = window.DeliveryView = {
            priceAbbr: '<abbr class="currency" title="RUB">\u0420</abbr>',
            deliveryOptionTemplate: _.template('<li class="<%= type %>" data-type="<%= type %>" data-price="<%= price %>" style="display: none"><label for="<%= type %>"><%= translatedType %></label><span class="delivery-term"><%= term %></span><span class="price" style="display: inline-block; *display: inline; *zoom: 1"><%= translatedPrice %></span><input id="<%= type %>" name="<%= name %>" type="radio" value="pvz"><div class="info pvz-info expandable-section" style="display: none"><%= info %></div></li>'),
            ui: {$pvzAddresses: $(".pvz-addresses"), $postamatAddresses: $(".postamat-addresses")},
            init: function () {
                this.defaultPrice = parseInt($(".order-price .price").data("original-price"), 10) / 100, this.initCheckoutMode(), this.initSettlementAutocomplete(), this.initSettlementRemoval(), this.initDeliveryChange(), this.initHouseNumberChange(), this.initPvzChange(), this.initPostamatChange(), this.initChooseOnMap(), this.initFormSubmission()
            },
            initFormSubmission: function () {
                var e = this;
                $(".edit_order").on("submit", function () {
                    var t = $(this);
                    $("#mode").prop("disabled", !0);
                    var n = e.getDataForSubmission(t);
                    return e.submitForm(t, n), !1
                })
            },
            submitForm: function (e, t) {
                return "fallback" === this.checkoutMode ? void e.submit() : void $.ajax({
                    url: e.prop("action") + ".json",
                    type: e.prop("method"),
                    data: t
                }).done(function (e, t, n) {
                    window.location = n.getResponseHeader("location")
                }).fail(function (t) {
                    var n = t.responseJSON;
                    n && ($(".error-explanation").remove(), n.order_errors && e.prepend(n.order_errors), n.address_errors && $(".address-form").prepend(n.address_errors))
                })
            },
            getDataForSubmission: function (e) {
                var t, n = e.serializeArray();
                return t = _.escape("pvz" === this.deliveryType ? this.deliveryPvzInfo : "postamat" === this.deliveryType ? this.deliveryPostamatInfo : this.deliveryInfo), n.push({
                    name: "order[delivery][type]",
                    value: this.deliveryType
                }, {name: "order[delivery][cost]", value: this.deliveryPrice}, {
                    name: "order[delivery][min_term]",
                    value: this.deliveryMinTerm
                }, {
                    name: "order[delivery][max_term]",
                    value: this.deliveryMaxTerm
                }, {
                    name: "order[delivery][place_fias_id]",
                    value: this.settlementId
                }, {
                    name: "order[delivery][additional_info]",
                    value: t
                }), this.deliveryId && n.push({
                    name: "order[delivery][delivery_id]",
                    value: this.deliveryId
                }), this.streetId && n.push({
                    name: "order[delivery][street_fias_id]",
                    value: this.streetId
                }), ("pvz" === this.deliveryType || "postamat" === this.deliveryType) && n.push({
                    name: "order[delivery][address_pvz]",
                    value: _.escape("pvz" === this.deliveryType ? this.deliveryPvz : this.deliveryPostamat)
                }), "normal" === this.checkoutMode && n.push({
                    name: $("#order_shipping_address_attributes_region").prop("name"),
                    value: $("#settlement-suggestions").val()
                }), n
            },
            initChooseOnMap: function () {
                var e = this;
                $(".choose-on-map-pvz").on("click", function () {
                    return $(".pvz-map, .modal-shim").show(), "undefined" != typeof _gaq && _gaq.push(["_trackEvent", "Navigation", "Map Popup in checkout (pvz)"]), setTimeout(function () {
                        e.pvzMap.setBounds(e.pvzMap.geoObjects.getBounds(), {checkZoomRange: !1})
                    }, 500), !1
                }), $(".choose-on-map-postamat").on("click", function () {
                    return $(".postamat-map, .modal-shim").show(), "undefined" != typeof _gaq && _gaq.push(["_trackEvent", "Navigation", "Map Popup in checkout (postamat)"]), setTimeout(function () {
                        e.postamatMap.setBounds(e.postamatMap.geoObjects.getBounds(), {checkZoomRange: !0})
                    }, 500), !1
                })
            },
            moscowCoords: [55.757926, 37.563817],
            initPvzMap: function () {
                var e = this;
                return "undefined" != typeof ymaps && ymaps.Map ? (this.pvzMap ? this.pvzMap.geoObjects.each(function (e) {
                    this.pvzMap.geoObjects.remove(e)
                }.bind(this)) : (this.pvzMap = new ymaps.Map("ymaps-map-id_137189502666285622286", {
                    center: this.moscowCoords,
                    zoom: 11,
                    type: "yandex#map"
                }), this.pvzMap.controls.add("zoomControl")), void this.addMarkersOnMap("pvz")) : void setTimeout(function () {
                    e.initPvzMap()
                }, 1e3)
            },
            initPostamatMap: function () {
                var e = this;
                return "undefined" != typeof ymaps && ymaps.Map ? (this.postamatMap ? this.postamatMap.geoObjects.each(function (e) {
                    this.postamatMap.geoObjects.remove(e)
                }.bind(this)) : (this.postamatMap = new ymaps.Map("ymaps-map-id_13956833336504913190", {
                    center: this.moscowCoords,
                    zoom: 11,
                    type: "yandex#map"
                }), this.postamatMap.controls.add("zoomControl")), void this.addMarkersOnMap("postamat")) : void setTimeout(function () {
                    e.initPostamatMap()
                }, 1e3)
            },
            addMarkersOnMap: function (e) {
                var t = this["pvz" === e ? "pvzData" : "postamatData"].addresses;
                _.each(t, function (t, n) {
                    this.addMarkerOnMap(t, n, e)
                }, this)
            },
            getCurrentSettlement: function () {
                return $("#settlement-suggestions").val() || $("#current-location").val()
            },
            getCurrentSettlementNormalized: function () {
                return this.getCurrentSettlement().replace("\u0433. ", "")
            },
            addMarkerOnMap: function (e, t, n) {
                var i = "pvz" === n ? "pvzMap" : "postamatMap", r = this["pvz" === n ? "pvzData" : "postamatData"], o = "pvz" === n ? "\u041f\u0412\u0417" : "\u041f\u043e\u0441\u0442\u0430\u043c\u0430\u0442", a = this, s = [parseFloat(r.latitudes[t]), parseFloat(r.longitudes[t])], l = this.getCurrentSettlement(), u = "http://geocode-maps.yandex.ru/1.x/?format=json&geocode=" + encodeURIComponent(e + ", " + l) + "&lang=en-US";
                $.getJSON(u).always(function (n) {
                    try {
                        s = n.response.GeoObjectCollection.featureMember[0].GeoObject.Point.pos.split(" "), s = [parseFloat(s[1]), parseFloat(s[0])]
                    } catch (l) {
                    }
                    var u = new ymaps.Placemark(s, {
                        iconContent: t + 1,
                        balloonContentHeader: '<div class="ymapsBalloonContentHeader">' + (t + 1) + ". <b>" + o + " " + r.codes[t] + "</b></div>",
                        balloonContentBody: '<p class="ymapsBalloonContentBody">' + e + "</p>"
                    }, {preset: "twirl#greyIcon"});
                    a[i].geoObjects.add(u)
                })
            },
            initPvzChange: function () {
                var e = this;
                $(".pvz-addresses select").on("change", function () {
                    var t = $(this.options[this.selectedIndex]);
                    e.setPvzDataFromOption(t)
                })
            },
            initPostamatChange: function () {
                var e = this;
                $(".postamat-addresses select").on("change", function () {
                    var t = $(this.options[this.selectedIndex]);
                    e.setPostamatDataFromOption(t)
                })
            },
            setPvzDataFromOption: function (e) {
                this._setPvzPostamatDataFromOption(e, "pvz")
            },
            setPostamatDataFromOption: function (e) {
                this._setPvzPostamatDataFromOption(e, "postamat")
            },
            _setPvzPostamatDataFromOption: function (e, t) {
                this.deliveryPrice = e.data("price"), this.deliveryTerm = e.data("term"), this.deliveryMinTerm = e.data("minTerm"), this.deliveryMaxTerm = e.data("maxTerm"), this.deliveryId = e.data("deliveryId"), "pvz" === t ? (this.deliveryPvz = e.html().replace(/.*\u2014\s/, ""), this.deliveryPvzInfo = e.data("info")) : (this.deliveryPostamat = e.html().replace(/.*\u2014\s/, ""), this.deliveryPostamatInfo = e.data("info")), this.updatePrice(), this.updateTerm()
            },
            initDeliveryChange: function () {
                $(document).on("click", ".delivery-options li", _.bind(this.onDeliveryChanged, this))
            },
            initHouseNumberChange: function () {
                var e = this, t = $("#order_shipping_address_attributes_house");
                t[0] && (this.houseNumber = t.val().trim(), t.on("input", function () {
                    e.houseNumber = this.value.trim(), e.houseNumber && e.streetId && e.getPostalCode()
                }))
            },
            initCheckoutMode: function () {
                this.checkoutMode = "fallback" === $("#checkout-mode").val() ? "fallback" : "normal", "fallback" === this.checkoutMode ? this.fallbackToDefaultMode() : "normal" === this.checkoutMode && this.resetDeliveryOptions()
            },
            resetDeliveryOptions: function () {
                this.deliveryPrice = 0;
                var e = $(".delivery-options .default");
                e.hide().find("input").prop("checked", !1), $(".delivery-options .normal").html(""), $(".pay-order").prop("disabled", !0), $(".delivery-address, .pvz-addresses, .delivery-total, .settlement .region").hide(), $('#order_shipping_address_attributes_city, label[for="order_shipping_address_attributes_city"]').hide(), $("#settlement-suggestions").show(), this.updatePrice()
            },
            fallbackToDefaultMode: function () {
                this.onFallback && this.onFallback(), this.checkoutMode = "fallback", $(".spinner").hide(), $(".info-message").hide(), $("#settlement-suggestions").hide(), $("#order_shipping_address_attributes_region").show(), $(".delivery-options .normal").hide(), $(".delivery-options .default").show().find("li, .price, .info").css({display: "inline-block"}), $(".delivery-address").show(), $('#order_shipping_address_attributes_city, label[for="order_shipping_address_attributes_city"]').show(), $(".pay-order").prop("disabled", !1), $(".delivery-total").css({top: "191px"}).show(), $("#order_delivery_title_pickup").click(), this.onDeliveryChanged({currentTarget: $(".delivery-options li:has(:checked)")}), "undefined" != typeof _gaq && _gaq.push(["_trackEvent", "Navigation", "Checkout fallback"])
            },
            onSettlementSelected: function (e) {
                e.data !== this.settlementId && ($(".info-message").html($(".info-message").data("default-message")).show(), this.settlementId = e.data, this.initStreetAutocomplete(), this.getDeliveryOptions())
            },
            onSettlementError: function (e, t, n) {
                "abort" !== n && this.fallbackToDefaultMode()
            },
            onStreetSelected: function (e) {
                this.streetId = e.data, this.houseNumber && this.getPostalCode()
            },
            onStreetError: function (e, t, n) {
                "abort" !== n && this.fallbackToDefaultMode()
            },
            onSearchStart: function () {
                $(".settlement").append($(".spinner").show())
            },
            onSearchComplete: function () {
                $(".spinner").hide()
            },
            initSettlementAutocomplete: function () {
                if ("fallback" !== this.checkoutMode) {
                    $("#settlement-suggestions").autocomplete({
                        serviceUrl: "/checkout_provider/suggest_settlements.json?mode=normal",
                        paramName: "name",
                        width: 640,
                        minChars: 2,
                        deferRequestBy: 200,
                        onSelect: _.bind(this.onSettlementSelected, this),
                        onSearchError: _.bind(this.onSettlementError, this),
                        onSearchStart: _.bind(this.onSearchStart, this),
                        onSearchComplete: _.bind(this.onSearchComplete, this),
                        transformResult: _.bind(this.transformSettlementResult, this)
                    });
                    var e = $("#fias").val();
                    e ? this.onSettlementSelected({
                        value: $("#settlement-suggestions").val(),
                        data: e
                    }) : ($("#settlement-suggestions").val(""), $("#settlement-suggestions").focus())
                }
            },
            initSettlementRemoval: function () {
                $("#settlement-suggestions").on("input", _.bind(function () {
                    this.settlementId = null, this.resetDeliveryOptions(), this.ui.$postamatAddresses.hide(), this.ui.$pvzAddresses.hide()
                }, this))
            },
            initStreetAutocomplete: function () {
                $("#order_shipping_address_attributes_street").autocomplete({
                    serviceUrl: "/checkout_provider/suggest_streets.json?mode=normal&settlement_id=" + this.settlementId,
                    paramName: "name",
                    minChars: 2,
                    deferRequestBy: 200,
                    onSelect: _.bind(this.onStreetSelected, this),
                    onSearchError: _.bind(this.onStreetError, this),
                    transformResult: _.bind(this.transformStreetResult, this)
                }), $("#order_shipping_address_attributes_street").val("")
            },
            transformSettlementResult: function (e) {
                if ("string" == typeof e)try {
                    e = JSON.parse(e)
                } catch (t) {
                    if ("undefined" != typeof _errs)throw _errs.meta = {json: e}, _errs.push(t), t
                }
                return {
                    suggestions: $.map(e, function (e) {
                        return {value: e.full_name, data: e.id}
                    })
                }
            },
            transformStreetResult: function (e) {
                return "string" == typeof e && (e = JSON.parse(e)), {
                    suggestions: $.map(e, function (e) {
                        return {value: e.type + ". " + e.name, data: e.id}
                    })
                }
            },
            getPostalCode: function () {
                var e = "/checkout_provider/fetch_postal_code.json?street_id=" + this.streetId + "&house=" + this.houseNumber;
                $.get(e).done(function (e) {
                    $("#order_shipping_address_attributes_postcode").val(e)
                }).fail(function () {
                })
            },
            getDeliveryOptions: function () {
                var e = new Date;
                $.get("/checkout_provider/fetch_delivery_methods.json?settlement_id=" + this.settlementId).done(_.bind(this.onDeliveryOptionsReceived, this)).fail(_.bind(this.onDeliveryOptionsFailed, this)).always(function () {
                    $(".info-message").fadeOut();
                    var t = new Date - e;
                    "undefined" != typeof _gaq && _gaq.push(["_setCustomVar", 1, "Checkout fetch time", t])
                })
            },
            translateType: function (e) {
                switch (e) {
                    case"pvz":
                        return "\u041f\u0443\u043d\u043a\u0442 \u0412\u044b\u0434\u0430\u0447\u0438";
                    case"postamat":
                        return "\u041f\u043e\u0441\u0442\u0430\u043c\u0430\u0442";
                    case"express":
                        return "\u041a\u0443\u0440\u044c\u0435\u0440";
                    case"express_own":
                        return "\u041a\u0443\u0440\u044c\u0435\u0440";
                    case"pochta":
                        return "\u041f\u043e\u0447\u0442\u0430 \u0420\u043e\u0441\u0441\u0438\u0438"
                }
            },
            getPostfix: function (e, t) {
                return t ? 1 === e || e > 20 && "1" === (e + "").slice(-1) ? "\u0434\u043d\u044f" : "\u0434\u043d\u0435\u0439" : 1 === e || e > 20 && "1" === (e + "").slice(-1) ? "\u0434\u0435\u043d\u044c" : e > 1 && 5 > e || e > 20 && (e + "").slice(-1).match(/[234]/) ? "\u0434\u043d\u044f" : "\u0434\u043d\u0435\u0439"
            },
            createDeliveryOption: function (e, t) {
                var n, i = e[t], r = "undefined" != typeof i.addresses ? "\u043e\u0442 " : "", o = this.getPostfix(i.min_delivery_term, !0);
                n = $(this.deliveryOptionTemplate({
                    type: t,
                    translatedType: this.translateType(t),
                    name: e.name || "checkout",
                    price: i.cost,
                    translatedPrice: r + i.cost + this.priceAbbr,
                    term: "\u043e\u0442 <b>" + i.min_delivery_term + "</b> " + o,
                    info: i.additional_info[0] || ""
                })), n.data("deliveryId", i.delivery_id).data("deliveryMinTerm", i.min_delivery_term).data("deliveryMaxTerm", i.max_delivery_term), $(".delivery-options .normal").append(n), n.fadeIn().css({display: "inline-block"})
            },
            addPochtaToData: function (e) {
                e.pochta = {min_delivery_term: 7, max_delivery_term: 20, cost: 300, additional_info: []}
            },
            onDeliveryOptionsReceived: function (e) {
                this.addPochtaToData(e), this.resetDeliveryOptions(), this.createDeliveryOptions(e), this.maybeShowNoDelivery(e)
            },
            createDeliveryOptions: function (e) {
                if (!e)return void this.fallbackToDefaultMode();
                "\u041c\u043e\u0441\u043a\u0432\u0430" === this.getCurrentSettlementNormalized();
                e.express && this.createDeliveryOption(e, "express"), e.postamat && (this.createDeliveryOption(e, "postamat"), this.populatePvzPostamat(e.postamat, "postamat")), e.pvz && (this.createDeliveryOption(e, "pvz"), this.populatePvzPostamat(e.pvz, "pvz"));
                var t = this.getCurrentSettlementNormalized(), n = "true" === $("#idea-logic-provider").val();
                "\u041c\u043e\u0441\u043a\u0432\u0430" !== t && n ? (this.createDeliveryOption(e, "pochta"), $(".delivery-options").addClass("has-pochta")) : $(".delivery-options").removeClass("has-pochta")
            },
            populatePvzPostamat: function (e, t) {
                "pvz" === t ? this.pvzData = e : this.postamatData = e, "pvz" === t && this.initPvzMap(), "postamat" === t && this.initPostamatMap();
                var n = "pvz" === t ? ".pvz-addresses" : ".postamat-addresses";
                $(n + " select").html(""), $.each(e.addresses, function (t, i) {
                    var r = $("<option></option>").val(t).html(t + 1 + ". " + e.costs[t] + "\u0440\u0443\u0431. \u2014 " + i).data({
                        price: e.costs[t],
                        term: e.min_terms[t],
                        minTerm: e.min_terms[t],
                        maxTerm: e.max_terms[t],
                        info: e.additional_info[t],
                        deliveryId: e.deliveries[t]
                    });
                    $(n + " select").append(r)
                }), "pvz" === t ? this.setPvzDataFromOption($(n + " select option:eq(0)")) : this.setPostamatDataFromOption($(n + " select option:eq(0)"))
            },
            maybeShowNoDelivery: function (e) {
                0 === _.keys(e).length && ($(".no-delivery").show(), setTimeout(function () {
                    $(".no-delivery").fadeOut()
                }, 2e3))
            },
            onDeliveryOptionsFailed: function () {
                var e = $(".error-message");
                e.html(e.data("default-message")).show(), setTimeout(function () {
                    e.fadeOut()
                }, 2e3), this.fallbackToDefaultMode()
            },
            updatePrice: function () {
                $(".order-price .price").html(this.defaultPrice + (this.deliveryPrice || 0) + this.priceAbbr)
            },
            updateTerm: function () {
                $(".delivery-total .delivery-term").show().find("span").html(this.deliveryTerm + " " + this.getPostfix(parseInt(this.deliveryTerm, 10))), $(".pvz-info").html(this.deliveryPvzInfo), $(".postamat-info").html(this.deliveryPostamatInfo)
            },
            toggleAddressSection: function () {
                var e = $("li.express :radio").prop("checked"), t = $("li.courier :radio").prop("checked"), n = $("li.pochta :radio").prop("checked");
                $(".delivery-address").show(), e || t || n ? ($(".address-fields .row:not(:first-child)").fadeIn(), $(".delivery-address h2").html("\u0410\u0434\u0440\u0435\u0441 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0438")) : ($(".address-fields .row:not(:first-child)").fadeOut(), $(".delivery-address h2").html("\u0412\u0430\u0448\u0438 \u0434\u0430\u043d\u043d\u044b\u0435"))
            },
            togglePvzSection: function () {
                var e = $("li.pvz :radio").prop("checked"), t = $("li.postamat :radio").prop("checked");
                e ? (this.ui.$postamatAddresses.hide(), this.ui.$pvzAddresses.css({display: "inline-block"}).fadeIn("fast")) : t ? (this.ui.$pvzAddresses.hide(), this.ui.$postamatAddresses.css({display: "inline-block"}).fadeIn("fast")) : (this.ui.$pvzAddresses.hide(), this.ui.$postamatAddresses.hide())
            },
            onDeliveryChanged: function (e) {
                var t, n = $(e.currentTarget);
                n.siblings().removeClass("selected"), n.addClass("selected"), n.find("input").prop("checked", !0), this.deliveryPrice = parseFloat(n.data("price")), this.deliveryType = n.data("type"), this.deliveryInfo = n.find(".info").html(), this.deliveryTerm = n.find(".delivery-term b").html(), n.hasClass("pvz") ? (t = $(".pvz-addresses").find("option:selected"), this.deliveryId = t.data("deliveryId"), this.deliveryPrice = t.data("price")) : n.hasClass("postamat") ? (t = $(".postamat-addresses").find("option:selected"), this.deliveryId = t.data("deliveryId"), this.deliveryPrice = t.data("price")) : this.deliveryId = n.data("deliveryId"), n.data("deliveryMinTerm") && !n.hasClass("pvz") && (this.deliveryMinTerm = n.data("deliveryMinTerm")), n.data("deliveryMaxTerm") && !n.hasClass("pvz") && (this.deliveryMaxTerm = n.data("deliveryMaxTerm")), this.updatePrice(), this.updateTerm(), this.toggleAddressSection(), this.togglePvzSection(), $(".pay-order").prop("disabled", !1), $(".delivery-total").fadeIn()
            }
        };
        e.init()
    }
}), jQuery(function (e) {
    function t() {
        e(".current-delivery-location").hide(), e(".area-description").show(), e(".delivery-options").hide(), e(".info-message").hide()
    }

    if (e("body").hasClass("pages-show-delivery-payment-page")) {
        e(".info-message").show();
        var n = e("#fias").val();
        n && window.DeliveryView ? (e(".area-selection").after('<h1 class="current-delivery-location">\u0414\u043e\u0441\u0442\u0430\u0432\u043a\u0430 \u0432 \u0433\u043e\u0440\u043e\u0434 <b>' + e("#current-location").val() + '</b><span class="other-city-wrapper">(<a href="#" class="other-city">\u042f \u0432 \u0434\u0440\u0443\u0433\u043e\u043c \u0433\u043e\u0440\u043e\u0434\u0435</a>)</span></h1>'), window.DeliveryView.onFallback = t, window.DeliveryView.onSettlementSelected({
            value: e("#current-location").val(),
            data: n
        })) : t(), e(document).on("click", ".other-city", function () {
            return e(".city-selection-popup").show(), e(".city-selection-popup .suggestion").focus(), !1
        })
    }
}), $(function () {
    function e() {
        $(".favorites-icon .header-icons__count").html(function (e, t) {
            return parseInt(t, 10) + 1
        })
    }

    function t() {
        $(".favorites-icon .header-icons__count").html(function (e, t) {
            return parseInt(t, 10) - 1
        })
    }

    function n() {
        var n = $(this);
        return $.ajax({url: n.attr("href"), type: n.attr("data-method")}).done(function (i) {
            if (i.indexOf("<form") > -1)return $(".signin-popup .body").html(i), window.__initPlaceholders && __initPlaceholders(), void $(".signin-popup, .modal-shim").fadeIn(100);
            "patch" === n.attr("data-method") ? e() : t();
            var r = n.parent();
            n.replaceWith(i), n = r.find(".add-to-favorites")
        }), !1
    }

    function i() {
        var e = [];
        _.each($(".add-to-favorites"), function (t) {
            if (!$(t).data("is-favorites-initialized")) {
                var n = $(t).closest(".product-thumb").find(".product-id").val();
                $(t).data("is-favorites-initialized", !0), e.push(n)
            }
        }), 0 !== e.length && $.get("/profile/favorites/statuses.json?ids=" + e.join(",")).done(function (e) {
            for (var t in e)if (e[t]) {
                var n = $(".product-id[value=" + t + "]").closest(".product-thumb").find(".add-to-favorites");
                n.attr("data-method", "delete").attr("href", "/profile/favorites/" + t).html("\u0418\u0437 \u0438\u0437\u0431\u0440\u0430\u043d\u043d\u043e\u0433\u043e")
            }
        })
    }

    var r = $.fn.data;
    $.fn.data = function (e) {
        return "method" === e && $(this).hasClass("add-to-favorites") ? "" : r.apply(this, arguments)
    }, $(document).on("click", ".add-to-favorites", n), window.__initFavorites = i, "true" === $("#registered").val() && i()
}), function () {
    function e(e) {
        var t = "/region_locales?location[fias_id]=" + e.data;
        e.name && (t += "&location[name]=" + e.name), e.value && (t += "&location[full_name]=" + e.value), $.ajax({
            type: "PUT",
            url: t
        }).done(function () {
            location.reload()
        })
    }

    function t(e) {
        return "string" == typeof e && (e = JSON.parse(e)), {
            suggestions: $.map(e, function (e) {
                return {value: e.full_name, data: e.id, name: e.name}
            })
        }
    }

    $(document).on("click", ".city-selection", function () {
        return $(".city-selection-popup").show(), $(".city-selection-popup .suggestion").focus(), !1
    }).on("click", function (e) {
        $(e.target).closest(".city-selection-popup")[0] || $(e.target).closest(".city-selection")[0] || $(".city-selection-popup").hide()
    }), $(".city-selection-popup ul > li a").on("click", function () {
        return e({data: this.href.match(/fias_id%5D=(.*)/)[1]}), $(".city-selection-popup").hide(), !1
    }), $(".city-selection-popup .suggestion").autocomplete({
        serviceUrl: "/checkout_provider/suggest_settlements.json?mode=normal",
        paramName: "name",
        width: 605,
        height: 400,
        minChars: 2,
        deferRequestBy: 200,
        transformResult: t,
        onSelect: e
    }), $(".city-selection-popup form").on("submit", function () {
        return !1
    })
}(), $(function () {
    $(document).on("click", ".image-item-upload-btn", function () {
        printio.modalPopupShow(this, ".image-item-upload-popup");
        var e, t = $(this), n = $(".image-item-upload-popup").last();
        $(".blank_item_name", n).val(window.__productName || t.data("name"));
        var i = window.__productMeta || JSON.parse(t.closest(".product-img-outer-wrapper").find(".product-meta").val()), r = window.__sidePhotos || t.data("side-photos") || [];
        return i.designs.forEach(function (t, i) {
            e = '<div class="design"><p><img src="' + r[i] + '"></p><label class="side">' + t.translated_name + '</label><input type="file" name="single_image_design[' + t.name + ']" value=""><label class="selected-file"></label><button class="btn btn-info btn-select">\u0412\u044b\u0431\u0440\u0430\u0442\u044c \u043a\u0430\u0440\u0442\u0438\u043d\u043a\u0443</button></div>', $(".designs", n).append(e)
        }), $(".btn-select", n).click(function () {
            var e = $(this).closest(".design");
            return $("input[type=file]", e).click(), !1
        }), $("input[type=file]", n).on("change", function () {
            var e = $(this).closest(".design"), t = $(this).val().split("\\").pop();
            $(".selected-file", e).text(t)
        }), $(".btn-upload", n).on("click", function () {
            n.find(".btn-upload").prop("disabled", !0).showAltText();
            var e = n.find("form");
            return e.prop("action", e.prop("action").replace(".json", "") + ".json"), e.ajaxSubmit({
                success: function (e, t, i) {
                    var r = i.getResponseHeader("Location");
                    r && (window.location = r), e.errors && n.find(".error").html(e.error).show()
                }, error: function (e) {
                    e.responseJSON.errors && e.responseJSON.errors.base && n.find(".error").html(e.responseJSON.errors.base[0]).show(), $(".btn-upload", n).prop("disabled", !1)
                }
            }), !1
        }), !1
    })
}), $(function () {
    $("[data-checkbox-display-toggle]").each(function () {
        var e = $(this), t = $(this).attr("data-checkbox-display-toggle"), n = $('[type="checkbox"][name="' + t + '"]');
        n.is(":checked") ? e.hide() : e.show(), n.change(function () {
            n.is(":checked") ? e.fadeOut() : e.fadeIn()
        })
    })
}), window.IS_RGBA_SUPPORTED = function () {
    var e = "rgba(1,1,1,0.5)", t = document.createElement("p"), n = !1;
    try {
        t.style.color = e, n = /^rgba/.test(t.style.color)
    } catch (i) {
    }
    return n
}();
var printio = printio || {};
printio.widget = {}, window.dataLayer = window.dataLayer || [];
var trackAddToCart = function (e) {
    dataLayer.push({
        ecommerce: {
            add: {
                products: [{
                    id: $(e).parent(".product-wrapper").find(".product-id").eq(0).val(),
                    name: $(".product-title", e).html(),
                    quantity: $("#line_item_quantity", e).val()
                }]
            }
        }
    })
};
$(function () {
    $(".closeup-page").find(".product-properties").on("submit", function () {
        trackAddToCart(this)
    })
}), $(".global-error-message .discard").click(function () {
    return $(this).parents(".global-error-message").fadeOut(), $.get($(this).attr("href")), !1
}), $(document).on("click", ".see-sizes-table", function (e) {
    return $(e.currentTarget).closest(".product-info").find(".product-info-sections > li:eq(3)").click(), !1
}).on("click", ".popular-products li a[data-side]", function () {
    "undefined" != typeof _gaq && _gaq.push(["_trackEvent", "Navigation", "Featured item on front page"]);
    var e = this;
    return setTimeout(function () {
        document.location.href = e.href
    }, 100), !1
}).on("click", ".breadcrumbs a", function () {
    "undefined" != typeof _gaq && _gaq.push(["_trackEvent", "Navigation", "Breadcrumb in store"]);
    var e = this;
    return setTimeout(function () {
        document.location.href = e.href
    }, 100), !1
}), $(function () {
    var e = document.location + "";
    if (e.indexOf("/products/business_cards") > -1 && e.indexOf("#free-bizcards") > -1) {
        var t = $("#new-coupon-path").val();
        if ($.post(t).done(function (e) {
                $(".promo-popup input").val(e)
            }), document.cookie.indexOf("promo_popup_shown") > -1)return;
        $(".promo-popup, .modal-shim").show(), setTimeout(function () {
            $(".promo-popup input").focus().select()
        }, 1e3), document.cookie = "promo_popup_shown=1"
    }
}), $(function () {
    $(".checkout-confirmation-page .edit_order").on("submit", function () {
        $(".checkout-confirmation-page .edit_order input[type=submit]").prop("disabled", !0);
        var e = this, t = $("#order-trackers").html().replace(/^\s*<!--\s*/, "").replace(/\s*-->\s*$/g, "");
        try {
            $("#order-trackers").html(t)
        } catch (n) {
            "undefined" != typeof _errs && (_errs.meta = {markup: t}, _errs.push(n))
        }
        return setTimeout(function () {
            e.submit(), $(".checkout-confirmation-page .edit_order input[type=submit]").prop("disabled", !1)
        }, 3e3), !1
    }), $(".phone").each(function () {
        $(this).mask("+7(999)999-9999", {autoclear: !1})
    })
});