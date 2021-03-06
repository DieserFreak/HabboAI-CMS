(function(e, t) {
    "use strict";

    function n(e) {
        var t = e.length,
            n = st.type(e);
        return st.isWindow(e) ? !1 : 1 === e.nodeType && t ? !0 : "array" === n || "function" !== n && (0 === t || "number" == typeof t && t > 0 && t - 1 in e)
    }

    function r(e) {
        var t = Tt[e] = {};
        return st.each(e.match(lt) || [], function(e, n) {
            t[n] = !0
        }), t
    }

    function i(e, n, r, i) {
        if (st.acceptData(e)) {
            var o, a, s = st.expando,
                u = "string" == typeof n,
                l = e.nodeType,
                c = l ? st.cache : e,
                f = l ? e[s] : e[s] && s;
            if (f && c[f] && (i || c[f].data) || !u || r !== t) return f || (l ? e[s] = f = K.pop() || st.guid++ : f = s), c[f] || (c[f] = {}, l || (c[f].toJSON = st.noop)), ("object" == typeof n || "function" == typeof n) && (i ? c[f] = st.extend(c[f], n) : c[f].data = st.extend(c[f].data, n)), o = c[f], i || (o.data || (o.data = {}), o = o.data), r !== t && (o[st.camelCase(n)] = r), u ? (a = o[n], null == a && (a = o[st.camelCase(n)])) : a = o, a
        }
    }

    function o(e, t, n) {
        if (st.acceptData(e)) {
            var r, i, o, a = e.nodeType,
                u = a ? st.cache : e,
                l = a ? e[st.expando] : st.expando;
            if (u[l]) {
                if (t && (r = n ? u[l] : u[l].data)) {
                    st.isArray(t) ? t = t.concat(st.map(t, st.camelCase)) : t in r ? t = [t] : (t = st.camelCase(t), t = t in r ? [t] : t.split(" "));
                    for (i = 0, o = t.length; o > i; i++) delete r[t[i]];
                    if (!(n ? s : st.isEmptyObject)(r)) return
                }(n || (delete u[l].data, s(u[l]))) && (a ? st.cleanData([e], !0) : st.support.deleteExpando || u != u.window ? delete u[l] : u[l] = null)
            }
        }
    }

    function a(e, n, r) {
        if (r === t && 1 === e.nodeType) {
            var i = "data-" + n.replace(Nt, "-$1").toLowerCase();
            if (r = e.getAttribute(i), "string" == typeof r) {
                try {
                    r = "true" === r ? !0 : "false" === r ? !1 : "null" === r ? null : +r + "" === r ? +r : wt.test(r) ? st.parseJSON(r) : r
                } catch (o) {}
                st.data(e, n, r)
            } else r = t
        }
        return r
    }

    function s(e) {
        var t;
        for (t in e)
            if (("data" !== t || !st.isEmptyObject(e[t])) && "toJSON" !== t) return !1;
        return !0
    }

    function u() {
        return !0
    }

    function l() {
        return !1
    }

    function c(e, t) {
        do e = e[t]; while (e && 1 !== e.nodeType);
        return e
    }

    function f(e, t, n) {
        if (t = t || 0, st.isFunction(t)) return st.grep(e, function(e, r) {
            var i = !!t.call(e, r, e);
            return i === n
        });
        if (t.nodeType) return st.grep(e, function(e) {
            return e === t === n
        });
        if ("string" == typeof t) {
            var r = st.grep(e, function(e) {
                return 1 === e.nodeType
            });
            if (Wt.test(t)) return st.filter(t, r, !n);
            t = st.filter(t, r)
        }
        return st.grep(e, function(e) {
            return st.inArray(e, t) >= 0 === n
        })
    }

    function p(e) {
        var t = zt.split("|"),
            n = e.createDocumentFragment();
        if (n.createElement)
            for (; t.length;) n.createElement(t.pop());
        return n
    }

    function d(e, t) {
        return e.getElementsByTagName(t)[0] || e.appendChild(e.ownerDocument.createElement(t))
    }

    function h(e) {
        var t = e.getAttributeNode("type");
        return e.type = (t && t.specified) + "/" + e.type, e
    }

    function g(e) {
        var t = nn.exec(e.type);
        return t ? e.type = t[1] : e.removeAttribute("type"), e
    }

    function m(e, t) {
        for (var n, r = 0; null != (n = e[r]); r++) st._data(n, "globalEval", !t || st._data(t[r], "globalEval"))
    }

    function y(e, t) {
        if (1 === t.nodeType && st.hasData(e)) {
            var n, r, i, o = st._data(e),
                a = st._data(t, o),
                s = o.events;
            if (s) {
                delete a.handle, a.events = {};
                for (n in s)
                    for (r = 0, i = s[n].length; i > r; r++) st.event.add(t, n, s[n][r])
            }
            a.data && (a.data = st.extend({}, a.data))
        }
    }

    function v(e, t) {
        var n, r, i;
        if (1 === t.nodeType) {
            if (n = t.nodeName.toLowerCase(), !st.support.noCloneEvent && t[st.expando]) {
                r = st._data(t);
                for (i in r.events) st.removeEvent(t, i, r.handle);
                t.removeAttribute(st.expando)
            }
            "script" === n && t.text !== e.text ? (h(t).text = e.text, g(t)) : "object" === n ? (t.parentNode && (t.outerHTML = e.outerHTML), st.support.html5Clone && e.innerHTML && !st.trim(t.innerHTML) && (t.innerHTML = e.innerHTML)) : "input" === n && Zt.test(e.type) ? (t.defaultChecked = t.checked = e.checked, t.value !== e.value && (t.value = e.value)) : "option" === n ? t.defaultSelected = t.selected = e.defaultSelected : ("input" === n || "textarea" === n) && (t.defaultValue = e.defaultValue)
        }
    }

    function b(e, n) {
        var r, i, o = 0,
            a = e.getElementsByTagName !== t ? e.getElementsByTagName(n || "*") : e.querySelectorAll !== t ? e.querySelectorAll(n || "*") : t;
        if (!a)
            for (a = [], r = e.childNodes || e; null != (i = r[o]); o++) !n || st.nodeName(i, n) ? a.push(i) : st.merge(a, b(i, n));
        return n === t || n && st.nodeName(e, n) ? st.merge([e], a) : a
    }

    function x(e) {
        Zt.test(e.type) && (e.defaultChecked = e.checked)
    }

    function T(e, t) {
        if (t in e) return t;
        for (var n = t.charAt(0).toUpperCase() + t.slice(1), r = t, i = Nn.length; i--;)
            if (t = Nn[i] + n, t in e) return t;
        return r
    }

    function w(e, t) {
        return e = t || e, "none" === st.css(e, "display") || !st.contains(e.ownerDocument, e)
    }

    function N(e, t) {
        for (var n, r = [], i = 0, o = e.length; o > i; i++) n = e[i], n.style && (r[i] = st._data(n, "olddisplay"), t ? (r[i] || "none" !== n.style.display || (n.style.display = ""), "" === n.style.display && w(n) && (r[i] = st._data(n, "olddisplay", S(n.nodeName)))) : r[i] || w(n) || st._data(n, "olddisplay", st.css(n, "display")));
        for (i = 0; o > i; i++) n = e[i], n.style && (t && "none" !== n.style.display && "" !== n.style.display || (n.style.display = t ? r[i] || "" : "none"));
        return e
    }

    function C(e, t, n) {
        var r = mn.exec(t);
        return r ? Math.max(0, r[1] - (n || 0)) + (r[2] || "px") : t
    }

    function k(e, t, n, r, i) {
        for (var o = n === (r ? "border" : "content") ? 4 : "width" === t ? 1 : 0, a = 0; 4 > o; o += 2) "margin" === n && (a += st.css(e, n + wn[o], !0, i)), r ? ("content" === n && (a -= st.css(e, "padding" + wn[o], !0, i)), "margin" !== n && (a -= st.css(e, "border" + wn[o] + "Width", !0, i))) : (a += st.css(e, "padding" + wn[o], !0, i), "padding" !== n && (a += st.css(e, "border" + wn[o] + "Width", !0, i)));
        return a
    }

    function E(e, t, n) {
        var r = !0,
            i = "width" === t ? e.offsetWidth : e.offsetHeight,
            o = ln(e),
            a = st.support.boxSizing && "border-box" === st.css(e, "boxSizing", !1, o);
        if (0 >= i || null == i) {
            if (i = un(e, t, o), (0 > i || null == i) && (i = e.style[t]), yn.test(i)) return i;
            r = a && (st.support.boxSizingReliable || i === e.style[t]), i = parseFloat(i) || 0
        }
        return i + k(e, t, n || (a ? "border" : "content"), r, o) + "px"
    }

    function S(e) {
        var t = V,
            n = bn[e];
        return n || (n = A(e, t), "none" !== n && n || (cn = (cn || st("<iframe frameborder='0' width='0' height='0'/>").css("cssText", "display:block !important")).appendTo(t.documentElement), t = (cn[0].contentWindow || cn[0].contentDocument).document, t.write("<!doctype html><html><body>"), t.close(), n = A(e, t), cn.detach()), bn[e] = n), n
    }

    function A(e, t) {
        var n = st(t.createElement(e)).appendTo(t.body),
            r = st.css(n[0], "display");
        return n.remove(), r
    }

    function j(e, t, n, r) {
        var i;
        if (st.isArray(t)) st.each(t, function(t, i) {
            n || kn.test(e) ? r(e, i) : j(e + "[" + ("object" == typeof i ? t : "") + "]", i, n, r)
        });
        else if (n || "object" !== st.type(t)) r(e, t);
        else
            for (i in t) j(e + "[" + i + "]", t[i], n, r)
    }

    function D(e) {
        return function(t, n) {
            "string" != typeof t && (n = t, t = "*");
            var r, i = 0,
                o = t.toLowerCase().match(lt) || [];
            if (st.isFunction(n))
                for (; r = o[i++];) "+" === r[0] ? (r = r.slice(1) || "*", (e[r] = e[r] || []).unshift(n)) : (e[r] = e[r] || []).push(n)
        }
    }

    function L(e, n, r, i) {
        function o(u) {
            var l;
            return a[u] = !0, st.each(e[u] || [], function(e, u) {
                var c = u(n, r, i);
                return "string" != typeof c || s || a[c] ? s ? !(l = c) : t : (n.dataTypes.unshift(c), o(c), !1)
            }), l
        }
        var a = {},
            s = e === $n;
        return o(n.dataTypes[0]) || !a["*"] && o("*")
    }

    function H(e, n) {
        var r, i, o = st.ajaxSettings.flatOptions || {};
        for (r in n) n[r] !== t && ((o[r] ? e : i || (i = {}))[r] = n[r]);
        return i && st.extend(!0, e, i), e
    }

    function M(e, n, r) {
        var i, o, a, s, u = e.contents,
            l = e.dataTypes,
            c = e.responseFields;
        for (o in c) o in r && (n[c[o]] = r[o]);
        for (;
            "*" === l[0];) l.shift(), i === t && (i = e.mimeType || n.getResponseHeader("Content-Type"));
        if (i)
            for (o in u)
                if (u[o] && u[o].test(i)) {
                    l.unshift(o);
                    break
                }
        if (l[0] in r) a = l[0];
        else {
            for (o in r) {
                if (!l[0] || e.converters[o + " " + l[0]]) {
                    a = o;
                    break
                }
                s || (s = o)
            }
            a = a || s
        }
        return a ? (a !== l[0] && l.unshift(a), r[a]) : t
    }

    function q(e, t) {
        var n, r, i, o, a = {},
            s = 0,
            u = e.dataTypes.slice(),
            l = u[0];
        if (e.dataFilter && (t = e.dataFilter(t, e.dataType)), u[1])
            for (n in e.converters) a[n.toLowerCase()] = e.converters[n];
        for (; i = u[++s];)
            if ("*" !== i) {
                if ("*" !== l && l !== i) {
                    if (n = a[l + " " + i] || a["* " + i], !n)
                        for (r in a)
                            if (o = r.split(" "), o[1] === i && (n = a[l + " " + o[0]] || a["* " + o[0]])) {
                                n === !0 ? n = a[r] : a[r] !== !0 && (i = o[0], u.splice(s--, 0, i));
                                break
                            }
                    if (n !== !0)
                        if (n && e["throws"]) t = n(t);
                        else try {
                            t = n(t)
                        } catch (c) {
                            return {
                                state: "parsererror",
                                error: n ? c : "No conversion from " + l + " to " + i
                            }
                        }
                }
                l = i
            }
        return {
            state: "success",
            data: t
        }
    }

    function _() {
        try {
            return new e.XMLHttpRequest
        } catch (t) {}
    }

    function F() {
        try {
            return new e.ActiveXObject("Microsoft.XMLHTTP")
        } catch (t) {}
    }

    function O() {
        return setTimeout(function() {
            Qn = t
        }), Qn = st.now()
    }

    function B(e, t) {
        st.each(t, function(t, n) {
            for (var r = (rr[t] || []).concat(rr["*"]), i = 0, o = r.length; o > i; i++)
                if (r[i].call(e, t, n)) return
        })
    }

    function P(e, t, n) {
        var r, i, o = 0,
            a = nr.length,
            s = st.Deferred().always(function() {
                delete u.elem
            }),
            u = function() {
                if (i) return !1;
                for (var t = Qn || O(), n = Math.max(0, l.startTime + l.duration - t), r = n / l.duration || 0, o = 1 - r, a = 0, u = l.tweens.length; u > a; a++) l.tweens[a].run(o);
                return s.notifyWith(e, [l, o, n]), 1 > o && u ? n : (s.resolveWith(e, [l]), !1)
            },
            l = s.promise({
                elem: e,
                props: st.extend({}, t),
                opts: st.extend(!0, {
                    specialEasing: {}
                }, n),
                originalProperties: t,
                originalOptions: n,
                startTime: Qn || O(),
                duration: n.duration,
                tweens: [],
                createTween: function(t, n) {
                    var r = st.Tween(e, l.opts, t, n, l.opts.specialEasing[t] || l.opts.easing);
                    return l.tweens.push(r), r
                },
                stop: function(t) {
                    var n = 0,
                        r = t ? l.tweens.length : 0;
                    if (i) return this;
                    for (i = !0; r > n; n++) l.tweens[n].run(1);
                    return t ? s.resolveWith(e, [l, t]) : s.rejectWith(e, [l, t]), this
                }
            }),
            c = l.props;
        for (R(c, l.opts.specialEasing); a > o; o++)
            if (r = nr[o].call(l, e, c, l.opts)) return r;
        return B(l, c), st.isFunction(l.opts.start) && l.opts.start.call(e, l), st.fx.timer(st.extend(u, {
            elem: e,
            anim: l,
            queue: l.opts.queue
        })), l.progress(l.opts.progress).done(l.opts.done, l.opts.complete).fail(l.opts.fail).always(l.opts.always)
    }

    function R(e, t) {
        var n, r, i, o, a;
        for (n in e)
            if (r = st.camelCase(n), i = t[r], o = e[n], st.isArray(o) && (i = o[1], o = e[n] = o[0]), n !== r && (e[r] = o, delete e[n]), a = st.cssHooks[r], a && "expand" in a) {
                o = a.expand(o), delete e[r];
                for (n in o) n in e || (e[n] = o[n], t[n] = i)
            } else t[r] = i
    }

    function W(e, t, n) {
        var r, i, o, a, s, u, l, c, f, p = this,
            d = e.style,
            h = {},
            g = [],
            m = e.nodeType && w(e);
        n.queue || (c = st._queueHooks(e, "fx"), null == c.unqueued && (c.unqueued = 0, f = c.empty.fire, c.empty.fire = function() {
            c.unqueued || f()
        }), c.unqueued++, p.always(function() {
            p.always(function() {
                c.unqueued--, st.queue(e, "fx").length || c.empty.fire()
            })
        })), 1 === e.nodeType && ("height" in t || "width" in t) && (n.overflow = [d.overflow, d.overflowX, d.overflowY], "inline" === st.css(e, "display") && "none" === st.css(e, "float") && (st.support.inlineBlockNeedsLayout && "inline" !== S(e.nodeName) ? d.zoom = 1 : d.display = "inline-block")), n.overflow && (d.overflow = "hidden", st.support.shrinkWrapBlocks || p.done(function() {
            d.overflow = n.overflow[0], d.overflowX = n.overflow[1], d.overflowY = n.overflow[2]
        }));
        for (r in t)
            if (o = t[r], Zn.exec(o)) {
                if (delete t[r], u = u || "toggle" === o, o === (m ? "hide" : "show")) continue;
                g.push(r)
            }
        if (a = g.length) {
            s = st._data(e, "fxshow") || st._data(e, "fxshow", {}), "hidden" in s && (m = s.hidden), u && (s.hidden = !m), m ? st(e).show() : p.done(function() {
                st(e).hide()
            }), p.done(function() {
                var t;
                st._removeData(e, "fxshow");
                for (t in h) st.style(e, t, h[t])
            });
            for (r = 0; a > r; r++) i = g[r], l = p.createTween(i, m ? s[i] : 0), h[i] = s[i] || st.style(e, i), i in s || (s[i] = l.start, m && (l.end = l.start, l.start = "width" === i || "height" === i ? 1 : 0))
        }
    }

    function $(e, t, n, r, i) {
        return new $.prototype.init(e, t, n, r, i)
    }

    function I(e, t) {
        var n, r = {
                height: e
            },
            i = 0;
        for (t = t ? 1 : 0; 4 > i; i += 2 - t) n = wn[i], r["margin" + n] = r["padding" + n] = e;
        return t && (r.opacity = r.width = e), r
    }

    function z(e) {
        return st.isWindow(e) ? e : 9 === e.nodeType ? e.defaultView || e.parentWindow : !1
    }
    var X, U, V = e.document,
        Y = e.location,
        J = e.jQuery,
        G = e.$,
        Q = {},
        K = [],
        Z = "1.9.0",
        et = K.concat,
        tt = K.push,
        nt = K.slice,
        rt = K.indexOf,
        it = Q.toString,
        ot = Q.hasOwnProperty,
        at = Z.trim,
        st = function(e, t) {
            return new st.fn.init(e, t, X)
        },
        ut = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        lt = /\S+/g,
        ct = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
        ft = /^(?:(<[\w\W]+>)[^>]*|#([\w-]*))$/,
        pt = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
        dt = /^[\],:{}\s]*$/,
        ht = /(?:^|:|,)(?:\s*\[)+/g,
        gt = /\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,
        mt = /"[^"\\\r\n]*"|true|false|null|-?(?:\d+\.|)\d+(?:[eE][+-]?\d+|)/g,
        yt = /^-ms-/,
        vt = /-([\da-z])/gi,
        bt = function(e, t) {
            return t.toUpperCase()
        },
        xt = function() {
            V.addEventListener ? (V.removeEventListener("DOMContentLoaded", xt, !1), st.ready()) : "complete" === V.readyState && (V.detachEvent("onreadystatechange", xt), st.ready())
        };
    st.fn = st.prototype = {
        jquery: Z,
        constructor: st,
        init: function(e, n, r) {
            var i, o;
            if (!e) return this;
            if ("string" == typeof e) {
                if (i = "<" === e.charAt(0) && ">" === e.charAt(e.length - 1) && e.length >= 3 ? [null, e, null] : ft.exec(e), !i || !i[1] && n) return !n || n.jquery ? (n || r).find(e) : this.constructor(n).find(e);
                if (i[1]) {
                    if (n = n instanceof st ? n[0] : n, st.merge(this, st.parseHTML(i[1], n && n.nodeType ? n.ownerDocument || n : V, !0)), pt.test(i[1]) && st.isPlainObject(n))
                        for (i in n) st.isFunction(this[i]) ? this[i](n[i]) : this.attr(i, n[i]);
                    return this
                }
                if (o = V.getElementById(i[2]), o && o.parentNode) {
                    if (o.id !== i[2]) return r.find(e);
                    this.length = 1, this[0] = o
                }
                return this.context = V, this.selector = e, this
            }
            return e.nodeType ? (this.context = this[0] = e, this.length = 1, this) : st.isFunction(e) ? r.ready(e) : (e.selector !== t && (this.selector = e.selector, this.context = e.context), st.makeArray(e, this))
        },
        selector: "",
        length: 0,
        size: function() {
            return this.length
        },
        toArray: function() {
            return nt.call(this)
        },
        get: function(e) {
            return null == e ? this.toArray() : 0 > e ? this[this.length + e] : this[e]
        },
        pushStack: function(e) {
            var t = st.merge(this.constructor(), e);
            return t.prevObject = this, t.context = this.context, t
        },
        each: function(e, t) {
            return st.each(this, e, t)
        },
        ready: function(e) {
            return st.ready.promise().done(e), this
        },
        slice: function() {
            return this.pushStack(nt.apply(this, arguments))
        },
        first: function() {
            return this.eq(0)
        },
        last: function() {
            return this.eq(-1)
        },
        eq: function(e) {
            var t = this.length,
                n = +e + (0 > e ? t : 0);
            return this.pushStack(n >= 0 && t > n ? [this[n]] : [])
        },
        map: function(e) {
            return this.pushStack(st.map(this, function(t, n) {
                return e.call(t, n, t)
            }))
        },
        end: function() {
            return this.prevObject || this.constructor(null)
        },
        push: tt,
        sort: [].sort,
        splice: [].splice
    }, st.fn.init.prototype = st.fn, st.extend = st.fn.extend = function() {
        var e, n, r, i, o, a, s = arguments[0] || {},
            u = 1,
            l = arguments.length,
            c = !1;
        for ("boolean" == typeof s && (c = s, s = arguments[1] || {}, u = 2), "object" == typeof s || st.isFunction(s) || (s = {}), l === u && (s = this, --u); l > u; u++)
            if (null != (e = arguments[u]))
                for (n in e) r = s[n], i = e[n], s !== i && (c && i && (st.isPlainObject(i) || (o = st.isArray(i))) ? (o ? (o = !1, a = r && st.isArray(r) ? r : []) : a = r && st.isPlainObject(r) ? r : {}, s[n] = st.extend(c, a, i)) : i !== t && (s[n] = i));
        return s
    }, st.extend({
        noConflict: function(t) {
            return e.$ === st && (e.$ = G), t && e.jQuery === st && (e.jQuery = J), st
        },
        isReady: !1,
        readyWait: 1,
        holdReady: function(e) {
            e ? st.readyWait++ : st.ready(!0)
        },
        ready: function(e) {
            if (e === !0 ? !--st.readyWait : !st.isReady) {
                if (!V.body) return setTimeout(st.ready);
                st.isReady = !0, e !== !0 && --st.readyWait > 0 || (U.resolveWith(V, [st]), st.fn.trigger && st(V).trigger("ready").off("ready"))
            }
        },
        isFunction: function(e) {
            return "function" === st.type(e)
        },
        isArray: Array.isArray || function(e) {
            return "array" === st.type(e)
        },
        isWindow: function(e) {
            return null != e && e == e.window
        },
        isNumeric: function(e) {
            return !isNaN(parseFloat(e)) && isFinite(e)
        },
        type: function(e) {
            return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? Q[it.call(e)] || "object" : typeof e
        },
        isPlainObject: function(e) {
            if (!e || "object" !== st.type(e) || e.nodeType || st.isWindow(e)) return !1;
            try {
                if (e.constructor && !ot.call(e, "constructor") && !ot.call(e.constructor.prototype, "isPrototypeOf")) return !1
            } catch (n) {
                return !1
            }
            var r;
            for (r in e);
            return r === t || ot.call(e, r)
        },
        isEmptyObject: function(e) {
            var t;
            for (t in e) return !1;
            return !0
        },
        error: function(e) {
            throw Error(e)
        },
        parseHTML: function(e, t, n) {
            if (!e || "string" != typeof e) return null;
            "boolean" == typeof t && (n = t, t = !1), t = t || V;
            var r = pt.exec(e),
                i = !n && [];
            return r ? [t.createElement(r[1])] : (r = st.buildFragment([e], t, i), i && st(i).remove(), st.merge([], r.childNodes))
        },
        parseJSON: function(n) {
            return e.JSON && e.JSON.parse ? e.JSON.parse(n) : null === n ? n : "string" == typeof n && (n = st.trim(n), n && dt.test(n.replace(gt, "@").replace(mt, "]").replace(ht, ""))) ? Function("return " + n)() : (st.error("Invalid JSON: " + n), t)
        },
        parseXML: function(n) {
            var r, i;
            if (!n || "string" != typeof n) return null;
            try {
                e.DOMParser ? (i = new DOMParser, r = i.parseFromString(n, "text/xml")) : (r = new ActiveXObject("Microsoft.XMLDOM"), r.async = "false", r.loadXML(n))
            } catch (o) {
                r = t
            }
            return r && r.documentElement && !r.getElementsByTagName("parsererror").length || st.error("Invalid XML: " + n), r
        },
        noop: function() {},
        globalEval: function(t) {
            t && st.trim(t) && (e.execScript || function(t) {
                e.eval.call(e, t)
            })(t)
        },
        camelCase: function(e) {
            return e.replace(yt, "ms-").replace(vt, bt)
        },
        nodeName: function(e, t) {
            return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
        },
        each: function(e, t, r) {
            var i, o = 0,
                a = e.length,
                s = n(e);
            if (r) {
                if (s)
                    for (; a > o && (i = t.apply(e[o], r), i !== !1); o++);
                else
                    for (o in e)
                        if (i = t.apply(e[o], r), i === !1) break
            } else if (s)
                for (; a > o && (i = t.call(e[o], o, e[o]), i !== !1); o++);
            else
                for (o in e)
                    if (i = t.call(e[o], o, e[o]), i === !1) break; return e
        },
        trim: at && !at.call("\ufeff\u00a0") ? function(e) {
            return null == e ? "" : at.call(e)
        } : function(e) {
            return null == e ? "" : (e + "").replace(ct, "")
        },
        makeArray: function(e, t) {
            var r = t || [];
            return null != e && (n(Object(e)) ? st.merge(r, "string" == typeof e ? [e] : e) : tt.call(r, e)), r
        },
        inArray: function(e, t, n) {
            var r;
            if (t) {
                if (rt) return rt.call(t, e, n);
                for (r = t.length, n = n ? 0 > n ? Math.max(0, r + n) : n : 0; r > n; n++)
                    if (n in t && t[n] === e) return n
            }
            return -1
        },
        merge: function(e, n) {
            var r = n.length,
                i = e.length,
                o = 0;
            if ("number" == typeof r)
                for (; r > o; o++) e[i++] = n[o];
            else
                for (; n[o] !== t;) e[i++] = n[o++];
            return e.length = i, e
        },
        grep: function(e, t, n) {
            var r, i = [],
                o = 0,
                a = e.length;
            for (n = !!n; a > o; o++) r = !!t(e[o], o), n !== r && i.push(e[o]);
            return i
        },
        map: function(e, t, r) {
            var i, o = 0,
                a = e.length,
                s = n(e),
                u = [];
            if (s)
                for (; a > o; o++) i = t(e[o], o, r), null != i && (u[u.length] = i);
            else
                for (o in e) i = t(e[o], o, r), null != i && (u[u.length] = i);
            return et.apply([], u)
        },
        guid: 1,
        proxy: function(e, n) {
            var r, i, o;
            return "string" == typeof n && (r = e[n], n = e, e = r), st.isFunction(e) ? (i = nt.call(arguments, 2), o = function() {
                return e.apply(n || this, i.concat(nt.call(arguments)))
            }, o.guid = e.guid = e.guid || st.guid++, o) : t
        },
        access: function(e, n, r, i, o, a, s) {
            var u = 0,
                l = e.length,
                c = null == r;
            if ("object" === st.type(r)) {
                o = !0;
                for (u in r) st.access(e, n, u, r[u], !0, a, s)
            } else if (i !== t && (o = !0, st.isFunction(i) || (s = !0), c && (s ? (n.call(e, i), n = null) : (c = n, n = function(e, t, n) {
                    return c.call(st(e), n)
                })), n))
                for (; l > u; u++) n(e[u], r, s ? i : i.call(e[u], u, n(e[u], r)));
            return o ? e : c ? n.call(e) : l ? n(e[0], r) : a
        },
        now: function() {
            return (new Date).getTime()
        }
    }), st.ready.promise = function(t) {
        if (!U)
            if (U = st.Deferred(), "complete" === V.readyState) setTimeout(st.ready);
            else if (V.addEventListener) V.addEventListener("DOMContentLoaded", xt, !1), e.addEventListener("load", st.ready, !1);
        else {
            V.attachEvent("onreadystatechange", xt), e.attachEvent("onload", st.ready);
            var n = !1;
            try {
                n = null == e.frameElement && V.documentElement
            } catch (r) {}
            n && n.doScroll && function i() {
                if (!st.isReady) {
                    try {
                        n.doScroll("left")
                    } catch (e) {
                        return setTimeout(i, 50)
                    }
                    st.ready()
                }
            }()
        }
        return U.promise(t)
    }, st.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(e, t) {
        Q["[object " + t + "]"] = t.toLowerCase()
    }), X = st(V);
    var Tt = {};
    st.Callbacks = function(e) {
        e = "string" == typeof e ? Tt[e] || r(e) : st.extend({}, e);
        var n, i, o, a, s, u, l = [],
            c = !e.once && [],
            f = function(t) {
                for (n = e.memory && t, i = !0, u = a || 0, a = 0, s = l.length, o = !0; l && s > u; u++)
                    if (l[u].apply(t[0], t[1]) === !1 && e.stopOnFalse) {
                        n = !1;
                        break
                    }
                o = !1, l && (c ? c.length && f(c.shift()) : n ? l = [] : p.disable())
            },
            p = {
                add: function() {
                    if (l) {
                        var t = l.length;
                        (function r(t) {
                            st.each(t, function(t, n) {
                                var i = st.type(n);
                                "function" === i ? e.unique && p.has(n) || l.push(n) : n && n.length && "string" !== i && r(n)
                            })
                        })(arguments), o ? s = l.length : n && (a = t, f(n))
                    }
                    return this
                },
                remove: function() {
                    return l && st.each(arguments, function(e, t) {
                        for (var n;
                            (n = st.inArray(t, l, n)) > -1;) l.splice(n, 1), o && (s >= n && s--, u >= n && u--)
                    }), this
                },
                has: function(e) {
                    return st.inArray(e, l) > -1
                },
                empty: function() {
                    return l = [], this
                },
                disable: function() {
                    return l = c = n = t, this
                },
                disabled: function() {
                    return !l
                },
                lock: function() {
                    return c = t, n || p.disable(), this
                },
                locked: function() {
                    return !c
                },
                fireWith: function(e, t) {
                    return t = t || [], t = [e, t.slice ? t.slice() : t], !l || i && !c || (o ? c.push(t) : f(t)), this
                },
                fire: function() {
                    return p.fireWith(this, arguments), this
                },
                fired: function() {
                    return !!i
                }
            };
        return p
    }, st.extend({
        Deferred: function(e) {
            var t = [
                    ["resolve", "done", st.Callbacks("once memory"), "resolved"],
                    ["reject", "fail", st.Callbacks("once memory"), "rejected"],
                    ["notify", "progress", st.Callbacks("memory")]
                ],
                n = "pending",
                r = {
                    state: function() {
                        return n
                    },
                    always: function() {
                        return i.done(arguments).fail(arguments), this
                    },
                    then: function() {
                        var e = arguments;
                        return st.Deferred(function(n) {
                            st.each(t, function(t, o) {
                                var a = o[0],
                                    s = st.isFunction(e[t]) && e[t];
                                i[o[1]](function() {
                                    var e = s && s.apply(this, arguments);
                                    e && st.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[a + "With"](this === r ? n.promise() : this, s ? [e] : arguments)
                                })
                            }), e = null
                        }).promise()
                    },
                    promise: function(e) {
                        return null != e ? st.extend(e, r) : r
                    }
                },
                i = {};
            return r.pipe = r.then, st.each(t, function(e, o) {
                var a = o[2],
                    s = o[3];
                r[o[1]] = a.add, s && a.add(function() {
                    n = s
                }, t[1 ^ e][2].disable, t[2][2].lock), i[o[0]] = function() {
                    return i[o[0] + "With"](this === i ? r : this, arguments), this
                }, i[o[0] + "With"] = a.fireWith
            }), r.promise(i), e && e.call(i, i), i
        },
        when: function(e) {
            var t, n, r, i = 0,
                o = nt.call(arguments),
                a = o.length,
                s = 1 !== a || e && st.isFunction(e.promise) ? a : 0,
                u = 1 === s ? e : st.Deferred(),
                l = function(e, n, r) {
                    return function(i) {
                        n[e] = this, r[e] = arguments.length > 1 ? nt.call(arguments) : i, r === t ? u.notifyWith(n, r) : --s || u.resolveWith(n, r)
                    }
                };
            if (a > 1)
                for (t = Array(a), n = Array(a), r = Array(a); a > i; i++) o[i] && st.isFunction(o[i].promise) ? o[i].promise().done(l(i, r, o)).fail(u.reject).progress(l(i, n, t)) : --s;
            return s || u.resolveWith(r, o), u.promise()
        }
    }), st.support = function() {
        var n, r, i, o, a, s, u, l, c, f, p = V.createElement("div");
        if (p.setAttribute("className", "t"), p.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", r = p.getElementsByTagName("*"), i = p.getElementsByTagName("a")[0], !r || !i || !r.length) return {};
        o = V.createElement("select"), a = o.appendChild(V.createElement("option")), s = p.getElementsByTagName("input")[0], i.style.cssText = "top:1px;float:left;opacity:.5", n = {
            getSetAttribute: "t" !== p.className,
            leadingWhitespace: 3 === p.firstChild.nodeType,
            tbody: !p.getElementsByTagName("tbody").length,
            htmlSerialize: !!p.getElementsByTagName("link").length,
            style: /top/.test(i.getAttribute("style")),
            hrefNormalized: "/a" === i.getAttribute("href"),
            opacity: /^0.5/.test(i.style.opacity),
            cssFloat: !!i.style.cssFloat,
            checkOn: !!s.value,
            optSelected: a.selected,
            enctype: !!V.createElement("form").enctype,
            html5Clone: "<:nav></:nav>" !== V.createElement("nav").cloneNode(!0).outerHTML,
            boxModel: "CSS1Compat" === V.compatMode,
            deleteExpando: !0,
            noCloneEvent: !0,
            inlineBlockNeedsLayout: !1,
            shrinkWrapBlocks: !1,
            reliableMarginRight: !0,
            boxSizingReliable: !0,
            pixelPosition: !1
        }, s.checked = !0, n.noCloneChecked = s.cloneNode(!0).checked, o.disabled = !0, n.optDisabled = !a.disabled;
        try {
            delete p.test
        } catch (d) {
            n.deleteExpando = !1
        }
        s = V.createElement("input"), s.setAttribute("value", ""), n.input = "" === s.getAttribute("value"), s.value = "t", s.setAttribute("type", "radio"), n.radioValue = "t" === s.value, s.setAttribute("checked", "t"), s.setAttribute("name", "t"), u = V.createDocumentFragment(), u.appendChild(s), n.appendChecked = s.checked, n.checkClone = u.cloneNode(!0).cloneNode(!0).lastChild.checked, p.attachEvent && (p.attachEvent("onclick", function() {
            n.noCloneEvent = !1
        }), p.cloneNode(!0).click());
        for (f in {
                submit: !0,
                change: !0,
                focusin: !0
            }) p.setAttribute(l = "on" + f, "t"), n[f + "Bubbles"] = l in e || p.attributes[l].expando === !1;
        return p.style.backgroundClip = "content-box", p.cloneNode(!0).style.backgroundClip = "", n.clearCloneStyle = "content-box" === p.style.backgroundClip, st(function() {
            var r, i, o, a = "padding:0;margin:0;border:0;display:block;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;",
                s = V.getElementsByTagName("body")[0];
            s && (r = V.createElement("div"), r.style.cssText = "border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px", s.appendChild(r).appendChild(p), p.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", o = p.getElementsByTagName("td"), o[0].style.cssText = "padding:0;margin:0;border:0;display:none", c = 0 === o[0].offsetHeight, o[0].style.display = "", o[1].style.display = "none", n.reliableHiddenOffsets = c && 0 === o[0].offsetHeight, p.innerHTML = "", p.style.cssText = "box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;", n.boxSizing = 4 === p.offsetWidth, n.doesNotIncludeMarginInBodyOffset = 1 !== s.offsetTop, e.getComputedStyle && (n.pixelPosition = "1%" !== (e.getComputedStyle(p, null) || {}).top, n.boxSizingReliable = "4px" === (e.getComputedStyle(p, null) || {
                width: "4px"
            }).width, i = p.appendChild(V.createElement("div")), i.style.cssText = p.style.cssText = a, i.style.marginRight = i.style.width = "0", p.style.width = "1px", n.reliableMarginRight = !parseFloat((e.getComputedStyle(i, null) || {}).marginRight)), p.style.zoom !== t && (p.innerHTML = "", p.style.cssText = a + "width:1px;padding:1px;display:inline;zoom:1", n.inlineBlockNeedsLayout = 3 === p.offsetWidth, p.style.display = "block", p.innerHTML = "<div></div>", p.firstChild.style.width = "5px", n.shrinkWrapBlocks = 3 !== p.offsetWidth, s.style.zoom = 1), s.removeChild(r), r = p = o = i = null)
        }), r = o = u = a = i = s = null, n
    }();
    var wt = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/,
        Nt = /([A-Z])/g;
    st.extend({
        cache: {},
        expando: "jQuery" + (Z + Math.random()).replace(/\D/g, ""),
        noData: {
            embed: !0,
            object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
            applet: !0
        },
        hasData: function(e) {
            return e = e.nodeType ? st.cache[e[st.expando]] : e[st.expando], !!e && !s(e)
        },
        data: function(e, t, n) {
            return i(e, t, n, !1)
        },
        removeData: function(e, t) {
            return o(e, t, !1)
        },
        _data: function(e, t, n) {
            return i(e, t, n, !0)
        },
        _removeData: function(e, t) {
            return o(e, t, !0)
        },
        acceptData: function(e) {
            var t = e.nodeName && st.noData[e.nodeName.toLowerCase()];
            return !t || t !== !0 && e.getAttribute("classid") === t
        }
    }), st.fn.extend({
        data: function(e, n) {
            var r, i, o = this[0],
                s = 0,
                u = null;
            if (e === t) {
                if (this.length && (u = st.data(o), 1 === o.nodeType && !st._data(o, "parsedAttrs"))) {
                    for (r = o.attributes; r.length > s; s++) i = r[s].name, i.indexOf("data-") || (i = st.camelCase(i.substring(5)), a(o, i, u[i]));
                    st._data(o, "parsedAttrs", !0)
                }
                return u
            }
            return "object" == typeof e ? this.each(function() {
                st.data(this, e)
            }) : st.access(this, function(n) {
                return n === t ? o ? a(o, e, st.data(o, e)) : null : (this.each(function() {
                    st.data(this, e, n)
                }), t)
            }, null, n, arguments.length > 1, null, !0)
        },
        removeData: function(e) {
            return this.each(function() {
                st.removeData(this, e)
            })
        }
    }), st.extend({
        queue: function(e, n, r) {
            var i;
            return e ? (n = (n || "fx") + "queue", i = st._data(e, n), r && (!i || st.isArray(r) ? i = st._data(e, n, st.makeArray(r)) : i.push(r)), i || []) : t
        },
        dequeue: function(e, t) {
            t = t || "fx";
            var n = st.queue(e, t),
                r = n.length,
                i = n.shift(),
                o = st._queueHooks(e, t),
                a = function() {
                    st.dequeue(e, t)
                };
            "inprogress" === i && (i = n.shift(), r--), o.cur = i, i && ("fx" === t && n.unshift("inprogress"), delete o.stop, i.call(e, a, o)), !r && o && o.empty.fire()
        },
        _queueHooks: function(e, t) {
            var n = t + "queueHooks";
            return st._data(e, n) || st._data(e, n, {
                empty: st.Callbacks("once memory").add(function() {
                    st._removeData(e, t + "queue"), st._removeData(e, n)
                })
            })
        }
    }), st.fn.extend({
        queue: function(e, n) {
            var r = 2;
            return "string" != typeof e && (n = e, e = "fx", r--), r > arguments.length ? st.queue(this[0], e) : n === t ? this : this.each(function() {
                var t = st.queue(this, e, n);
                st._queueHooks(this, e), "fx" === e && "inprogress" !== t[0] && st.dequeue(this, e)
            })
        },
        dequeue: function(e) {
            return this.each(function() {
                st.dequeue(this, e)
            })
        },
        delay: function(e, t) {
            return e = st.fx ? st.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function(t, n) {
                var r = setTimeout(t, e);
                n.stop = function() {
                    clearTimeout(r)
                }
            })
        },
        clearQueue: function(e) {
            return this.queue(e || "fx", [])
        },
        promise: function(e, n) {
            var r, i = 1,
                o = st.Deferred(),
                a = this,
                s = this.length,
                u = function() {
                    --i || o.resolveWith(a, [a])
                };
            for ("string" != typeof e && (n = e, e = t), e = e || "fx"; s--;) r = st._data(a[s], e + "queueHooks"), r && r.empty && (i++, r.empty.add(u));
            return u(), o.promise(n)
        }
    });
    var Ct, kt, Et = /[\t\r\n]/g,
        St = /\r/g,
        At = /^(?:input|select|textarea|button|object)$/i,
        jt = /^(?:a|area)$/i,
        Dt = /^(?:checked|selected|autofocus|autoplay|async|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped)$/i,
        Lt = /^(?:checked|selected)$/i,
        Ht = st.support.getSetAttribute,
        Mt = st.support.input;
    st.fn.extend({
        attr: function(e, t) {
            return st.access(this, st.attr, e, t, arguments.length > 1)
        },
        removeAttr: function(e) {
            return this.each(function() {
                st.removeAttr(this, e)
            })
        },
        prop: function(e, t) {
            return st.access(this, st.prop, e, t, arguments.length > 1)
        },
        removeProp: function(e) {
            return e = st.propFix[e] || e, this.each(function() {
                try {
                    this[e] = t, delete this[e]
                } catch (n) {}
            })
        },
        addClass: function(e) {
            var t, n, r, i, o, a = 0,
                s = this.length,
                u = "string" == typeof e && e;
            if (st.isFunction(e)) return this.each(function(t) {
                st(this).addClass(e.call(this, t, this.className))
            });
            if (u)
                for (t = (e || "").match(lt) || []; s > a; a++)
                    if (n = this[a], r = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(Et, " ") : " ")) {
                        for (o = 0; i = t[o++];) 0 > r.indexOf(" " + i + " ") && (r += i + " ");
                        n.className = st.trim(r)
                    }
            return this
        },
        removeClass: function(e) {
            var t, n, r, i, o, a = 0,
                s = this.length,
                u = 0 === arguments.length || "string" == typeof e && e;
            if (st.isFunction(e)) return this.each(function(t) {
                st(this).removeClass(e.call(this, t, this.className))
            });
            if (u)
                for (t = (e || "").match(lt) || []; s > a; a++)
                    if (n = this[a], r = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(Et, " ") : "")) {
                        for (o = 0; i = t[o++];)
                            for (; r.indexOf(" " + i + " ") >= 0;) r = r.replace(" " + i + " ", " ");
                        n.className = e ? st.trim(r) : ""
                    }
            return this
        },
        toggleClass: function(e, t) {
            var n = typeof e,
                r = "boolean" == typeof t;
            return st.isFunction(e) ? this.each(function(n) {
                st(this).toggleClass(e.call(this, n, this.className, t), t)
            }) : this.each(function() {
                if ("string" === n)
                    for (var i, o = 0, a = st(this), s = t, u = e.match(lt) || []; i = u[o++];) s = r ? s : !a.hasClass(i), a[s ? "addClass" : "removeClass"](i);
                else("undefined" === n || "boolean" === n) && (this.className && st._data(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : st._data(this, "__className__") || "")
            })
        },
        hasClass: function(e) {
            for (var t = " " + e + " ", n = 0, r = this.length; r > n; n++)
                if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(Et, " ").indexOf(t) >= 0) return !0;
            return !1
        },
        val: function(e) {
            var n, r, i, o = this[0]; {
                if (arguments.length) return i = st.isFunction(e), this.each(function(r) {
                    var o, a = st(this);
                    1 === this.nodeType && (o = i ? e.call(this, r, a.val()) : e, null == o ? o = "" : "number" == typeof o ? o += "" : st.isArray(o) && (o = st.map(o, function(e) {
                        return null == e ? "" : e + ""
                    })), n = st.valHooks[this.type] || st.valHooks[this.nodeName.toLowerCase()], n && "set" in n && n.set(this, o, "value") !== t || (this.value = o))
                });
                if (o) return n = st.valHooks[o.type] || st.valHooks[o.nodeName.toLowerCase()], n && "get" in n && (r = n.get(o, "value")) !== t ? r : (r = o.value, "string" == typeof r ? r.replace(St, "") : null == r ? "" : r)
            }
        }
    }), st.extend({
        valHooks: {
            option: {
                get: function(e) {
                    var t = e.attributes.value;
                    return !t || t.specified ? e.value : e.text
                }
            },
            select: {
                get: function(e) {
                    for (var t, n, r = e.options, i = e.selectedIndex, o = "select-one" === e.type || 0 > i, a = o ? null : [], s = o ? i + 1 : r.length, u = 0 > i ? s : o ? i : 0; s > u; u++)
                        if (n = r[u], !(!n.selected && u !== i || (st.support.optDisabled ? n.disabled : null !== n.getAttribute("disabled")) || n.parentNode.disabled && st.nodeName(n.parentNode, "optgroup"))) {
                            if (t = st(n).val(), o) return t;
                            a.push(t)
                        }
                    return a
                },
                set: function(e, t) {
                    var n = st.makeArray(t);
                    return st(e).find("option").each(function() {
                        this.selected = st.inArray(st(this).val(), n) >= 0
                    }), n.length || (e.selectedIndex = -1), n
                }
            }
        },
        attr: function(e, n, r) {
            var i, o, a, s = e.nodeType;
            if (e && 3 !== s && 8 !== s && 2 !== s) return e.getAttribute === t ? st.prop(e, n, r) : (a = 1 !== s || !st.isXMLDoc(e), a && (n = n.toLowerCase(), o = st.attrHooks[n] || (Dt.test(n) ? kt : Ct)), r === t ? o && a && "get" in o && null !== (i = o.get(e, n)) ? i : (e.getAttribute !== t && (i = e.getAttribute(n)), null == i ? t : i) : null !== r ? o && a && "set" in o && (i = o.set(e, r, n)) !== t ? i : (e.setAttribute(n, r + ""), r) : (st.removeAttr(e, n), t))
        },
        removeAttr: function(e, t) {
            var n, r, i = 0,
                o = t && t.match(lt);
            if (o && 1 === e.nodeType)
                for (; n = o[i++];) r = st.propFix[n] || n, Dt.test(n) ? !Ht && Lt.test(n) ? e[st.camelCase("default-" + n)] = e[r] = !1 : e[r] = !1 : st.attr(e, n, ""), e.removeAttribute(Ht ? n : r)
        },
        attrHooks: {
            type: {
                set: function(e, t) {
                    if (!st.support.radioValue && "radio" === t && st.nodeName(e, "input")) {
                        var n = e.value;
                        return e.setAttribute("type", t), n && (e.value = n), t
                    }
                }
            }
        },
        propFix: {
            tabindex: "tabIndex",
            readonly: "readOnly",
            "for": "htmlFor",
            "class": "className",
            maxlength: "maxLength",
            cellspacing: "cellSpacing",
            cellpadding: "cellPadding",
            rowspan: "rowSpan",
            colspan: "colSpan",
            usemap: "useMap",
            frameborder: "frameBorder",
            contenteditable: "contentEditable"
        },
        prop: function(e, n, r) {
            var i, o, a, s = e.nodeType;
            if (e && 3 !== s && 8 !== s && 2 !== s) return a = 1 !== s || !st.isXMLDoc(e), a && (n = st.propFix[n] || n, o = st.propHooks[n]), r !== t ? o && "set" in o && (i = o.set(e, r, n)) !== t ? i : e[n] = r : o && "get" in o && null !== (i = o.get(e, n)) ? i : e[n]
        },
        propHooks: {
            tabIndex: {
                get: function(e) {
                    var n = e.getAttributeNode("tabindex");
                    return n && n.specified ? parseInt(n.value, 10) : At.test(e.nodeName) || jt.test(e.nodeName) && e.href ? 0 : t
                }
            }
        }
    }), kt = {
        get: function(e, n) {
            var r = st.prop(e, n),
                i = "boolean" == typeof r && e.getAttribute(n),
                o = "boolean" == typeof r ? Mt && Ht ? null != i : Lt.test(n) ? e[st.camelCase("default-" + n)] : !!i : e.getAttributeNode(n);
            return o && o.value !== !1 ? n.toLowerCase() : t
        },
        set: function(e, t, n) {
            return t === !1 ? st.removeAttr(e, n) : Mt && Ht || !Lt.test(n) ? e.setAttribute(!Ht && st.propFix[n] || n, n) : e[st.camelCase("default-" + n)] = e[n] = !0, n
        }
    }, Mt && Ht || (st.attrHooks.value = {
        get: function(e, n) {
            var r = e.getAttributeNode(n);
            return st.nodeName(e, "input") ? e.defaultValue : r && r.specified ? r.value : t
        },
        set: function(e, n, r) {
            return st.nodeName(e, "input") ? (e.defaultValue = n, t) : Ct && Ct.set(e, n, r)
        }
    }), Ht || (Ct = st.valHooks.button = {
        get: function(e, n) {
            var r = e.getAttributeNode(n);
            return r && ("id" === n || "name" === n || "coords" === n ? "" !== r.value : r.specified) ? r.value : t
        },
        set: function(e, n, r) {
            var i = e.getAttributeNode(r);
            return i || e.setAttributeNode(i = e.ownerDocument.createAttribute(r)), i.value = n += "", "value" === r || n === e.getAttribute(r) ? n : t
        }
    }, st.attrHooks.contenteditable = {
        get: Ct.get,
        set: function(e, t, n) {
            Ct.set(e, "" === t ? !1 : t, n)
        }
    }, st.each(["width", "height"], function(e, n) {
        st.attrHooks[n] = st.extend(st.attrHooks[n], {
            set: function(e, r) {
                return "" === r ? (e.setAttribute(n, "auto"), r) : t
            }
        })
    })), st.support.hrefNormalized || (st.each(["href", "src", "width", "height"], function(e, n) {
        st.attrHooks[n] = st.extend(st.attrHooks[n], {
            get: function(e) {
                var r = e.getAttribute(n, 2);
                return null == r ? t : r
            }
        })
    }), st.each(["href", "src"], function(e, t) {
        st.propHooks[t] = {
            get: function(e) {
                return e.getAttribute(t, 4)
            }
        }
    })), st.support.style || (st.attrHooks.style = {
        get: function(e) {
            return e.style.cssText || t
        },
        set: function(e, t) {
            return e.style.cssText = t + ""
        }
    }), st.support.optSelected || (st.propHooks.selected = st.extend(st.propHooks.selected, {
        get: function(e) {
            var t = e.parentNode;
            return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
        }
    })), st.support.enctype || (st.propFix.enctype = "encoding"), st.support.checkOn || st.each(["radio", "checkbox"], function() {
        st.valHooks[this] = {
            get: function(e) {
                return null === e.getAttribute("value") ? "on" : e.value
            }
        }
    }), st.each(["radio", "checkbox"], function() {
        st.valHooks[this] = st.extend(st.valHooks[this], {
            set: function(e, n) {
                return st.isArray(n) ? e.checked = st.inArray(st(e).val(), n) >= 0 : t
            }
        })
    });
    var qt = /^(?:input|select|textarea)$/i,
        _t = /^key/,
        Ft = /^(?:mouse|contextmenu)|click/,
        Ot = /^(?:focusinfocus|focusoutblur)$/,
        Bt = /^([^.]*)(?:\.(.+)|)$/;
    st.event = {
            global: {},
            add: function(e, n, r, i, o) {
                var a, s, u, l, c, f, p, d, h, g, m, y = 3 !== e.nodeType && 8 !== e.nodeType && st._data(e);
                if (y) {
                    for (r.handler && (a = r, r = a.handler, o = a.selector), r.guid || (r.guid = st.guid++), (l = y.events) || (l = y.events = {}), (s = y.handle) || (s = y.handle = function(e) {
                            return st === t || e && st.event.triggered === e.type ? t : st.event.dispatch.apply(s.elem, arguments)
                        }, s.elem = e), n = (n || "").match(lt) || [""], c = n.length; c--;) u = Bt.exec(n[c]) || [], h = m = u[1], g = (u[2] || "").split(".").sort(), p = st.event.special[h] || {}, h = (o ? p.delegateType : p.bindType) || h, p = st.event.special[h] || {}, f = st.extend({
                        type: h,
                        origType: m,
                        data: i,
                        handler: r,
                        guid: r.guid,
                        selector: o,
                        needsContext: o && st.expr.match.needsContext.test(o),
                        namespace: g.join(".")
                    }, a), (d = l[h]) || (d = l[h] = [], d.delegateCount = 0, p.setup && p.setup.call(e, i, g, s) !== !1 || (e.addEventListener ? e.addEventListener(h, s, !1) : e.attachEvent && e.attachEvent("on" + h, s))), p.add && (p.add.call(e, f), f.handler.guid || (f.handler.guid = r.guid)), o ? d.splice(d.delegateCount++, 0, f) : d.push(f), st.event.global[h] = !0;
                    e = null
                }
            },
            remove: function(e, t, n, r, i) {
                var o, a, s, u, l, c, f, p, d, h, g, m = st.hasData(e) && st._data(e);
                if (m && (u = m.events)) {
                    for (t = (t || "").match(lt) || [""], l = t.length; l--;)
                        if (s = Bt.exec(t[l]) || [], d = g = s[1], h = (s[2] || "").split(".").sort(), d) {
                            for (f = st.event.special[d] || {}, d = (r ? f.delegateType : f.bindType) || d, p = u[d] || [], s = s[2] && RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"), a = o = p.length; o--;) c = p[o], !i && g !== c.origType || n && n.guid !== c.guid || s && !s.test(c.namespace) || r && r !== c.selector && ("**" !== r || !c.selector) || (p.splice(o, 1), c.selector && p.delegateCount--, f.remove && f.remove.call(e, c));
                            a && !p.length && (f.teardown && f.teardown.call(e, h, m.handle) !== !1 || st.removeEvent(e, d, m.handle), delete u[d])
                        } else
                            for (d in u) st.event.remove(e, d + t[l], n, r, !0);
                    st.isEmptyObject(u) && (delete m.handle, st._removeData(e, "events"))
                }
            },
            trigger: function(n, r, i, o) {
                var a, s, u, l, c, f, p, d = [i || V],
                    h = n.type || n,
                    g = n.namespace ? n.namespace.split(".") : [];
                if (s = u = i = i || V, 3 !== i.nodeType && 8 !== i.nodeType && !Ot.test(h + st.event.triggered) && (h.indexOf(".") >= 0 && (g = h.split("."), h = g.shift(), g.sort()), c = 0 > h.indexOf(":") && "on" + h, n = n[st.expando] ? n : new st.Event(h, "object" == typeof n && n), n.isTrigger = !0, n.namespace = g.join("."), n.namespace_re = n.namespace ? RegExp("(^|\\.)" + g.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, n.result = t, n.target || (n.target = i), r = null == r ? [n] : st.makeArray(r, [n]), p = st.event.special[h] || {}, o || !p.trigger || p.trigger.apply(i, r) !== !1)) {
                    if (!o && !p.noBubble && !st.isWindow(i)) {
                        for (l = p.delegateType || h, Ot.test(l + h) || (s = s.parentNode); s; s = s.parentNode) d.push(s), u = s;
                        u === (i.ownerDocument || V) && d.push(u.defaultView || u.parentWindow || e)
                    }
                    for (a = 0;
                        (s = d[a++]) && !n.isPropagationStopped();) n.type = a > 1 ? l : p.bindType || h, f = (st._data(s, "events") || {})[n.type] && st._data(s, "handle"), f && f.apply(s, r), f = c && s[c], f && st.acceptData(s) && f.apply && f.apply(s, r) === !1 && n.preventDefault();
                    if (n.type = h, !(o || n.isDefaultPrevented() || p._default && p._default.apply(i.ownerDocument, r) !== !1 || "click" === h && st.nodeName(i, "a") || !st.acceptData(i) || !c || !i[h] || st.isWindow(i))) {
                        u = i[c], u && (i[c] = null), st.event.triggered = h;
                        try {
                            i[h]()
                        } catch (m) {}
                        st.event.triggered = t, u && (i[c] = u)
                    }
                    return n.result
                }
            },
            dispatch: function(e) {
                e = st.event.fix(e);
                var n, r, i, o, a, s = [],
                    u = nt.call(arguments),
                    l = (st._data(this, "events") || {})[e.type] || [],
                    c = st.event.special[e.type] || {};
                if (u[0] = e, e.delegateTarget = this, !c.preDispatch || c.preDispatch.call(this, e) !== !1) {
                    for (s = st.event.handlers.call(this, e, l), n = 0;
                        (o = s[n++]) && !e.isPropagationStopped();)
                        for (e.currentTarget = o.elem, r = 0;
                            (a = o.handlers[r++]) && !e.isImmediatePropagationStopped();)(!e.namespace_re || e.namespace_re.test(a.namespace)) && (e.handleObj = a, e.data = a.data, i = ((st.event.special[a.origType] || {}).handle || a.handler).apply(o.elem, u), i !== t && (e.result = i) === !1 && (e.preventDefault(), e.stopPropagation()));
                    return c.postDispatch && c.postDispatch.call(this, e), e.result
                }
            },
            handlers: function(e, n) {
                var r, i, o, a, s = [],
                    u = n.delegateCount,
                    l = e.target;
                if (u && l.nodeType && (!e.button || "click" !== e.type))
                    for (; l != this; l = l.parentNode || this)
                        if (l.disabled !== !0 || "click" !== e.type) {
                            for (i = [], r = 0; u > r; r++) a = n[r], o = a.selector + " ", i[o] === t && (i[o] = a.needsContext ? st(o, this).index(l) >= 0 : st.find(o, this, null, [l]).length), i[o] && i.push(a);
                            i.length && s.push({
                                elem: l,
                                handlers: i
                            })
                        }
                return n.length > u && s.push({
                    elem: this,
                    handlers: n.slice(u)
                }), s
            },
            fix: function(e) {
                if (e[st.expando]) return e;
                var t, n, r = e,
                    i = st.event.fixHooks[e.type] || {},
                    o = i.props ? this.props.concat(i.props) : this.props;
                for (e = new st.Event(r), t = o.length; t--;) n = o[t], e[n] = r[n];
                return e.target || (e.target = r.srcElement || V), 3 === e.target.nodeType && (e.target = e.target.parentNode), e.metaKey = !!e.metaKey, i.filter ? i.filter(e, r) : e
            },
            props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
            fixHooks: {},
            keyHooks: {
                props: "char charCode key keyCode".split(" "),
                filter: function(e, t) {
                    return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e
                }
            },
            mouseHooks: {
                props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
                filter: function(e, n) {
                    var r, i, o, a = n.button,
                        s = n.fromElement;
                    return null == e.pageX && null != n.clientX && (r = e.target.ownerDocument || V, i = r.documentElement, o = r.body, e.pageX = n.clientX + (i && i.scrollLeft || o && o.scrollLeft || 0) - (i && i.clientLeft || o && o.clientLeft || 0), e.pageY = n.clientY + (i && i.scrollTop || o && o.scrollTop || 0) - (i && i.clientTop || o && o.clientTop || 0)), !e.relatedTarget && s && (e.relatedTarget = s === e.target ? n.toElement : s), e.which || a === t || (e.which = 1 & a ? 1 : 2 & a ? 3 : 4 & a ? 2 : 0), e
                }
            },
            special: {
                load: {
                    noBubble: !0
                },
                click: {
                    trigger: function() {
                        return st.nodeName(this, "input") && "checkbox" === this.type && this.click ? (this.click(), !1) : t
                    }
                },
                focus: {
                    trigger: function() {
                        if (this !== V.activeElement && this.focus) try {
                            return this.focus(), !1
                        } catch (e) {}
                    },
                    delegateType: "focusin"
                },
                blur: {
                    trigger: function() {
                        return this === V.activeElement && this.blur ? (this.blur(), !1) : t
                    },
                    delegateType: "focusout"
                },
                beforeunload: {
                    postDispatch: function(e) {
                        e.result !== t && (e.originalEvent.returnValue = e.result)
                    }
                }
            },
            simulate: function(e, t, n, r) {
                var i = st.extend(new st.Event, n, {
                    type: e,
                    isSimulated: !0,
                    originalEvent: {}
                });
                r ? st.event.trigger(i, null, t) : st.event.dispatch.call(t, i), i.isDefaultPrevented() && n.preventDefault()
            }
        }, st.removeEvent = V.removeEventListener ? function(e, t, n) {
            e.removeEventListener && e.removeEventListener(t, n, !1)
        } : function(e, n, r) {
            var i = "on" + n;
            e.detachEvent && (e[i] === t && (e[i] = null), e.detachEvent(i, r))
        }, st.Event = function(e, n) {
            return this instanceof st.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || e.returnValue === !1 || e.getPreventDefault && e.getPreventDefault() ? u : l) : this.type = e, n && st.extend(this, n), this.timeStamp = e && e.timeStamp || st.now(), this[st.expando] = !0, t) : new st.Event(e, n)
        }, st.Event.prototype = {
            isDefaultPrevented: l,
            isPropagationStopped: l,
            isImmediatePropagationStopped: l,
            preventDefault: function() {
                var e = this.originalEvent;
                this.isDefaultPrevented = u, e && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
            },
            stopPropagation: function() {
                var e = this.originalEvent;
                this.isPropagationStopped = u, e && (e.stopPropagation && e.stopPropagation(), e.cancelBubble = !0)
            },
            stopImmediatePropagation: function() {
                this.isImmediatePropagationStopped = u, this.stopPropagation()
            }
        }, st.each({
            mouseenter: "mouseover",
            mouseleave: "mouseout"
        }, function(e, t) {
            st.event.special[e] = {
                delegateType: t,
                bindType: t,
                handle: function(e) {
                    var n, r = this,
                        i = e.relatedTarget,
                        o = e.handleObj;
                    return (!i || i !== r && !st.contains(r, i)) && (e.type = o.origType, n = o.handler.apply(this, arguments), e.type = t), n
                }
            }
        }), st.support.submitBubbles || (st.event.special.submit = {
            setup: function() {
                return st.nodeName(this, "form") ? !1 : (st.event.add(this, "click._submit keypress._submit", function(e) {
                    var n = e.target,
                        r = st.nodeName(n, "input") || st.nodeName(n, "button") ? n.form : t;
                    r && !st._data(r, "submitBubbles") && (st.event.add(r, "submit._submit", function(e) {
                        e._submit_bubble = !0
                    }), st._data(r, "submitBubbles", !0))
                }), t)
            },
            postDispatch: function(e) {
                e._submit_bubble && (delete e._submit_bubble, this.parentNode && !e.isTrigger && st.event.simulate("submit", this.parentNode, e, !0))
            },
            teardown: function() {
                return st.nodeName(this, "form") ? !1 : (st.event.remove(this, "._submit"), t)
            }
        }), st.support.changeBubbles || (st.event.special.change = {
            setup: function() {
                return qt.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (st.event.add(this, "propertychange._change", function(e) {
                    "checked" === e.originalEvent.propertyName && (this._just_changed = !0)
                }), st.event.add(this, "click._change", function(e) {
                    this._just_changed && !e.isTrigger && (this._just_changed = !1), st.event.simulate("change", this, e, !0)
                })), !1) : (st.event.add(this, "beforeactivate._change", function(e) {
                    var t = e.target;
                    qt.test(t.nodeName) && !st._data(t, "changeBubbles") && (st.event.add(t, "change._change", function(e) {
                        !this.parentNode || e.isSimulated || e.isTrigger || st.event.simulate("change", this.parentNode, e, !0)
                    }), st._data(t, "changeBubbles", !0))
                }), t)
            },
            handle: function(e) {
                var n = e.target;
                return this !== n || e.isSimulated || e.isTrigger || "radio" !== n.type && "checkbox" !== n.type ? e.handleObj.handler.apply(this, arguments) : t
            },
            teardown: function() {
                return st.event.remove(this, "._change"), !qt.test(this.nodeName)
            }
        }), st.support.focusinBubbles || st.each({
            focus: "focusin",
            blur: "focusout"
        }, function(e, t) {
            var n = 0,
                r = function(e) {
                    st.event.simulate(t, e.target, st.event.fix(e), !0)
                };
            st.event.special[t] = {
                setup: function() {
                    0 === n++ && V.addEventListener(e, r, !0)
                },
                teardown: function() {
                    0 === --n && V.removeEventListener(e, r, !0)
                }
            }
        }), st.fn.extend({
            on: function(e, n, r, i, o) {
                var a, s;
                if ("object" == typeof e) {
                    "string" != typeof n && (r = r || n, n = t);
                    for (s in e) this.on(s, n, r, e[s], o);
                    return this
                }
                if (null == r && null == i ? (i = n, r = n = t) : null == i && ("string" == typeof n ? (i = r, r = t) : (i = r, r = n, n = t)), i === !1) i = l;
                else if (!i) return this;
                return 1 === o && (a = i, i = function(e) {
                    return st().off(e), a.apply(this, arguments)
                }, i.guid = a.guid || (a.guid = st.guid++)), this.each(function() {
                    st.event.add(this, e, i, r, n)
                })
            },
            one: function(e, t, n, r) {
                return this.on(e, t, n, r, 1)
            },
            off: function(e, n, r) {
                var i, o;
                if (e && e.preventDefault && e.handleObj) return i = e.handleObj, st(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
                if ("object" == typeof e) {
                    for (o in e) this.off(o, n, e[o]);
                    return this
                }
                return (n === !1 || "function" == typeof n) && (r = n, n = t), r === !1 && (r = l), this.each(function() {
                    st.event.remove(this, e, r, n)
                })
            },
            bind: function(e, t, n) {
                return this.on(e, null, t, n)
            },
            unbind: function(e, t) {
                return this.off(e, null, t)
            },
            delegate: function(e, t, n, r) {
                return this.on(t, e, n, r)
            },
            undelegate: function(e, t, n) {
                return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
            },
            trigger: function(e, t) {
                return this.each(function() {
                    st.event.trigger(e, t, this)
                })
            },
            triggerHandler: function(e, n) {
                var r = this[0];
                return r ? st.event.trigger(e, n, r, !0) : t
            },
            hover: function(e, t) {
                return this.mouseenter(e).mouseleave(t || e)
            }
        }), st.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
            st.fn[t] = function(e, n) {
                return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
            }, _t.test(t) && (st.event.fixHooks[t] = st.event.keyHooks), Ft.test(t) && (st.event.fixHooks[t] = st.event.mouseHooks)
        }),
        function(e, t) {
            function n(e) {
                return ht.test(e + "")
            }

            function r() {
                var e, t = [];
                return e = function(n, r) {
                    return t.push(n += " ") > C.cacheLength && delete e[t.shift()], e[n] = r
                }
            }

            function i(e) {
                return e[P] = !0, e
            }

            function o(e) {
                var t = L.createElement("div");
                try {
                    return e(t)
                } catch (n) {
                    return !1
                } finally {
                    t = null
                }
            }

            function a(e, t, n, r) {
                var i, o, a, s, u, l, c, d, h, g;
                if ((t ? t.ownerDocument || t : R) !== L && D(t), t = t || L, n = n || [], !e || "string" != typeof e) return n;
                if (1 !== (s = t.nodeType) && 9 !== s) return [];
                if (!M && !r) {
                    if (i = gt.exec(e))
                        if (a = i[1]) {
                            if (9 === s) {
                                if (o = t.getElementById(a), !o || !o.parentNode) return n;
                                if (o.id === a) return n.push(o), n
                            } else if (t.ownerDocument && (o = t.ownerDocument.getElementById(a)) && O(t, o) && o.id === a) return n.push(o), n
                        } else {
                            if (i[2]) return Q.apply(n, K.call(t.getElementsByTagName(e), 0)), n;
                            if ((a = i[3]) && W.getByClassName && t.getElementsByClassName) return Q.apply(n, K.call(t.getElementsByClassName(a), 0)), n
                        }
                    if (W.qsa && !q.test(e)) {
                        if (c = !0, d = P, h = t, g = 9 === s && e, 1 === s && "object" !== t.nodeName.toLowerCase()) {
                            for (l = f(e), (c = t.getAttribute("id")) ? d = c.replace(vt, "\\$&") : t.setAttribute("id", d), d = "[id='" + d + "'] ", u = l.length; u--;) l[u] = d + p(l[u]);
                            h = dt.test(e) && t.parentNode || t, g = l.join(",")
                        }
                        if (g) try {
                            return Q.apply(n, K.call(h.querySelectorAll(g), 0)), n
                        } catch (m) {} finally {
                            c || t.removeAttribute("id")
                        }
                    }
                }
                return x(e.replace(at, "$1"), t, n, r)
            }

            function s(e, t) {
                for (var n = e && t && e.nextSibling; n; n = n.nextSibling)
                    if (n === t) return -1;
                return e ? 1 : -1
            }

            function u(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return "input" === n && t.type === e
                }
            }

            function l(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return ("input" === n || "button" === n) && t.type === e
                }
            }

            function c(e) {
                return i(function(t) {
                    return t = +t, i(function(n, r) {
                        for (var i, o = e([], n.length, t), a = o.length; a--;) n[i = o[a]] && (n[i] = !(r[i] = n[i]))
                    })
                })
            }

            function f(e, t) {
                var n, r, i, o, s, u, l, c = X[e + " "];
                if (c) return t ? 0 : c.slice(0);
                for (s = e, u = [], l = C.preFilter; s;) {
                    (!n || (r = ut.exec(s))) && (r && (s = s.slice(r[0].length) || s), u.push(i = [])), n = !1, (r = lt.exec(s)) && (n = r.shift(), i.push({
                        value: n,
                        type: r[0].replace(at, " ")
                    }), s = s.slice(n.length));
                    for (o in C.filter) !(r = pt[o].exec(s)) || l[o] && !(r = l[o](r)) || (n = r.shift(), i.push({
                        value: n,
                        type: o,
                        matches: r
                    }), s = s.slice(n.length));
                    if (!n) break
                }
                return t ? s.length : s ? a.error(e) : X(e, u).slice(0)
            }

            function p(e) {
                for (var t = 0, n = e.length, r = ""; n > t; t++) r += e[t].value;
                return r
            }

            function d(e, t, n) {
                var r = t.dir,
                    i = n && "parentNode" === t.dir,
                    o = I++;
                return t.first ? function(t, n, o) {
                    for (; t = t[r];)
                        if (1 === t.nodeType || i) return e(t, n, o)
                } : function(t, n, a) {
                    var s, u, l, c = $ + " " + o;
                    if (a) {
                        for (; t = t[r];)
                            if ((1 === t.nodeType || i) && e(t, n, a)) return !0
                    } else
                        for (; t = t[r];)
                            if (1 === t.nodeType || i)
                                if (l = t[P] || (t[P] = {}), (u = l[r]) && u[0] === c) {
                                    if ((s = u[1]) === !0 || s === N) return s === !0
                                } else if (u = l[r] = [c], u[1] = e(t, n, a) || N, u[1] === !0) return !0
                }
            }

            function h(e) {
                return e.length > 1 ? function(t, n, r) {
                    for (var i = e.length; i--;)
                        if (!e[i](t, n, r)) return !1;
                    return !0
                } : e[0]
            }

            function g(e, t, n, r, i) {
                for (var o, a = [], s = 0, u = e.length, l = null != t; u > s; s++)(o = e[s]) && (!n || n(o, r, i)) && (a.push(o), l && t.push(s));
                return a
            }

            function m(e, t, n, r, o, a) {
                return r && !r[P] && (r = m(r)), o && !o[P] && (o = m(o, a)), i(function(i, a, s, u) {
                    var l, c, f, p = [],
                        d = [],
                        h = a.length,
                        m = i || b(t || "*", s.nodeType ? [s] : s, []),
                        y = !e || !i && t ? m : g(m, p, e, s, u),
                        v = n ? o || (i ? e : h || r) ? [] : a : y;
                    if (n && n(y, v, s, u), r)
                        for (l = g(v, d), r(l, [], s, u), c = l.length; c--;)(f = l[c]) && (v[d[c]] = !(y[d[c]] = f));
                    if (i) {
                        if (o || e) {
                            if (o) {
                                for (l = [], c = v.length; c--;)(f = v[c]) && l.push(y[c] = f);
                                o(null, v = [], l, u)
                            }
                            for (c = v.length; c--;)(f = v[c]) && (l = o ? Z.call(i, f) : p[c]) > -1 && (i[l] = !(a[l] = f))
                        }
                    } else v = g(v === a ? v.splice(h, v.length) : v), o ? o(null, a, v, u) : Q.apply(a, v)
                })
            }

            function y(e) {
                for (var t, n, r, i = e.length, o = C.relative[e[0].type], a = o || C.relative[" "], s = o ? 1 : 0, u = d(function(e) {
                        return e === t
                    }, a, !0), l = d(function(e) {
                        return Z.call(t, e) > -1
                    }, a, !0), c = [function(e, n, r) {
                        return !o && (r || n !== j) || ((t = n).nodeType ? u(e, n, r) : l(e, n, r))
                    }]; i > s; s++)
                    if (n = C.relative[e[s].type]) c = [d(h(c), n)];
                    else {
                        if (n = C.filter[e[s].type].apply(null, e[s].matches), n[P]) {
                            for (r = ++s; i > r && !C.relative[e[r].type]; r++);
                            return m(s > 1 && h(c), s > 1 && p(e.slice(0, s - 1)).replace(at, "$1"), n, r > s && y(e.slice(s, r)), i > r && y(e = e.slice(r)), i > r && p(e))
                        }
                        c.push(n)
                    }
                return h(c)
            }

            function v(e, t) {
                var n = 0,
                    r = t.length > 0,
                    o = e.length > 0,
                    s = function(i, s, u, l, c) {
                        var f, p, d, h = [],
                            m = 0,
                            y = "0",
                            v = i && [],
                            b = null != c,
                            x = j,
                            T = i || o && C.find.TAG("*", c && s.parentNode || s),
                            w = $ += null == x ? 1 : Math.E;
                        for (b && (j = s !== L && s, N = n); null != (f = T[y]); y++) {
                            if (o && f) {
                                for (p = 0; d = e[p]; p++)
                                    if (d(f, s, u)) {
                                        l.push(f);
                                        break
                                    }
                                b && ($ = w, N = ++n)
                            }
                            r && ((f = !d && f) && m--, i && v.push(f))
                        }
                        if (m += y, r && y !== m) {
                            for (p = 0; d = t[p]; p++) d(v, h, s, u);
                            if (i) {
                                if (m > 0)
                                    for (; y--;) v[y] || h[y] || (h[y] = G.call(l));
                                h = g(h)
                            }
                            Q.apply(l, h), b && !i && h.length > 0 && m + t.length > 1 && a.uniqueSort(l)
                        }
                        return b && ($ = w, j = x), v
                    };
                return r ? i(s) : s
            }

            function b(e, t, n) {
                for (var r = 0, i = t.length; i > r; r++) a(e, t[r], n);
                return n
            }

            function x(e, t, n, r) {
                var i, o, a, s, u, l = f(e);
                if (!r && 1 === l.length) {
                    if (o = l[0] = l[0].slice(0), o.length > 2 && "ID" === (a = o[0]).type && 9 === t.nodeType && !M && C.relative[o[1].type]) {
                        if (t = C.find.ID(a.matches[0].replace(xt, Tt), t)[0], !t) return n;
                        e = e.slice(o.shift().value.length)
                    }
                    for (i = pt.needsContext.test(e) ? -1 : o.length - 1; i >= 0 && (a = o[i], !C.relative[s = a.type]); i--)
                        if ((u = C.find[s]) && (r = u(a.matches[0].replace(xt, Tt), dt.test(o[0].type) && t.parentNode || t))) {
                            if (o.splice(i, 1), e = r.length && p(o), !e) return Q.apply(n, K.call(r, 0)), n;
                            break
                        }
                }
                return S(e, l)(r, t, M, n, dt.test(e)), n
            }

            function T() {}
            var w, N, C, k, E, S, A, j, D, L, H, M, q, _, F, O, B, P = "sizzle" + -new Date,
                R = e.document,
                W = {},
                $ = 0,
                I = 0,
                z = r(),
                X = r(),
                U = r(),
                V = typeof t,
                Y = 1 << 31,
                J = [],
                G = J.pop,
                Q = J.push,
                K = J.slice,
                Z = J.indexOf || function(e) {
                    for (var t = 0, n = this.length; n > t; t++)
                        if (this[t] === e) return t;
                    return -1
                },
                et = "[\\x20\\t\\r\\n\\f]",
                tt = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
                nt = tt.replace("w", "w#"),
                rt = "([*^$|!~]?=)",
                it = "\\[" + et + "*(" + tt + ")" + et + "*(?:" + rt + et + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + nt + ")|)|)" + et + "*\\]",
                ot = ":(" + tt + ")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|" + it.replace(3, 8) + ")*)|.*)\\)|)",
                at = RegExp("^" + et + "+|((?:^|[^\\\\])(?:\\\\.)*)" + et + "+$", "g"),
                ut = RegExp("^" + et + "*," + et + "*"),
                lt = RegExp("^" + et + "*([\\x20\\t\\r\\n\\f>+~])" + et + "*"),
                ct = RegExp(ot),
                ft = RegExp("^" + nt + "$"),
                pt = {
                    ID: RegExp("^#(" + tt + ")"),
                    CLASS: RegExp("^\\.(" + tt + ")"),
                    NAME: RegExp("^\\[name=['\"]?(" + tt + ")['\"]?\\]"),
                    TAG: RegExp("^(" + tt.replace("w", "w*") + ")"),
                    ATTR: RegExp("^" + it),
                    PSEUDO: RegExp("^" + ot),
                    CHILD: RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + et + "*(even|odd|(([+-]|)(\\d*)n|)" + et + "*(?:([+-]|)" + et + "*(\\d+)|))" + et + "*\\)|)", "i"),
                    needsContext: RegExp("^" + et + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + et + "*((?:-\\d)?\\d*)" + et + "*\\)|)(?=[^-]|$)", "i")
                },
                dt = /[\x20\t\r\n\f]*[+~]/,
                ht = /\{\s*\[native code\]\s*\}/,
                gt = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                mt = /^(?:input|select|textarea|button)$/i,
                yt = /^h\d$/i,
                vt = /'|\\/g,
                bt = /\=[\x20\t\r\n\f]*([^'"\]]*)[\x20\t\r\n\f]*\]/g,
                xt = /\\([\da-fA-F]{1,6}[\x20\t\r\n\f]?|.)/g,
                Tt = function(e, t) {
                    var n = "0x" + t - 65536;
                    return n !== n ? t : 0 > n ? String.fromCharCode(n + 65536) : String.fromCharCode(55296 | n >> 10, 56320 | 1023 & n)
                };
            try {
                K.call(H.childNodes, 0)[0].nodeType
            } catch (wt) {
                K = function(e) {
                    for (var t, n = []; t = this[e]; e++) n.push(t);
                    return n
                }
            }
            E = a.isXML = function(e) {
                var t = e && (e.ownerDocument || e).documentElement;
                return t ? "HTML" !== t.nodeName : !1
            }, D = a.setDocument = function(e) {
                var r = e ? e.ownerDocument || e : R;
                return r !== L && 9 === r.nodeType && r.documentElement ? (L = r, H = r.documentElement, M = E(r), W.tagNameNoComments = o(function(e) {
                    return e.appendChild(r.createComment("")), !e.getElementsByTagName("*").length
                }), W.attributes = o(function(e) {
                    e.innerHTML = "<select></select>";
                    var t = typeof e.lastChild.getAttribute("multiple");
                    return "boolean" !== t && "string" !== t
                }), W.getByClassName = o(function(e) {
                    return e.innerHTML = "<div class='hidden e'></div><div class='hidden'></div>", e.getElementsByClassName && e.getElementsByClassName("e").length ? (e.lastChild.className = "e", 2 === e.getElementsByClassName("e").length) : !1
                }), W.getByName = o(function(e) {
                    e.id = P + 0, e.innerHTML = "<a name='" + P + "'></a><div name='" + P + "'></div>", H.insertBefore(e, H.firstChild);
                    var t = r.getElementsByName && r.getElementsByName(P).length === 2 + r.getElementsByName(P + 0).length;
                    return W.getIdNotName = !r.getElementById(P), H.removeChild(e), t
                }), C.attrHandle = o(function(e) {
                    return e.innerHTML = "<a href='#'></a>", e.firstChild && typeof e.firstChild.getAttribute !== V && "#" === e.firstChild.getAttribute("href")
                }) ? {} : {
                    href: function(e) {
                        return e.getAttribute("href", 2)
                    },
                    type: function(e) {
                        return e.getAttribute("type")
                    }
                }, W.getIdNotName ? (C.find.ID = function(e, t) {
                    if (typeof t.getElementById !== V && !M) {
                        var n = t.getElementById(e);
                        return n && n.parentNode ? [n] : []
                    }
                }, C.filter.ID = function(e) {
                    var t = e.replace(xt, Tt);
                    return function(e) {
                        return e.getAttribute("id") === t
                    }
                }) : (C.find.ID = function(e, n) {
                    if (typeof n.getElementById !== V && !M) {
                        var r = n.getElementById(e);
                        return r ? r.id === e || typeof r.getAttributeNode !== V && r.getAttributeNode("id").value === e ? [r] : t : []
                    }
                }, C.filter.ID = function(e) {
                    var t = e.replace(xt, Tt);
                    return function(e) {
                        var n = typeof e.getAttributeNode !== V && e.getAttributeNode("id");
                        return n && n.value === t
                    }
                }), C.find.TAG = W.tagNameNoComments ? function(e, n) {
                    return typeof n.getElementsByTagName !== V ? n.getElementsByTagName(e) : t
                } : function(e, t) {
                    var n, r = [],
                        i = 0,
                        o = t.getElementsByTagName(e);
                    if ("*" === e) {
                        for (; n = o[i]; i++) 1 === n.nodeType && r.push(n);
                        return r
                    }
                    return o
                }, C.find.NAME = W.getByName && function(e, n) {
                    return typeof n.getElementsByName !== V ? n.getElementsByName(name) : t
                }, C.find.CLASS = W.getByClassName && function(e, n) {
                    return typeof n.getElementsByClassName === V || M ? t : n.getElementsByClassName(e)
                }, _ = [], q = [":focus"], (W.qsa = n(r.querySelectorAll)) && (o(function(e) {
                    e.innerHTML = "<select><option selected=''></option></select>", e.querySelectorAll("[selected]").length || q.push("\\[" + et + "*(?:checked|disabled|ismap|multiple|readonly|selected|value)"), e.querySelectorAll(":checked").length || q.push(":checked")
                }), o(function(e) {
                    e.innerHTML = "<input type='hidden' i=''/>", e.querySelectorAll("[i^='']").length && q.push("[*^$]=" + et + "*(?:\"\"|'')"), e.querySelectorAll(":enabled").length || q.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), q.push(",.*:")
                })), (W.matchesSelector = n(F = H.matchesSelector || H.mozMatchesSelector || H.webkitMatchesSelector || H.oMatchesSelector || H.msMatchesSelector)) && o(function(e) {
                    W.disconnectedMatch = F.call(e, "div"), F.call(e, "[s!='']:x"), _.push("!=", ot)
                }), q = RegExp(q.join("|")), _ = RegExp(_.join("|")), O = n(H.contains) || H.compareDocumentPosition ? function(e, t) {
                    var n = 9 === e.nodeType ? e.documentElement : e,
                        r = t && t.parentNode;
                    return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)))
                } : function(e, t) {
                    if (t)
                        for (; t = t.parentNode;)
                            if (t === e) return !0;
                    return !1
                }, B = H.compareDocumentPosition ? function(e, t) {
                    var n;
                    return e === t ? (A = !0, 0) : (n = t.compareDocumentPosition && e.compareDocumentPosition && e.compareDocumentPosition(t)) ? 1 & n || e.parentNode && 11 === e.parentNode.nodeType ? e === r || O(R, e) ? -1 : t === r || O(R, t) ? 1 : 0 : 4 & n ? -1 : 1 : e.compareDocumentPosition ? -1 : 1
                } : function(e, t) {
                    var n, i = 0,
                        o = e.parentNode,
                        a = t.parentNode,
                        u = [e],
                        l = [t];
                    if (e === t) return A = !0, 0;
                    if (e.sourceIndex && t.sourceIndex) return (~t.sourceIndex || Y) - (O(R, e) && ~e.sourceIndex || Y);
                    if (!o || !a) return e === r ? -1 : t === r ? 1 : o ? -1 : a ? 1 : 0;
                    if (o === a) return s(e, t);
                    for (n = e; n = n.parentNode;) u.unshift(n);
                    for (n = t; n = n.parentNode;) l.unshift(n);
                    for (; u[i] === l[i];) i++;
                    return i ? s(u[i], l[i]) : u[i] === R ? -1 : l[i] === R ? 1 : 0
                }, A = !1, [0, 0].sort(B), W.detectDuplicates = A, L) : L
            }, a.matches = function(e, t) {
                return a(e, null, null, t)
            }, a.matchesSelector = function(e, t) {
                if ((e.ownerDocument || e) !== L && D(e), t = t.replace(bt, "='$1']"), !(!W.matchesSelector || M || _ && _.test(t) || q.test(t))) try {
                    var n = F.call(e, t);
                    if (n || W.disconnectedMatch || e.document && 11 !== e.document.nodeType) return n
                } catch (r) {}
                return a(t, L, null, [e]).length > 0
            }, a.contains = function(e, t) {
                return (e.ownerDocument || e) !== L && D(e), O(e, t)
            }, a.attr = function(e, t) {
                var n;
                return (e.ownerDocument || e) !== L && D(e), M || (t = t.toLowerCase()), (n = C.attrHandle[t]) ? n(e) : M || W.attributes ? e.getAttribute(t) : ((n = e.getAttributeNode(t)) || e.getAttribute(t)) && e[t] === !0 ? t : n && n.specified ? n.value : null
            }, a.error = function(e) {
                throw Error("Syntax error, unrecognized expression: " + e)
            }, a.uniqueSort = function(e) {
                var t, n = [],
                    r = 1,
                    i = 0;
                if (A = !W.detectDuplicates, e.sort(B), A) {
                    for (; t = e[r]; r++) t === e[r - 1] && (i = n.push(r));
                    for (; i--;) e.splice(n[i], 1)
                }
                return e
            }, k = a.getText = function(e) {
                var t, n = "",
                    r = 0,
                    i = e.nodeType;
                if (i) {
                    if (1 === i || 9 === i || 11 === i) {
                        if ("string" == typeof e.textContent) return e.textContent;
                        for (e = e.firstChild; e; e = e.nextSibling) n += k(e)
                    } else if (3 === i || 4 === i) return e.nodeValue
                } else
                    for (; t = e[r]; r++) n += k(t);
                return n
            }, C = a.selectors = {
                cacheLength: 50,
                createPseudo: i,
                match: pt,
                find: {},
                relative: {
                    ">": {
                        dir: "parentNode",
                        first: !0
                    },
                    " ": {
                        dir: "parentNode"
                    },
                    "+": {
                        dir: "previousSibling",
                        first: !0
                    },
                    "~": {
                        dir: "previousSibling"
                    }
                },
                preFilter: {
                    ATTR: function(e) {
                        return e[1] = e[1].replace(xt, Tt), e[3] = (e[4] || e[5] || "").replace(xt, Tt), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                    },
                    CHILD: function(e) {
                        return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || a.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && a.error(e[0]), e
                    },
                    PSEUDO: function(e) {
                        var t, n = !e[5] && e[2];
                        return pt.CHILD.test(e[0]) ? null : (e[4] ? e[2] = e[4] : n && ct.test(n) && (t = f(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
                    }
                },
                filter: {
                    TAG: function(e) {
                        return "*" === e ? function() {
                            return !0
                        } : (e = e.replace(xt, Tt).toLowerCase(), function(t) {
                            return t.nodeName && t.nodeName.toLowerCase() === e
                        })
                    },
                    CLASS: function(e) {
                        var t = z[e + " "];
                        return t || (t = RegExp("(^|" + et + ")" + e + "(" + et + "|$)")) && z(e, function(e) {
                            return t.test(e.className || typeof e.getAttribute !== V && e.getAttribute("class") || "")
                        })
                    },
                    ATTR: function(e, t, n) {
                        return function(r) {
                            var i = a.attr(r, e);
                            return null == i ? "!=" === t : t ? (i += "", "=" === t ? i === n : "!=" === t ? i !== n : "^=" === t ? n && 0 === i.indexOf(n) : "*=" === t ? n && i.indexOf(n) > -1 : "$=" === t ? n && i.substr(i.length - n.length) === n : "~=" === t ? (" " + i + " ").indexOf(n) > -1 : "|=" === t ? i === n || i.substr(0, n.length + 1) === n + "-" : !1) : !0
                        }
                    },
                    CHILD: function(e, t, n, r, i) {
                        var o = "nth" !== e.slice(0, 3),
                            a = "last" !== e.slice(-4),
                            s = "of-type" === t;
                        return 1 === r && 0 === i ? function(e) {
                            return !!e.parentNode
                        } : function(t, n, u) {
                            var l, c, f, p, d, h, g = o !== a ? "nextSibling" : "previousSibling",
                                m = t.parentNode,
                                y = s && t.nodeName.toLowerCase(),
                                v = !u && !s;
                            if (m) {
                                if (o) {
                                    for (; g;) {
                                        for (f = t; f = f[g];)
                                            if (s ? f.nodeName.toLowerCase() === y : 1 === f.nodeType) return !1;
                                        h = g = "only" === e && !h && "nextSibling"
                                    }
                                    return !0
                                }
                                if (h = [a ? m.firstChild : m.lastChild], a && v) {
                                    for (c = m[P] || (m[P] = {}), l = c[e] || [], d = l[0] === $ && l[1], p = l[0] === $ && l[2], f = d && m.childNodes[d]; f = ++d && f && f[g] || (p = d = 0) || h.pop();)
                                        if (1 === f.nodeType && ++p && f === t) {
                                            c[e] = [$, d, p];
                                            break
                                        }
                                } else if (v && (l = (t[P] || (t[P] = {}))[e]) && l[0] === $) p = l[1];
                                else
                                    for (;
                                        (f = ++d && f && f[g] || (p = d = 0) || h.pop()) && ((s ? f.nodeName.toLowerCase() !== y : 1 !== f.nodeType) || !++p || (v && ((f[P] || (f[P] = {}))[e] = [$, p]), f !== t)););
                                return p -= i, p === r || 0 === p % r && p / r >= 0
                            }
                        }
                    },
                    PSEUDO: function(e, t) {
                        var n, r = C.pseudos[e] || C.setFilters[e.toLowerCase()] || a.error("unsupported pseudo: " + e);
                        return r[P] ? r(t) : r.length > 1 ? (n = [e, e, "", t], C.setFilters.hasOwnProperty(e.toLowerCase()) ? i(function(e, n) {
                            for (var i, o = r(e, t), a = o.length; a--;) i = Z.call(e, o[a]), e[i] = !(n[i] = o[a])
                        }) : function(e) {
                            return r(e, 0, n)
                        }) : r
                    }
                },
                pseudos: {
                    not: i(function(e) {
                        var t = [],
                            n = [],
                            r = S(e.replace(at, "$1"));
                        return r[P] ? i(function(e, t, n, i) {
                            for (var o, a = r(e, null, i, []), s = e.length; s--;)(o = a[s]) && (e[s] = !(t[s] = o))
                        }) : function(e, i, o) {
                            return t[0] = e, r(t, null, o, n), !n.pop()
                        }
                    }),
                    has: i(function(e) {
                        return function(t) {
                            return a(e, t).length > 0
                        }
                    }),
                    contains: i(function(e) {
                        return function(t) {
                            return (t.textContent || t.innerText || k(t)).indexOf(e) > -1
                        }
                    }),
                    lang: i(function(e) {
                        return ft.test(e || "") || a.error("unsupported lang: " + e), e = e.replace(xt, Tt).toLowerCase(),
                            function(t) {
                                var n;
                                do
                                    if (n = M ? t.getAttribute("xml:lang") || t.getAttribute("lang") : t.lang) return n = n.toLowerCase(), n === e || 0 === n.indexOf(e + "-");
                                while ((t = t.parentNode) && 1 === t.nodeType);
                                return !1
                            }
                    }),
                    target: function(t) {
                        var n = e.location && e.location.hash;
                        return n && n.slice(1) === t.id
                    },
                    root: function(e) {
                        return e === H
                    },
                    focus: function(e) {
                        return e === L.activeElement && (!L.hasFocus || L.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                    },
                    enabled: function(e) {
                        return e.disabled === !1
                    },
                    disabled: function(e) {
                        return e.disabled === !0
                    },
                    checked: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return "input" === t && !!e.checked || "option" === t && !!e.selected
                    },
                    selected: function(e) {
                        return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
                    },
                    empty: function(e) {
                        for (e = e.firstChild; e; e = e.nextSibling)
                            if (e.nodeName > "@" || 3 === e.nodeType || 4 === e.nodeType) return !1;
                        return !0
                    },
                    parent: function(e) {
                        return !C.pseudos.empty(e)
                    },
                    header: function(e) {
                        return yt.test(e.nodeName)
                    },
                    input: function(e) {
                        return mt.test(e.nodeName)
                    },
                    button: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return "input" === t && "button" === e.type || "button" === t
                    },
                    text: function(e) {
                        var t;
                        return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || t.toLowerCase() === e.type)
                    },
                    first: c(function() {
                        return [0]
                    }),
                    last: c(function(e, t) {
                        return [t - 1]
                    }),
                    eq: c(function(e, t, n) {
                        return [0 > n ? n + t : n]
                    }),
                    even: c(function(e, t) {
                        for (var n = 0; t > n; n += 2) e.push(n);
                        return e
                    }),
                    odd: c(function(e, t) {
                        for (var n = 1; t > n; n += 2) e.push(n);
                        return e
                    }),
                    lt: c(function(e, t, n) {
                        for (var r = 0 > n ? n + t : n; --r >= 0;) e.push(r);
                        return e
                    }),
                    gt: c(function(e, t, n) {
                        for (var r = 0 > n ? n + t : n; t > ++r;) e.push(r);
                        return e
                    })
                }
            };
            for (w in {
                    radio: !0,
                    checkbox: !0,
                    file: !0,
                    password: !0,
                    image: !0
                }) C.pseudos[w] = u(w);
            for (w in {
                    submit: !0,
                    reset: !0
                }) C.pseudos[w] = l(w);
            S = a.compile = function(e, t) {
                var n, r = [],
                    i = [],
                    o = U[e + " "];
                if (!o) {
                    for (t || (t = f(e)), n = t.length; n--;) o = y(t[n]), o[P] ? r.push(o) : i.push(o);
                    o = U(e, v(i, r))
                }
                return o
            }, C.pseudos.nth = C.pseudos.eq, C.filters = T.prototype = C.pseudos, C.setFilters = new T, D(), a.attr = st.attr, st.find = a, st.expr = a.selectors, st.expr[":"] = st.expr.pseudos, st.unique = a.uniqueSort, st.text = a.getText, st.isXMLDoc = a.isXML, st.contains = a.contains
        }(e);
    var Pt = /Until$/,
        Rt = /^(?:parents|prev(?:Until|All))/,
        Wt = /^.[^:#\[\.,]*$/,
        $t = st.expr.match.needsContext,
        It = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };
    st.fn.extend({
        find: function(e) {
            var t, n, r;
            if ("string" != typeof e) return r = this, this.pushStack(st(e).filter(function() {
                for (t = 0; r.length > t; t++)
                    if (st.contains(r[t], this)) return !0
            }));
            for (n = [], t = 0; this.length > t; t++) st.find(e, this[t], n);
            return n = this.pushStack(st.unique(n)), n.selector = (this.selector ? this.selector + " " : "") + e, n
        },
        has: function(e) {
            var t, n = st(e, this),
                r = n.length;
            return this.filter(function() {
                for (t = 0; r > t; t++)
                    if (st.contains(this, n[t])) return !0
            })
        },
        not: function(e) {
            return this.pushStack(f(this, e, !1))
        },
        filter: function(e) {
            return this.pushStack(f(this, e, !0))
        },
        is: function(e) {
            return !!e && ("string" == typeof e ? $t.test(e) ? st(e, this.context).index(this[0]) >= 0 : st.filter(e, this).length > 0 : this.filter(e).length > 0)
        },
        closest: function(e, t) {
            for (var n, r = 0, i = this.length, o = [], a = $t.test(e) || "string" != typeof e ? st(e, t || this.context) : 0; i > r; r++)
                for (n = this[r]; n && n.ownerDocument && n !== t && 11 !== n.nodeType;) {
                    if (a ? a.index(n) > -1 : st.find.matchesSelector(n, e)) {
                        o.push(n);
                        break
                    }
                    n = n.parentNode
                }
            return this.pushStack(o.length > 1 ? st.unique(o) : o)
        },
        index: function(e) {
            return e ? "string" == typeof e ? st.inArray(this[0], st(e)) : st.inArray(e.jquery ? e[0] : e, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        },
        add: function(e, t) {
            var n = "string" == typeof e ? st(e, t) : st.makeArray(e && e.nodeType ? [e] : e),
                r = st.merge(this.get(), n);
            return this.pushStack(st.unique(r))
        },
        addBack: function(e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
        }
    }), st.fn.andSelf = st.fn.addBack, st.each({
        parent: function(e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null
        },
        parents: function(e) {
            return st.dir(e, "parentNode")
        },
        parentsUntil: function(e, t, n) {
            return st.dir(e, "parentNode", n)
        },
        next: function(e) {
            return c(e, "nextSibling")
        },
        prev: function(e) {
            return c(e, "previousSibling")
        },
        nextAll: function(e) {
            return st.dir(e, "nextSibling")
        },
        prevAll: function(e) {
            return st.dir(e, "previousSibling")
        },
        nextUntil: function(e, t, n) {
            return st.dir(e, "nextSibling", n)
        },
        prevUntil: function(e, t, n) {
            return st.dir(e, "previousSibling", n)
        },
        siblings: function(e) {
            return st.sibling((e.parentNode || {}).firstChild, e)
        },
        children: function(e) {
            return st.sibling(e.firstChild)
        },
        contents: function(e) {
            return st.nodeName(e, "iframe") ? e.contentDocument || e.contentWindow.document : st.merge([], e.childNodes)
        }
    }, function(e, t) {
        st.fn[e] = function(n, r) {
            var i = st.map(this, t, n);
            return Pt.test(e) || (r = n), r && "string" == typeof r && (i = st.filter(r, i)), i = this.length > 1 && !It[e] ? st.unique(i) : i, this.length > 1 && Rt.test(e) && (i = i.reverse()), this.pushStack(i)
        }
    }), st.extend({
        filter: function(e, t, n) {
            return n && (e = ":not(" + e + ")"), 1 === t.length ? st.find.matchesSelector(t[0], e) ? [t[0]] : [] : st.find.matches(e, t)
        },
        dir: function(e, n, r) {
            for (var i = [], o = e[n]; o && 9 !== o.nodeType && (r === t || 1 !== o.nodeType || !st(o).is(r));) 1 === o.nodeType && i.push(o), o = o[n];
            return i
        },
        sibling: function(e, t) {
            for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
            return n
        }
    });
    var zt = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
        Xt = / jQuery\d+="(?:null|\d+)"/g,
        Ut = RegExp("<(?:" + zt + ")[\\s/>]", "i"),
        Vt = /^\s+/,
        Yt = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
        Jt = /<([\w:]+)/,
        Gt = /<tbody/i,
        Qt = /<|&#?\w+;/,
        Kt = /<(?:script|style|link)/i,
        Zt = /^(?:checkbox|radio)$/i,
        en = /checked\s*(?:[^=]|=\s*.checked.)/i,
        tn = /^$|\/(?:java|ecma)script/i,
        nn = /^true\/(.*)/,
        rn = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
        on = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            legend: [1, "<fieldset>", "</fieldset>"],
            area: [1, "<map>", "</map>"],
            param: [1, "<object>", "</object>"],
            thead: [1, "<table>", "</table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: st.support.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
        },
        an = p(V),
        sn = an.appendChild(V.createElement("div"));
    on.optgroup = on.option, on.tbody = on.tfoot = on.colgroup = on.caption = on.thead, on.th = on.td, st.fn.extend({
        text: function(e) {
            return st.access(this, function(e) {
                return e === t ? st.text(this) : this.empty().append((this[0] && this[0].ownerDocument || V).createTextNode(e))
            }, null, e, arguments.length)
        },
        wrapAll: function(e) {
            if (st.isFunction(e)) return this.each(function(t) {
                st(this).wrapAll(e.call(this, t))
            });
            if (this[0]) {
                var t = st(e, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                    for (var e = this; e.firstChild && 1 === e.firstChild.nodeType;) e = e.firstChild;
                    return e
                }).append(this)
            }
            return this
        },
        wrapInner: function(e) {
            return st.isFunction(e) ? this.each(function(t) {
                st(this).wrapInner(e.call(this, t))
            }) : this.each(function() {
                var t = st(this),
                    n = t.contents();
                n.length ? n.wrapAll(e) : t.append(e)
            })
        },
        wrap: function(e) {
            var t = st.isFunction(e);
            return this.each(function(n) {
                st(this).wrapAll(t ? e.call(this, n) : e)
            })
        },
        unwrap: function() {
            return this.parent().each(function() {
                st.nodeName(this, "body") || st(this).replaceWith(this.childNodes)
            }).end()
        },
        append: function() {
            return this.domManip(arguments, !0, function(e) {
                (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) && this.appendChild(e)
            })
        },
        prepend: function() {
            return this.domManip(arguments, !0, function(e) {
                (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) && this.insertBefore(e, this.firstChild)
            })
        },
        before: function() {
            return this.domManip(arguments, !1, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this)
            })
        },
        after: function() {
            return this.domManip(arguments, !1, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
            })
        },
        remove: function(e, t) {
            for (var n, r = 0; null != (n = this[r]); r++)(!e || st.filter(e, [n]).length > 0) && (t || 1 !== n.nodeType || st.cleanData(b(n)), n.parentNode && (t && st.contains(n.ownerDocument, n) && m(b(n, "script")), n.parentNode.removeChild(n)));
            return this
        },
        empty: function() {
            for (var e, t = 0; null != (e = this[t]); t++) {
                for (1 === e.nodeType && st.cleanData(b(e, !1)); e.firstChild;) e.removeChild(e.firstChild);
                e.options && st.nodeName(e, "select") && (e.options.length = 0)
            }
            return this
        },
        clone: function(e, t) {
            return e = null == e ? !1 : e, t = null == t ? e : t, this.map(function() {
                return st.clone(this, e, t)
            })
        },
        html: function(e) {
            return st.access(this, function(e) {
                var n = this[0] || {},
                    r = 0,
                    i = this.length;
                if (e === t) return 1 === n.nodeType ? n.innerHTML.replace(Xt, "") : t;
                if (!("string" != typeof e || Kt.test(e) || !st.support.htmlSerialize && Ut.test(e) || !st.support.leadingWhitespace && Vt.test(e) || on[(Jt.exec(e) || ["", ""])[1].toLowerCase()])) {
                    e = e.replace(Yt, "<$1></$2>");
                    try {
                        for (; i > r; r++) n = this[r] || {}, 1 === n.nodeType && (st.cleanData(b(n, !1)), n.innerHTML = e);
                        n = 0
                    } catch (o) {}
                }
                n && this.empty().append(e)
            }, null, e, arguments.length)
        },
        replaceWith: function(e) {
            var t = st.isFunction(e);
            return t || "string" == typeof e || (e = st(e).not(this).detach()), this.domManip([e], !0, function(e) {
                var t = this.nextSibling,
                    n = this.parentNode;
                (n && 1 === this.nodeType || 11 === this.nodeType) && (st(this).remove(), t ? t.parentNode.insertBefore(e, t) : n.appendChild(e))
            })
        },
        detach: function(e) {
            return this.remove(e, !0)
        },
        domManip: function(e, n, r) {
            e = et.apply([], e);
            var i, o, a, s, u, l, c = 0,
                f = this.length,
                p = this,
                m = f - 1,
                y = e[0],
                v = st.isFunction(y);
            if (v || !(1 >= f || "string" != typeof y || st.support.checkClone) && en.test(y)) return this.each(function(i) {
                var o = p.eq(i);
                v && (e[0] = y.call(this, i, n ? o.html() : t)), o.domManip(e, n, r)
            });
            if (f && (i = st.buildFragment(e, this[0].ownerDocument, !1, this), o = i.firstChild, 1 === i.childNodes.length && (i = o), o)) {
                for (n = n && st.nodeName(o, "tr"), a = st.map(b(i, "script"), h), s = a.length; f > c; c++) u = i, c !== m && (u = st.clone(u, !0, !0), s && st.merge(a, b(u, "script"))), r.call(n && st.nodeName(this[c], "table") ? d(this[c], "tbody") : this[c], u, c);
                if (s)
                    for (l = a[a.length - 1].ownerDocument, st.map(a, g), c = 0; s > c; c++) u = a[c], tn.test(u.type || "") && !st._data(u, "globalEval") && st.contains(l, u) && (u.src ? st.ajax({
                        url: u.src,
                        type: "GET",
                        dataType: "script",
                        async: !1,
                        global: !1,
                        "throws": !0
                    }) : st.globalEval((u.text || u.textContent || u.innerHTML || "").replace(rn, "")));
                i = o = null
            }
            return this
        }
    }), st.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function(e, t) {
        st.fn[e] = function(e) {
            for (var n, r = 0, i = [], o = st(e), a = o.length - 1; a >= r; r++) n = r === a ? this : this.clone(!0), st(o[r])[t](n), tt.apply(i, n.get());
            return this.pushStack(i)
        }
    }), st.extend({
        clone: function(e, t, n) {
            var r, i, o, a, s, u = st.contains(e.ownerDocument, e);
            if (st.support.html5Clone || st.isXMLDoc(e) || !Ut.test("<" + e.nodeName + ">") ? s = e.cloneNode(!0) : (sn.innerHTML = e.outerHTML, sn.removeChild(s = sn.firstChild)), !(st.support.noCloneEvent && st.support.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || st.isXMLDoc(e)))
                for (r = b(s), i = b(e), a = 0; null != (o = i[a]); ++a) r[a] && v(o, r[a]);
            if (t)
                if (n)
                    for (i = i || b(e), r = r || b(s), a = 0; null != (o = i[a]); a++) y(o, r[a]);
                else y(e, s);
            return r = b(s, "script"), r.length > 0 && m(r, !u && b(e, "script")), r = i = o = null, s
        },
        buildFragment: function(e, t, n, r) {
            for (var i, o, a, s, u, l, c, f = e.length, d = p(t), h = [], g = 0; f > g; g++)
                if (o = e[g], o || 0 === o)
                    if ("object" === st.type(o)) st.merge(h, o.nodeType ? [o] : o);
                    else if (Qt.test(o)) {
                for (s = s || d.appendChild(t.createElement("div")), a = (Jt.exec(o) || ["", ""])[1].toLowerCase(), u = on[a] || on._default, s.innerHTML = u[1] + o.replace(Yt, "<$1></$2>") + u[2], c = u[0]; c--;) s = s.lastChild;
                if (!st.support.leadingWhitespace && Vt.test(o) && h.push(t.createTextNode(Vt.exec(o)[0])), !st.support.tbody)
                    for (o = "table" !== a || Gt.test(o) ? "<table>" !== u[1] || Gt.test(o) ? 0 : s : s.firstChild, c = o && o.childNodes.length; c--;) st.nodeName(l = o.childNodes[c], "tbody") && !l.childNodes.length && o.removeChild(l);
                for (st.merge(h, s.childNodes), s.textContent = ""; s.firstChild;) s.removeChild(s.firstChild);
                s = d.lastChild
            } else h.push(t.createTextNode(o));
            for (s && d.removeChild(s), st.support.appendChecked || st.grep(b(h, "input"), x), g = 0; o = h[g++];)
                if ((!r || -1 === st.inArray(o, r)) && (i = st.contains(o.ownerDocument, o), s = b(d.appendChild(o), "script"), i && m(s), n))
                    for (c = 0; o = s[c++];) tn.test(o.type || "") && n.push(o);
            return s = null, d
        },
        cleanData: function(e, n) {
            for (var r, i, o, a, s = 0, u = st.expando, l = st.cache, c = st.support.deleteExpando, f = st.event.special; null != (o = e[s]); s++)
                if ((n || st.acceptData(o)) && (i = o[u], r = i && l[i])) {
                    if (r.events)
                        for (a in r.events) f[a] ? st.event.remove(o, a) : st.removeEvent(o, a, r.handle);
                    l[i] && (delete l[i], c ? delete o[u] : o.removeAttribute !== t ? o.removeAttribute(u) : o[u] = null, K.push(i))
                }
        }
    });
    var un, ln, cn, fn = /alpha\([^)]*\)/i,
        pn = /opacity\s*=\s*([^)]*)/,
        dn = /^(top|right|bottom|left)$/,
        hn = /^(none|table(?!-c[ea]).+)/,
        gn = /^margin/,
        mn = RegExp("^(" + ut + ")(.*)$", "i"),
        yn = RegExp("^(" + ut + ")(?!px)[a-z%]+$", "i"),
        vn = RegExp("^([+-])=(" + ut + ")", "i"),
        bn = {
            BODY: "block"
        },
        xn = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        },
        Tn = {
            letterSpacing: 0,
            fontWeight: 400
        },
        wn = ["Top", "Right", "Bottom", "Left"],
        Nn = ["Webkit", "O", "Moz", "ms"];
    st.fn.extend({
        css: function(e, n) {
            return st.access(this, function(e, n, r) {
                var i, o, a = {},
                    s = 0;
                if (st.isArray(n)) {
                    for (i = ln(e), o = n.length; o > s; s++) a[n[s]] = st.css(e, n[s], !1, i);
                    return a
                }
                return r !== t ? st.style(e, n, r) : st.css(e, n)
            }, e, n, arguments.length > 1)
        },
        show: function() {
            return N(this, !0)
        },
        hide: function() {
            return N(this)
        },
        toggle: function(e) {
            var t = "boolean" == typeof e;
            return this.each(function() {
                (t ? e : w(this)) ? st(this).show(): st(this).hide()
            })
        }
    }), st.extend({
        cssHooks: {
            opacity: {
                get: function(e, t) {
                    if (t) {
                        var n = un(e, "opacity");
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
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            "float": st.support.cssFloat ? "cssFloat" : "styleFloat"
        },
        style: function(e, n, r, i) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var o, a, s, u = st.camelCase(n),
                    l = e.style;
                if (n = st.cssProps[u] || (st.cssProps[u] = T(l, u)), s = st.cssHooks[n] || st.cssHooks[u], r === t) return s && "get" in s && (o = s.get(e, !1, i)) !== t ? o : l[n];
                if (a = typeof r, "string" === a && (o = vn.exec(r)) && (r = (o[1] + 1) * o[2] + parseFloat(st.css(e, n)), a = "number"), !(null == r || "number" === a && isNaN(r) || ("number" !== a || st.cssNumber[u] || (r += "px"), st.support.clearCloneStyle || "" !== r || 0 !== n.indexOf("background") || (l[n] = "inherit"), s && "set" in s && (r = s.set(e, r, i)) === t))) try {
                    l[n] = r
                } catch (c) {}
            }
        },
        css: function(e, n, r, i) {
            var o, a, s, u = st.camelCase(n);
            return n = st.cssProps[u] || (st.cssProps[u] = T(e.style, u)), s = st.cssHooks[n] || st.cssHooks[u], s && "get" in s && (o = s.get(e, !0, r)), o === t && (o = un(e, n, i)), "normal" === o && n in Tn && (o = Tn[n]), r ? (a = parseFloat(o), r === !0 || st.isNumeric(a) ? a || 0 : o) : o
        },
        swap: function(e, t, n, r) {
            var i, o, a = {};
            for (o in t) a[o] = e.style[o], e.style[o] = t[o];
            i = n.apply(e, r || []);
            for (o in t) e.style[o] = a[o];
            return i
        }
    }), e.getComputedStyle ? (ln = function(t) {
        return e.getComputedStyle(t, null)
    }, un = function(e, n, r) {
        var i, o, a, s = r || ln(e),
            u = s ? s.getPropertyValue(n) || s[n] : t,
            l = e.style;
        return s && ("" !== u || st.contains(e.ownerDocument, e) || (u = st.style(e, n)), yn.test(u) && gn.test(n) && (i = l.width, o = l.minWidth, a = l.maxWidth, l.minWidth = l.maxWidth = l.width = u, u = s.width, l.width = i, l.minWidth = o, l.maxWidth = a)), u
    }) : V.documentElement.currentStyle && (ln = function(e) {
        return e.currentStyle
    }, un = function(e, n, r) {
        var i, o, a, s = r || ln(e),
            u = s ? s[n] : t,
            l = e.style;
        return null == u && l && l[n] && (u = l[n]), yn.test(u) && !dn.test(n) && (i = l.left, o = e.runtimeStyle, a = o && o.left, a && (o.left = e.currentStyle.left), l.left = "fontSize" === n ? "1em" : u, u = l.pixelLeft + "px", l.left = i, a && (o.left = a)), "" === u ? "auto" : u
    }), st.each(["height", "width"], function(e, n) {
        st.cssHooks[n] = {
            get: function(e, r, i) {
                return r ? 0 === e.offsetWidth && hn.test(st.css(e, "display")) ? st.swap(e, xn, function() {
                    return E(e, n, i)
                }) : E(e, n, i) : t
            },
            set: function(e, t, r) {
                var i = r && ln(e);
                return C(e, t, r ? k(e, n, r, st.support.boxSizing && "border-box" === st.css(e, "boxSizing", !1, i), i) : 0)
            }
        }
    }), st.support.opacity || (st.cssHooks.opacity = {
        get: function(e, t) {
            return pn.test((t && e.currentStyle ? e.currentStyle.filter : e.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : t ? "1" : ""
        },
        set: function(e, t) {
            var n = e.style,
                r = e.currentStyle,
                i = st.isNumeric(t) ? "alpha(opacity=" + 100 * t + ")" : "",
                o = r && r.filter || n.filter || "";
            n.zoom = 1, (t >= 1 || "" === t) && "" === st.trim(o.replace(fn, "")) && n.removeAttribute && (n.removeAttribute("filter"), "" === t || r && !r.filter) || (n.filter = fn.test(o) ? o.replace(fn, i) : o + " " + i)
        }
    }), st(function() {
        st.support.reliableMarginRight || (st.cssHooks.marginRight = {
            get: function(e, n) {
                return n ? st.swap(e, {
                    display: "inline-block"
                }, un, [e, "marginRight"]) : t
            }
        }), !st.support.pixelPosition && st.fn.position && st.each(["top", "left"], function(e, n) {
            st.cssHooks[n] = {
                get: function(e, r) {
                    return r ? (r = un(e, n), yn.test(r) ? st(e).position()[n] + "px" : r) : t
                }
            }
        })
    }), st.expr && st.expr.filters && (st.expr.filters.hidden = function(e) {
        return 0 === e.offsetWidth && 0 === e.offsetHeight || !st.support.reliableHiddenOffsets && "none" === (e.style && e.style.display || st.css(e, "display"))
    }, st.expr.filters.visible = function(e) {
        return !st.expr.filters.hidden(e)
    }), st.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(e, t) {
        st.cssHooks[e + t] = {
            expand: function(n) {
                for (var r = 0, i = {}, o = "string" == typeof n ? n.split(" ") : [n]; 4 > r; r++) i[e + wn[r] + t] = o[r] || o[r - 2] || o[0];
                return i
            }
        }, gn.test(e) || (st.cssHooks[e + t].set = C)
    });
    var Cn = /%20/g,
        kn = /\[\]$/,
        En = /\r?\n/g,
        Sn = /^(?:submit|button|image|reset)$/i,
        An = /^(?:input|select|textarea|keygen)/i;
    st.fn.extend({
        serialize: function() {
            return st.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                var e = st.prop(this, "elements");
                return e ? st.makeArray(e) : this
            }).filter(function() {
                var e = this.type;
                return this.name && !st(this).is(":disabled") && An.test(this.nodeName) && !Sn.test(e) && (this.checked || !Zt.test(e))
            }).map(function(e, t) {
                var n = st(this).val();
                return null == n ? null : st.isArray(n) ? st.map(n, function(e) {
                    return {
                        name: t.name,
                        value: e.replace(En, "\r\n")
                    }
                }) : {
                    name: t.name,
                    value: n.replace(En, "\r\n")
                }
            }).get()
        }
    }), st.param = function(e, n) {
        var r, i = [],
            o = function(e, t) {
                t = st.isFunction(t) ? t() : null == t ? "" : t, i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
            };
        if (n === t && (n = st.ajaxSettings && st.ajaxSettings.traditional), st.isArray(e) || e.jquery && !st.isPlainObject(e)) st.each(e, function() {
            o(this.name, this.value)
        });
        else
            for (r in e) j(r, e[r], n, o);
        return i.join("&").replace(Cn, "+")
    };
    var jn, Dn, Ln = st.now(),
        Hn = /\?/,
        Mn = /#.*$/,
        qn = /([?&])_=[^&]*/,
        _n = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
        Fn = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
        On = /^(?:GET|HEAD)$/,
        Bn = /^\/\//,
        Pn = /^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
        Rn = st.fn.load,
        Wn = {},
        $n = {},
        In = "*/".concat("*");
    try {
        Dn = Y.href
    } catch (zn) {
        Dn = V.createElement("a"), Dn.href = "", Dn = Dn.href
    }
    jn = Pn.exec(Dn.toLowerCase()) || [], st.fn.load = function(e, n, r) {
        if ("string" != typeof e && Rn) return Rn.apply(this, arguments);
        var i, o, a, s = this,
            u = e.indexOf(" ");
        return u >= 0 && (i = e.slice(u, e.length), e = e.slice(0, u)), st.isFunction(n) ? (r = n, n = t) : n && "object" == typeof n && (o = "POST"), s.length > 0 && st.ajax({
            url: e,
            type: o,
            dataType: "html",
            data: n
        }).done(function(e) {
            a = arguments, s.html(i ? st("<div>").append(st.parseHTML(e)).find(i) : e)
        }).complete(r && function(e, t) {
            s.each(r, a || [e.responseText, t, e])
        }), this
    }, st.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
        st.fn[t] = function(e) {
            return this.on(t, e)
        }
    }), st.each(["get", "post"], function(e, n) {
        st[n] = function(e, r, i, o) {
            return st.isFunction(r) && (o = o || i, i = r, r = t), st.ajax({
                url: e,
                type: n,
                dataType: o,
                data: r,
                success: i
            })
        }
    }), st.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: Dn,
            type: "GET",
            isLocal: Fn.test(jn[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": In,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText"
            },
            converters: {
                "* text": e.String,
                "text html": !0,
                "text json": st.parseJSON,
                "text xml": st.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function(e, t) {
            return t ? H(H(e, st.ajaxSettings), t) : H(st.ajaxSettings, e)
        },
        ajaxPrefilter: D(Wn),
        ajaxTransport: D($n),
        ajax: function(e, n) {
            function r(e, n, r, s) {
                var l, f, v, b, T, N = n;
                2 !== x && (x = 2, u && clearTimeout(u), i = t, a = s || "", w.readyState = e > 0 ? 4 : 0, r && (b = M(p, w, r)), e >= 200 && 300 > e || 304 === e ? (p.ifModified && (T = w.getResponseHeader("Last-Modified"), T && (st.lastModified[o] = T), T = w.getResponseHeader("etag"), T && (st.etag[o] = T)), 304 === e ? (l = !0, N = "notmodified") : (l = q(p, b), N = l.state, f = l.data, v = l.error, l = !v)) : (v = N, (e || !N) && (N = "error", 0 > e && (e = 0))), w.status = e, w.statusText = (n || N) + "", l ? g.resolveWith(d, [f, N, w]) : g.rejectWith(d, [w, N, v]), w.statusCode(y), y = t, c && h.trigger(l ? "ajaxSuccess" : "ajaxError", [w, p, l ? f : v]), m.fireWith(d, [w, N]), c && (h.trigger("ajaxComplete", [w, p]), --st.active || st.event.trigger("ajaxStop")))
            }
            "object" == typeof e && (n = e, e = t), n = n || {};
            var i, o, a, s, u, l, c, f, p = st.ajaxSetup({}, n),
                d = p.context || p,
                h = p.context && (d.nodeType || d.jquery) ? st(d) : st.event,
                g = st.Deferred(),
                m = st.Callbacks("once memory"),
                y = p.statusCode || {},
                v = {},
                b = {},
                x = 0,
                T = "canceled",
                w = {
                    readyState: 0,
                    getResponseHeader: function(e) {
                        var t;
                        if (2 === x) {
                            if (!s)
                                for (s = {}; t = _n.exec(a);) s[t[1].toLowerCase()] = t[2];
                            t = s[e.toLowerCase()]
                        }
                        return null == t ? null : t
                    },
                    getAllResponseHeaders: function() {
                        return 2 === x ? a : null
                    },
                    setRequestHeader: function(e, t) {
                        var n = e.toLowerCase();
                        return x || (e = b[n] = b[n] || e, v[e] = t), this
                    },
                    overrideMimeType: function(e) {
                        return x || (p.mimeType = e), this
                    },
                    statusCode: function(e) {
                        var t;
                        if (e)
                            if (2 > x)
                                for (t in e) y[t] = [y[t], e[t]];
                            else w.always(e[w.status]);
                        return this
                    },
                    abort: function(e) {
                        var t = e || T;
                        return i && i.abort(t), r(0, t), this
                    }
                };
            if (g.promise(w).complete = m.add, w.success = w.done, w.error = w.fail, p.url = ((e || p.url || Dn) + "").replace(Mn, "").replace(Bn, jn[1] + "//"), p.type = n.method || n.type || p.method || p.type, p.dataTypes = st.trim(p.dataType || "*").toLowerCase().match(lt) || [""], null == p.crossDomain && (l = Pn.exec(p.url.toLowerCase()), p.crossDomain = !(!l || l[1] === jn[1] && l[2] === jn[2] && (l[3] || ("http:" === l[1] ? 80 : 443)) == (jn[3] || ("http:" === jn[1] ? 80 : 443)))), p.data && p.processData && "string" != typeof p.data && (p.data = st.param(p.data, p.traditional)), L(Wn, p, n, w), 2 === x) return w;
            c = p.global, c && 0 === st.active++ && st.event.trigger("ajaxStart"), p.type = p.type.toUpperCase(), p.hasContent = !On.test(p.type), o = p.url, p.hasContent || (p.data && (o = p.url += (Hn.test(o) ? "&" : "?") + p.data, delete p.data), p.cache === !1 && (p.url = qn.test(o) ? o.replace(qn, "$1_=" + Ln++) : o + (Hn.test(o) ? "&" : "?") + "_=" + Ln++)), p.ifModified && (st.lastModified[o] && w.setRequestHeader("If-Modified-Since", st.lastModified[o]), st.etag[o] && w.setRequestHeader("If-None-Match", st.etag[o])), (p.data && p.hasContent && p.contentType !== !1 || n.contentType) && w.setRequestHeader("Content-Type", p.contentType), w.setRequestHeader("Accept", p.dataTypes[0] && p.accepts[p.dataTypes[0]] ? p.accepts[p.dataTypes[0]] + ("*" !== p.dataTypes[0] ? ", " + In + "; q=0.01" : "") : p.accepts["*"]);
            for (f in p.headers) w.setRequestHeader(f, p.headers[f]);
            if (p.beforeSend && (p.beforeSend.call(d, w, p) === !1 || 2 === x)) return w.abort();
            T = "abort";
            for (f in {
                    success: 1,
                    error: 1,
                    complete: 1
                }) w[f](p[f]);
            if (i = L($n, p, n, w)) {
                w.readyState = 1, c && h.trigger("ajaxSend", [w, p]), p.async && p.timeout > 0 && (u = setTimeout(function() {
                    w.abort("timeout")
                }, p.timeout));
                try {
                    x = 1, i.send(v, r)
                } catch (N) {
                    if (!(2 > x)) throw N;
                    r(-1, N)
                }
            } else r(-1, "No Transport");
            return w
        },
        getScript: function(e, n) {
            return st.get(e, t, n, "script")
        },
        getJSON: function(e, t, n) {
            return st.get(e, t, n, "json")
        }
    }), st.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /(?:java|ecma)script/
        },
        converters: {
            "text script": function(e) {
                return st.globalEval(e), e
            }
        }
    }), st.ajaxPrefilter("script", function(e) {
        e.cache === t && (e.cache = !1), e.crossDomain && (e.type = "GET", e.global = !1)
    }), st.ajaxTransport("script", function(e) {
        if (e.crossDomain) {
            var n, r = V.head || st("head")[0] || V.documentElement;
            return {
                send: function(t, i) {
                    n = V.createElement("script"), n.async = !0, e.scriptCharset && (n.charset = e.scriptCharset), n.src = e.url, n.onload = n.onreadystatechange = function(e, t) {
                        (t || !n.readyState || /loaded|complete/.test(n.readyState)) && (n.onload = n.onreadystatechange = null, n.parentNode && n.parentNode.removeChild(n), n = null, t || i(200, "success"))
                    }, r.insertBefore(n, r.firstChild)
                },
                abort: function() {
                    n && n.onload(t, !0)
                }
            }
        }
    });
    var Xn = [],
        Un = /(=)\?(?=&|$)|\?\?/;
    st.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var e = Xn.pop() || st.expando + "_" + Ln++;
            return this[e] = !0, e
        }
    }), st.ajaxPrefilter("json jsonp", function(n, r, i) {
        var o, a, s, u = n.jsonp !== !1 && (Un.test(n.url) ? "url" : "string" == typeof n.data && !(n.contentType || "").indexOf("application/x-www-form-urlencoded") && Un.test(n.data) && "data");
        return u || "jsonp" === n.dataTypes[0] ? (o = n.jsonpCallback = st.isFunction(n.jsonpCallback) ? n.jsonpCallback() : n.jsonpCallback, u ? n[u] = n[u].replace(Un, "$1" + o) : n.jsonp !== !1 && (n.url += (Hn.test(n.url) ? "&" : "?") + n.jsonp + "=" + o), n.converters["script json"] = function() {
            return s || st.error(o + " was not called"), s[0]
        }, n.dataTypes[0] = "json", a = e[o], e[o] = function() {
            s = arguments
        }, i.always(function() {
            e[o] = a, n[o] && (n.jsonpCallback = r.jsonpCallback, Xn.push(o)), s && st.isFunction(a) && a(s[0]), s = a = t
        }), "script") : t
    });
    var Vn, Yn, Jn = 0,
        Gn = e.ActiveXObject && function() {
            var e;
            for (e in Vn) Vn[e](t, !0)
        };
    st.ajaxSettings.xhr = e.ActiveXObject ? function() {
        return !this.isLocal && _() || F()
    } : _, Yn = st.ajaxSettings.xhr(), st.support.cors = !!Yn && "withCredentials" in Yn, Yn = st.support.ajax = !!Yn, Yn && st.ajaxTransport(function(n) {
        if (!n.crossDomain || st.support.cors) {
            var r;
            return {
                send: function(i, o) {
                    var a, s, u = n.xhr();
                    if (n.username ? u.open(n.type, n.url, n.async, n.username, n.password) : u.open(n.type, n.url, n.async), n.xhrFields)
                        for (s in n.xhrFields) u[s] = n.xhrFields[s];
                    n.mimeType && u.overrideMimeType && u.overrideMimeType(n.mimeType), n.crossDomain || i["X-Requested-With"] || (i["X-Requested-With"] = "XMLHttpRequest");
                    try {
                        for (s in i) u.setRequestHeader(s, i[s])
                    } catch (l) {}
                    u.send(n.hasContent && n.data || null), r = function(e, i) {
                        var s, l, c, f, p;
                        try {
                            if (r && (i || 4 === u.readyState))
                                if (r = t, a && (u.onreadystatechange = st.noop, Gn && delete Vn[a]), i) 4 !== u.readyState && u.abort();
                                else {
                                    f = {}, s = u.status, p = u.responseXML, c = u.getAllResponseHeaders(), p && p.documentElement && (f.xml = p), "string" == typeof u.responseText && (f.text = u.responseText);
                                    try {
                                        l = u.statusText
                                    } catch (d) {
                                        l = ""
                                    }
                                    s || !n.isLocal || n.crossDomain ? 1223 === s && (s = 204) : s = f.text ? 200 : 404
                                }
                        } catch (h) {
                            i || o(-1, h)
                        }
                        f && o(s, l, f, c)
                    }, n.async ? 4 === u.readyState ? setTimeout(r) : (a = ++Jn, Gn && (Vn || (Vn = {}, st(e).unload(Gn)), Vn[a] = r), u.onreadystatechange = r) : r()
                },
                abort: function() {
                    r && r(t, !0)
                }
            }
        }
    });
    var Qn, Kn, Zn = /^(?:toggle|show|hide)$/,
        er = RegExp("^(?:([+-])=|)(" + ut + ")([a-z%]*)$", "i"),
        tr = /queueHooks$/,
        nr = [W],
        rr = {
            "*": [function(e, t) {
                var n, r, i = this.createTween(e, t),
                    o = er.exec(t),
                    a = i.cur(),
                    s = +a || 0,
                    u = 1,
                    l = 20;
                if (o) {
                    if (n = +o[2], r = o[3] || (st.cssNumber[e] ? "" : "px"), "px" !== r && s) {
                        s = st.css(i.elem, e, !0) || n || 1;
                        do u = u || ".5", s /= u, st.style(i.elem, e, s + r); while (u !== (u = i.cur() / a) && 1 !== u && --l)
                    }
                    i.unit = r, i.start = s, i.end = o[1] ? s + (o[1] + 1) * n : n
                }
                return i
            }]
        };
    st.Animation = st.extend(P, {
        tweener: function(e, t) {
            st.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
            for (var n, r = 0, i = e.length; i > r; r++) n = e[r], rr[n] = rr[n] || [], rr[n].unshift(t)
        },
        prefilter: function(e, t) {
            t ? nr.unshift(e) : nr.push(e)
        }
    }), st.Tween = $, $.prototype = {
        constructor: $,
        init: function(e, t, n, r, i, o) {
            this.elem = e, this.prop = n, this.easing = i || "swing", this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = o || (st.cssNumber[n] ? "" : "px")
        },
        cur: function() {
            var e = $.propHooks[this.prop];
            return e && e.get ? e.get(this) : $.propHooks._default.get(this)
        },
        run: function(e) {
            var t, n = $.propHooks[this.prop];
            return this.pos = t = this.options.duration ? st.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : $.propHooks._default.set(this), this
        }
    }, $.prototype.init.prototype = $.prototype, $.propHooks = {
        _default: {
            get: function(e) {
                var t;
                return null == e.elem[e.prop] || e.elem.style && null != e.elem.style[e.prop] ? (t = st.css(e.elem, e.prop, "auto"), t && "auto" !== t ? t : 0) : e.elem[e.prop]
            },
            set: function(e) {
                st.fx.step[e.prop] ? st.fx.step[e.prop](e) : e.elem.style && (null != e.elem.style[st.cssProps[e.prop]] || st.cssHooks[e.prop]) ? st.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
            }
        }
    }, $.propHooks.scrollTop = $.propHooks.scrollLeft = {
        set: function(e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
        }
    }, st.each(["toggle", "show", "hide"], function(e, t) {
        var n = st.fn[t];
        st.fn[t] = function(e, r, i) {
            return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(I(t, !0), e, r, i)
        }
    }), st.fn.extend({
        fadeTo: function(e, t, n, r) {
            return this.filter(w).css("opacity", 0).show().end().animate({
                opacity: t
            }, e, n, r)
        },
        animate: function(e, t, n, r) {
            var i = st.isEmptyObject(e),
                o = st.speed(t, n, r),
                a = function() {
                    var t = P(this, st.extend({}, e), o);
                    a.finish = function() {
                        t.stop(!0)
                    }, (i || st._data(this, "finish")) && t.stop(!0)
                };
            return a.finish = a, i || o.queue === !1 ? this.each(a) : this.queue(o.queue, a)
        },
        stop: function(e, n, r) {
            var i = function(e) {
                var t = e.stop;
                delete e.stop, t(r)
            };
            return "string" != typeof e && (r = n, n = e, e = t), n && e !== !1 && this.queue(e || "fx", []), this.each(function() {
                var t = !0,
                    n = null != e && e + "queueHooks",
                    o = st.timers,
                    a = st._data(this);
                if (n) a[n] && a[n].stop && i(a[n]);
                else
                    for (n in a) a[n] && a[n].stop && tr.test(n) && i(a[n]);
                for (n = o.length; n--;) o[n].elem !== this || null != e && o[n].queue !== e || (o[n].anim.stop(r), t = !1, o.splice(n, 1));
                (t || !r) && st.dequeue(this, e)
            })
        },
        finish: function(e) {
            return e !== !1 && (e = e || "fx"), this.each(function() {
                var t, n = st._data(this),
                    r = n[e + "queue"],
                    i = n[e + "queueHooks"],
                    o = st.timers,
                    a = r ? r.length : 0;
                for (n.finish = !0, st.queue(this, e, []), i && i.cur && i.cur.finish && i.cur.finish.call(this), t = o.length; t--;) o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0), o.splice(t, 1));
                for (t = 0; a > t; t++) r[t] && r[t].finish && r[t].finish.call(this);
                delete n.finish
            })
        }
    }), st.each({
        slideDown: I("show"),
        slideUp: I("hide"),
        slideToggle: I("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function(e, t) {
        st.fn[e] = function(e, n, r) {
            return this.animate(t, e, n, r)
        }
    }), st.speed = function(e, t, n) {
        var r = e && "object" == typeof e ? st.extend({}, e) : {
            complete: n || !n && t || st.isFunction(e) && e,
            duration: e,
            easing: n && t || t && !st.isFunction(t) && t
        };
        return r.duration = st.fx.off ? 0 : "number" == typeof r.duration ? r.duration : r.duration in st.fx.speeds ? st.fx.speeds[r.duration] : st.fx.speeds._default, (null == r.queue || r.queue === !0) && (r.queue = "fx"), r.old = r.complete, r.complete = function() {
            st.isFunction(r.old) && r.old.call(this), r.queue && st.dequeue(this, r.queue)
        }, r
    }, st.easing = {
        linear: function(e) {
            return e
        },
        swing: function(e) {
            return .5 - Math.cos(e * Math.PI) / 2
        }
    }, st.timers = [], st.fx = $.prototype.init, st.fx.tick = function() {
        var e, n = st.timers,
            r = 0;
        for (Qn = st.now(); n.length > r; r++) e = n[r], e() || n[r] !== e || n.splice(r--, 1);
        n.length || st.fx.stop(), Qn = t
    }, st.fx.timer = function(e) {
        e() && st.timers.push(e) && st.fx.start()
    }, st.fx.interval = 13, st.fx.start = function() {
        Kn || (Kn = setInterval(st.fx.tick, st.fx.interval))
    }, st.fx.stop = function() {
        clearInterval(Kn), Kn = null
    }, st.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    }, st.fx.step = {}, st.expr && st.expr.filters && (st.expr.filters.animated = function(e) {
        return st.grep(st.timers, function(t) {
            return e === t.elem
        }).length
    }), st.fn.offset = function(e) {
        if (arguments.length) return e === t ? this : this.each(function(t) {
            st.offset.setOffset(this, e, t)
        });
        var n, r, i = {
                top: 0,
                left: 0
            },
            o = this[0],
            a = o && o.ownerDocument;
        if (a) return n = a.documentElement, st.contains(n, o) ? (o.getBoundingClientRect !== t && (i = o.getBoundingClientRect()), r = z(a), {
            top: i.top + (r.pageYOffset || n.scrollTop) - (n.clientTop || 0),
            left: i.left + (r.pageXOffset || n.scrollLeft) - (n.clientLeft || 0)
        }) : i
    }, st.offset = {
        setOffset: function(e, t, n) {
            var r = st.css(e, "position");
            "static" === r && (e.style.position = "relative");
            var i, o, a = st(e),
                s = a.offset(),
                u = st.css(e, "top"),
                l = st.css(e, "left"),
                c = ("absolute" === r || "fixed" === r) && st.inArray("auto", [u, l]) > -1,
                f = {},
                p = {};
            c ? (p = a.position(), i = p.top, o = p.left) : (i = parseFloat(u) || 0, o = parseFloat(l) || 0), st.isFunction(t) && (t = t.call(e, n, s)), null != t.top && (f.top = t.top - s.top + i), null != t.left && (f.left = t.left - s.left + o), "using" in t ? t.using.call(e, f) : a.css(f)
        }
    }, st.fn.extend({
        position: function() {
            if (this[0]) {
                var e, t, n = {
                        top: 0,
                        left: 0
                    },
                    r = this[0];
                return "fixed" === st.css(r, "position") ? t = r.getBoundingClientRect() : (e = this.offsetParent(), t = this.offset(), st.nodeName(e[0], "html") || (n = e.offset()), n.top += st.css(e[0], "borderTopWidth", !0), n.left += st.css(e[0], "borderLeftWidth", !0)), {
                    top: t.top - n.top - st.css(r, "marginTop", !0),
                    left: t.left - n.left - st.css(r, "marginLeft", !0)
                }
            }
        },
        offsetParent: function() {
            return this.map(function() {
                for (var e = this.offsetParent || V.documentElement; e && !st.nodeName(e, "html") && "static" === st.css(e, "position");) e = e.offsetParent;
                return e || V.documentElement
            })
        }
    }), st.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function(e, n) {
        var r = /Y/.test(n);
        st.fn[e] = function(i) {
            return st.access(this, function(e, i, o) {
                var a = z(e);
                return o === t ? a ? n in a ? a[n] : a.document.documentElement[i] : e[i] : (a ? a.scrollTo(r ? st(a).scrollLeft() : o, r ? o : st(a).scrollTop()) : e[i] = o, t)
            }, e, i, arguments.length, null)
        }
    }), st.each({
        Height: "height",
        Width: "width"
    }, function(e, n) {
        st.each({
            padding: "inner" + e,
            content: n,
            "": "outer" + e
        }, function(r, i) {
            st.fn[i] = function(i, o) {
                var a = arguments.length && (r || "boolean" != typeof i),
                    s = r || (i === !0 || o === !0 ? "margin" : "border");
                return st.access(this, function(n, r, i) {
                    var o;
                    return st.isWindow(n) ? n.document.documentElement["client" + e] : 9 === n.nodeType ? (o = n.documentElement, Math.max(n.body["scroll" + e], o["scroll" + e], n.body["offset" + e], o["offset" + e], o["client" + e])) : i === t ? st.css(n, r, s) : st.style(n, r, i, s)
                }, n, a ? i : t, a, null)
            }
        })
    }), e.jQuery = e.$ = st, "function" == typeof define && define.amd && define.amd.jQuery && define("jquery", [], function() {
        return st
    })
})(window);
if ("undefined" == typeof jQuery) throw new Error("Bootstrap's JavaScript requires jQuery"); + function(a) {
    "use strict";

    function b() {
        var a = document.createElement("bootstrap"),
            b = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "oTransitionEnd otransitionend",
                transition: "transitionend"
            };
        for (var c in b)
            if (void 0 !== a.style[c]) return {
                end: b[c]
            };
        return !1
    }
    a.fn.emulateTransitionEnd = function(b) {
        var c = !1,
            d = this;
        a(this).one("bsTransitionEnd", function() {
            c = !0
        });
        var e = function() {
            c || a(d).trigger(a.support.transition.end)
        };
        return setTimeout(e, b), this
    }, a(function() {
        a.support.transition = b(), a.support.transition && (a.event.special.bsTransitionEnd = {
            bindType: a.support.transition.end,
            delegateType: a.support.transition.end,
            handle: function(b) {
                return a(b.target).is(this) ? b.handleObj.handler.apply(this, arguments) : void 0
            }
        })
    })
}(jQuery), + function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var c = a(this),
                e = c.data("bs.alert");
            e || c.data("bs.alert", e = new d(this)), "string" == typeof b && e[b].call(c)
        })
    }
    var c = '[data-dismiss="alert"]',
        d = function(b) {
            a(b).on("click", c, this.close)
        };
    d.VERSION = "3.2.0", d.prototype.close = function(b) {
        function c() {
            f.detach().trigger("closed.bs.alert").remove()
        }
        var d = a(this),
            e = d.attr("data-target");
        e || (e = d.attr("href"), e = e && e.replace(/.*(?=#[^\s]*$)/, ""));
        var f = a(e);
        b && b.preventDefault(), f.length || (f = d.hasClass("alert") ? d : d.parent()), f.trigger(b = a.Event("close.bs.alert")), b.isDefaultPrevented() || (f.removeClass("in"), a.support.transition && f.hasClass("fade") ? f.one("bsTransitionEnd", c).emulateTransitionEnd(150) : c())
    };
    var e = a.fn.alert;
    a.fn.alert = b, a.fn.alert.Constructor = d, a.fn.alert.noConflict = function() {
        return a.fn.alert = e, this
    }, a(document).on("click.bs.alert.data-api", c, d.prototype.close)
}(jQuery), + function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.button"),
                f = "object" == typeof b && b;
            e || d.data("bs.button", e = new c(this, f)), "toggle" == b ? e.toggle() : b && e.setState(b)
        })
    }
    var c = function(b, d) {
        this.$element = a(b), this.options = a.extend({}, c.DEFAULTS, d), this.isLoading = !1
    };
    c.VERSION = "3.2.0", c.DEFAULTS = {
        loadingText: "loading..."
    }, c.prototype.setState = function(b) {
        var c = "disabled",
            d = this.$element,
            e = d.is("input") ? "val" : "html",
            f = d.data();
        b += "Text", null == f.resetText && d.data("resetText", d[e]()), d[e](null == f[b] ? this.options[b] : f[b]), setTimeout(a.proxy(function() {
            "loadingText" == b ? (this.isLoading = !0, d.addClass(c).attr(c, c)) : this.isLoading && (this.isLoading = !1, d.removeClass(c).removeAttr(c))
        }, this), 0)
    }, c.prototype.toggle = function() {
        var a = !0,
            b = this.$element.closest('[data-toggle="buttons"]');
        if (b.length) {
            var c = this.$element.find("input");
            "radio" == c.prop("type") && (c.prop("checked") && this.$element.hasClass("active") ? a = !1 : b.find(".active").removeClass("active")), a && c.prop("checked", !this.$element.hasClass("active")).trigger("change")
        }
        a && this.$element.toggleClass("active")
    };
    var d = a.fn.button;
    a.fn.button = b, a.fn.button.Constructor = c, a.fn.button.noConflict = function() {
        return a.fn.button = d, this
    }, a(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function(c) {
        var d = a(c.target);
        d.hasClass("btn") || (d = d.closest(".btn")), b.call(d, "toggle"), c.preventDefault()
    })
}(jQuery), + function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.carousel"),
                f = a.extend({}, c.DEFAULTS, d.data(), "object" == typeof b && b),
                g = "string" == typeof b ? b : f.slide;
            e || d.data("bs.carousel", e = new c(this, f)), "number" == typeof b ? e.to(b) : g ? e[g]() : f.interval && e.pause().cycle()
        })
    }
    var c = function(b, c) {
        this.$element = a(b).on("keydown.bs.carousel", a.proxy(this.keydown, this)), this.$indicators = this.$element.find(".carousel-indicators"), this.options = c, this.paused = this.sliding = this.interval = this.$active = this.$items = null, "hover" == this.options.pause && this.$element.on("mouseenter.bs.carousel", a.proxy(this.pause, this)).on("mouseleave.bs.carousel", a.proxy(this.cycle, this))
    };
    c.VERSION = "3.2.0", c.DEFAULTS = {
        interval: 5e3,
        pause: "hover",
        wrap: !0
    }, c.prototype.keydown = function(a) {
        switch (a.which) {
            case 37:
                this.prev();
                break;
            case 39:
                this.next();
                break;
            default:
                return
        }
        a.preventDefault()
    }, c.prototype.cycle = function(b) {
        return b || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(a.proxy(this.next, this), this.options.interval)), this
    }, c.prototype.getItemIndex = function(a) {
        return this.$items = a.parent().children(".item"), this.$items.index(a || this.$active)
    }, c.prototype.to = function(b) {
        var c = this,
            d = this.getItemIndex(this.$active = this.$element.find(".item.active"));
        return b > this.$items.length - 1 || 0 > b ? void 0 : this.sliding ? this.$element.one("slid.bs.carousel", function() {
            c.to(b)
        }) : d == b ? this.pause().cycle() : this.slide(b > d ? "next" : "prev", a(this.$items[b]))
    }, c.prototype.pause = function(b) {
        return b || (this.paused = !0), this.$element.find(".next, .prev").length && a.support.transition && (this.$element.trigger(a.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this
    }, c.prototype.next = function() {
        return this.sliding ? void 0 : this.slide("next")
    }, c.prototype.prev = function() {
        return this.sliding ? void 0 : this.slide("prev")
    }, c.prototype.slide = function(b, c) {
        var d = this.$element.find(".item.active"),
            e = c || d[b](),
            f = this.interval,
            g = "next" == b ? "left" : "right",
            h = "next" == b ? "first" : "last",
            i = this;
        if (!e.length) {
            if (!this.options.wrap) return;
            e = this.$element.find(".item")[h]()
        }
        if (e.hasClass("active")) return this.sliding = !1;
        var j = e[0],
            k = a.Event("slide.bs.carousel", {
                relatedTarget: j,
                direction: g
            });
        if (this.$element.trigger(k), !k.isDefaultPrevented()) {
            if (this.sliding = !0, f && this.pause(), this.$indicators.length) {
                this.$indicators.find(".active").removeClass("active");
                var l = a(this.$indicators.children()[this.getItemIndex(e)]);
                l && l.addClass("active")
            }
            var m = a.Event("slid.bs.carousel", {
                relatedTarget: j,
                direction: g
            });
            return a.support.transition && this.$element.hasClass("slide") ? (e.addClass(b), e[0].offsetWidth, d.addClass(g), e.addClass(g), d.one("bsTransitionEnd", function() {
                e.removeClass([b, g].join(" ")).addClass("active"), d.removeClass(["active", g].join(" ")), i.sliding = !1, setTimeout(function() {
                    i.$element.trigger(m)
                }, 0)
            }).emulateTransitionEnd(1e3 * d.css("transition-duration").slice(0, -1))) : (d.removeClass("active"), e.addClass("active"), this.sliding = !1, this.$element.trigger(m)), f && this.cycle(), this
        }
    };
    var d = a.fn.carousel;
    a.fn.carousel = b, a.fn.carousel.Constructor = c, a.fn.carousel.noConflict = function() {
        return a.fn.carousel = d, this
    }, a(document).on("click.bs.carousel.data-api", "[data-slide], [data-slide-to]", function(c) {
        var d, e = a(this),
            f = a(e.attr("data-target") || (d = e.attr("href")) && d.replace(/.*(?=#[^\s]+$)/, ""));
        if (f.hasClass("carousel")) {
            var g = a.extend({}, f.data(), e.data()),
                h = e.attr("data-slide-to");
            h && (g.interval = !1), b.call(f, g), h && f.data("bs.carousel").to(h), c.preventDefault()
        }
    }), a(window).on("load", function() {
        a('[data-ride="carousel"]').each(function() {
            var c = a(this);
            b.call(c, c.data())
        })
    })
}(jQuery), + function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.collapse"),
                f = a.extend({}, c.DEFAULTS, d.data(), "object" == typeof b && b);
            !e && f.toggle && "show" == b && (b = !b), e || d.data("bs.collapse", e = new c(this, f)), "string" == typeof b && e[b]()
        })
    }
    var c = function(b, d) {
        this.$element = a(b), this.options = a.extend({}, c.DEFAULTS, d), this.transitioning = null, this.options.parent && (this.$parent = a(this.options.parent)), this.options.toggle && this.toggle()
    };
    c.VERSION = "3.2.0", c.DEFAULTS = {
        toggle: !0
    }, c.prototype.dimension = function() {
        var a = this.$element.hasClass("width");
        return a ? "width" : "height"
    }, c.prototype.show = function() {
        if (!this.transitioning && !this.$element.hasClass("in")) {
            var c = a.Event("show.bs.collapse");
            if (this.$element.trigger(c), !c.isDefaultPrevented()) {
                var d = this.$parent && this.$parent.find("> .panel > .in");
                if (d && d.length) {
                    var e = d.data("bs.collapse");
                    if (e && e.transitioning) return;
                    b.call(d, "hide"), e || d.data("bs.collapse", null)
                }
                var f = this.dimension();
                this.$element.removeClass("collapse").addClass("collapsing")[f](0), this.transitioning = 1;
                var g = function() {
                    this.$element.removeClass("collapsing").addClass("collapse in")[f](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
                };
                if (!a.support.transition) return g.call(this);
                var h = a.camelCase(["scroll", f].join("-"));
                this.$element.one("bsTransitionEnd", a.proxy(g, this)).emulateTransitionEnd(350)[f](this.$element[0][h])
            }
        }
    }, c.prototype.hide = function() {
        if (!this.transitioning && this.$element.hasClass("in")) {
            var b = a.Event("hide.bs.collapse");
            if (this.$element.trigger(b), !b.isDefaultPrevented()) {
                var c = this.dimension();
                this.$element[c](this.$element[c]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse").removeClass("in"), this.transitioning = 1;
                var d = function() {
                    this.transitioning = 0, this.$element.trigger("hidden.bs.collapse").removeClass("collapsing").addClass("collapse")
                };
                return a.support.transition ? void this.$element[c](0).one("bsTransitionEnd", a.proxy(d, this)).emulateTransitionEnd(350) : d.call(this)
            }
        }
    }, c.prototype.toggle = function() {
        this[this.$element.hasClass("in") ? "hide" : "show"]()
    };
    var d = a.fn.collapse;
    a.fn.collapse = b, a.fn.collapse.Constructor = c, a.fn.collapse.noConflict = function() {
        return a.fn.collapse = d, this
    }, a(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function(c) {
        var d, e = a(this),
            f = e.attr("data-target") || c.preventDefault() || (d = e.attr("href")) && d.replace(/.*(?=#[^\s]+$)/, ""),
            g = a(f),
            h = g.data("bs.collapse"),
            i = h ? "toggle" : e.data(),
            j = e.attr("data-parent"),
            k = j && a(j);
        h && h.transitioning || (k && k.find('[data-toggle="collapse"][data-parent="' + j + '"]').not(e).addClass("collapsed"), e[g.hasClass("in") ? "addClass" : "removeClass"]("collapsed")), b.call(g, i)
    })
}(jQuery), + function(a) {
    "use strict";

    function b(b) {
        b && 3 === b.which || (a(e).remove(), a(f).each(function() {
            var d = c(a(this)),
                e = {
                    relatedTarget: this
                };
            d.hasClass("open") && (d.trigger(b = a.Event("hide.bs.dropdown", e)), b.isDefaultPrevented() || d.removeClass("open").trigger("hidden.bs.dropdown", e))
        }))
    }

    function c(b) {
        var c = b.attr("data-target");
        c || (c = b.attr("href"), c = c && /#[A-Za-z]/.test(c) && c.replace(/.*(?=#[^\s]*$)/, ""));
        var d = c && a(c);
        return d && d.length ? d : b.parent()
    }

    function d(b) {
        return this.each(function() {
            var c = a(this),
                d = c.data("bs.dropdown");
            d || c.data("bs.dropdown", d = new g(this)), "string" == typeof b && d[b].call(c)
        })
    }
    var e = ".dropdown-backdrop",
        f = '[data-toggle="dropdown"]',
        g = function(b) {
            a(b).on("click.bs.dropdown", this.toggle)
        };
    g.VERSION = "3.2.0", g.prototype.toggle = function(d) {
        var e = a(this);
        if (!e.is(".disabled, :disabled")) {
            var f = c(e),
                g = f.hasClass("open");
            if (b(), !g) {
                "ontouchstart" in document.documentElement && !f.closest(".navbar-nav").length && a('<div class="dropdown-backdrop"/>').insertAfter(a(this)).on("click", b);
                var h = {
                    relatedTarget: this
                };
                if (f.trigger(d = a.Event("show.bs.dropdown", h)), d.isDefaultPrevented()) return;
                e.trigger("focus"), f.toggleClass("open").trigger("shown.bs.dropdown", h)
            }
            return !1
        }
    }, g.prototype.keydown = function(b) {
        if (/(38|40|27)/.test(b.keyCode)) {
            var d = a(this);
            if (b.preventDefault(), b.stopPropagation(), !d.is(".disabled, :disabled")) {
                var e = c(d),
                    g = e.hasClass("open");
                if (!g || g && 27 == b.keyCode) return 27 == b.which && e.find(f).trigger("focus"), d.trigger("click");
                var h = " li:not(.divider):visible a",
                    i = e.find('[role="menu"]' + h + ', [role="listbox"]' + h);
                if (i.length) {
                    var j = i.index(i.filter(":focus"));
                    38 == b.keyCode && j > 0 && j--, 40 == b.keyCode && j < i.length - 1 && j++, ~j || (j = 0), i.eq(j).trigger("focus")
                }
            }
        }
    };
    var h = a.fn.dropdown;
    a.fn.dropdown = d, a.fn.dropdown.Constructor = g, a.fn.dropdown.noConflict = function() {
        return a.fn.dropdown = h, this
    }, a(document).on("click.bs.dropdown.data-api", b).on("click.bs.dropdown.data-api", ".dropdown form", function(a) {
        a.stopPropagation()
    }).on("click.bs.dropdown.data-api", f, g.prototype.toggle).on("keydown.bs.dropdown.data-api", f + ', [role="menu"], [role="listbox"]', g.prototype.keydown)
}(jQuery), + function(a) {
    "use strict";

    function b(b, d) {
        return this.each(function() {
            var e = a(this),
                f = e.data("bs.modal"),
                g = a.extend({}, c.DEFAULTS, e.data(), "object" == typeof b && b);
            f || e.data("bs.modal", f = new c(this, g)), "string" == typeof b ? f[b](d) : g.show && f.show(d)
        })
    }
    var c = function(b, c) {
        this.options = c, this.$body = a(document.body), this.$element = a(b), this.$backdrop = this.isShown = null, this.scrollbarWidth = 0, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, a.proxy(function() {
            this.$element.trigger("loaded.bs.modal")
        }, this))
    };
    c.VERSION = "3.2.0", c.DEFAULTS = {
        backdrop: !0,
        keyboard: !0,
        show: !0
    }, c.prototype.toggle = function(a) {
        return this.isShown ? this.hide() : this.show(a)
    }, c.prototype.show = function(b) {
        var c = this,
            d = a.Event("show.bs.modal", {
                relatedTarget: b
            });
        this.$element.trigger(d), this.isShown || d.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.$body.addClass("modal-open"), this.setScrollbar(), this.escape(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', a.proxy(this.hide, this)), this.backdrop(function() {
            var d = a.support.transition && c.$element.hasClass("fade");
            c.$element.parent().length || c.$element.appendTo(c.$body), c.$element.show().scrollTop(0), d && c.$element[0].offsetWidth, c.$element.addClass("in").attr("aria-hidden", !1), c.enforceFocus();
            var e = a.Event("shown.bs.modal", {
                relatedTarget: b
            });
            d ? c.$element.find(".modal-dialog").one("bsTransitionEnd", function() {
                c.$element.trigger("focus").trigger(e)
            }).emulateTransitionEnd(300) : c.$element.trigger("focus").trigger(e)
        }))
    }, c.prototype.hide = function(b) {
        b && b.preventDefault(), b = a.Event("hide.bs.modal"), this.$element.trigger(b), this.isShown && !b.isDefaultPrevented() && (this.isShown = !1, this.$body.removeClass("modal-open"), this.resetScrollbar(), this.escape(), a(document).off("focusin.bs.modal"), this.$element.removeClass("in").attr("aria-hidden", !0).off("click.dismiss.bs.modal"), a.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", a.proxy(this.hideModal, this)).emulateTransitionEnd(300) : this.hideModal())
    }, c.prototype.enforceFocus = function() {
        a(document).off("focusin.bs.modal").on("focusin.bs.modal", a.proxy(function(a) {
            this.$element[0] === a.target || this.$element.has(a.target).length || this.$element.trigger("focus")
        }, this))
    }, c.prototype.escape = function() {
        this.isShown && this.options.keyboard ? this.$element.on("keyup.dismiss.bs.modal", a.proxy(function(a) {
            27 == a.which && this.hide()
        }, this)) : this.isShown || this.$element.off("keyup.dismiss.bs.modal")
    }, c.prototype.hideModal = function() {
        var a = this;
        this.$element.hide(), this.backdrop(function() {
            a.$element.trigger("hidden.bs.modal")
        })
    }, c.prototype.removeBackdrop = function() {
        this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
    }, c.prototype.backdrop = function(b) {
        var c = this,
            d = this.$element.hasClass("fade") ? "fade" : "";
        if (this.isShown && this.options.backdrop) {
            var e = a.support.transition && d;
            if (this.$backdrop = a('<div class="modal-backdrop ' + d + '" />').appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", a.proxy(function(a) {
                    a.target === a.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus.call(this.$element[0]) : this.hide.call(this))
                }, this)), e && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !b) return;
            e ? this.$backdrop.one("bsTransitionEnd", b).emulateTransitionEnd(150) : b()
        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass("in");
            var f = function() {
                c.removeBackdrop(), b && b()
            };
            a.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", f).emulateTransitionEnd(150) : f()
        } else b && b()
    }, c.prototype.checkScrollbar = function() {
        document.body.clientWidth >= window.innerWidth || (this.scrollbarWidth = this.scrollbarWidth || this.measureScrollbar())
    }, c.prototype.setScrollbar = function() {
        var a = parseInt(this.$body.css("padding-right") || 0, 10);
        this.scrollbarWidth && this.$body.css("padding-right", a + this.scrollbarWidth)
    }, c.prototype.resetScrollbar = function() {
        this.$body.css("padding-right", "")
    }, c.prototype.measureScrollbar = function() {
        var a = document.createElement("div");
        a.className = "modal-scrollbar-measure", this.$body.append(a);
        var b = a.offsetWidth - a.clientWidth;
        return this.$body[0].removeChild(a), b
    };
    var d = a.fn.modal;
    a.fn.modal = b, a.fn.modal.Constructor = c, a.fn.modal.noConflict = function() {
        return a.fn.modal = d, this
    }, a(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function(c) {
        var d = a(this),
            e = d.attr("href"),
            f = a(d.attr("data-target") || e && e.replace(/.*(?=#[^\s]+$)/, "")),
            g = f.data("bs.modal") ? "toggle" : a.extend({
                remote: !/#/.test(e) && e
            }, f.data(), d.data());
        d.is("a") && c.preventDefault(), f.one("show.bs.modal", function(a) {
            a.isDefaultPrevented() || f.one("hidden.bs.modal", function() {
                d.is(":visible") && d.trigger("focus")
            })
        }), b.call(f, g, this)
    })
}(jQuery), + function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.tooltip"),
                f = "object" == typeof b && b;
            (e || "destroy" != b) && (e || d.data("bs.tooltip", e = new c(this, f)), "string" == typeof b && e[b]())
        })
    }
    var c = function(a, b) {
        this.type = this.options = this.enabled = this.timeout = this.hoverState = this.$element = null, this.init("tooltip", a, b)
    };
    c.VERSION = "3.2.0", c.DEFAULTS = {
        animation: !0,
        placement: "top",
        selector: !1,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        container: !1,
        viewport: {
            selector: "body",
            padding: 0
        }
    }, c.prototype.init = function(b, c, d) {
        this.enabled = !0, this.type = b, this.$element = a(c), this.options = this.getOptions(d), this.$viewport = this.options.viewport && a(this.options.viewport.selector || this.options.viewport);
        for (var e = this.options.trigger.split(" "), f = e.length; f--;) {
            var g = e[f];
            if ("click" == g) this.$element.on("click." + this.type, this.options.selector, a.proxy(this.toggle, this));
            else if ("manual" != g) {
                var h = "hover" == g ? "mouseenter" : "focusin",
                    i = "hover" == g ? "mouseleave" : "focusout";
                this.$element.on(h + "." + this.type, this.options.selector, a.proxy(this.enter, this)), this.$element.on(i + "." + this.type, this.options.selector, a.proxy(this.leave, this))
            }
        }
        this.options.selector ? this._options = a.extend({}, this.options, {
            trigger: "manual",
            selector: ""
        }) : this.fixTitle()
    }, c.prototype.getDefaults = function() {
        return c.DEFAULTS
    }, c.prototype.getOptions = function(b) {
        return b = a.extend({}, this.getDefaults(), this.$element.data(), b), b.delay && "number" == typeof b.delay && (b.delay = {
            show: b.delay,
            hide: b.delay
        }), b
    }, c.prototype.getDelegateOptions = function() {
        var b = {},
            c = this.getDefaults();
        return this._options && a.each(this._options, function(a, d) {
            c[a] != d && (b[a] = d)
        }), b
    }, c.prototype.enter = function(b) {
        var c = b instanceof this.constructor ? b : a(b.currentTarget).data("bs." + this.type);
        return c || (c = new this.constructor(b.currentTarget, this.getDelegateOptions()), a(b.currentTarget).data("bs." + this.type, c)), clearTimeout(c.timeout), c.hoverState = "in", c.options.delay && c.options.delay.show ? void(c.timeout = setTimeout(function() {
            "in" == c.hoverState && c.show()
        }, c.options.delay.show)) : c.show()
    }, c.prototype.leave = function(b) {
        var c = b instanceof this.constructor ? b : a(b.currentTarget).data("bs." + this.type);
        return c || (c = new this.constructor(b.currentTarget, this.getDelegateOptions()), a(b.currentTarget).data("bs." + this.type, c)), clearTimeout(c.timeout), c.hoverState = "out", c.options.delay && c.options.delay.hide ? void(c.timeout = setTimeout(function() {
            "out" == c.hoverState && c.hide()
        }, c.options.delay.hide)) : c.hide()
    }, c.prototype.show = function() {
        var b = a.Event("show.bs." + this.type);
        if (this.hasContent() && this.enabled) {
            this.$element.trigger(b);
            var c = a.contains(document.documentElement, this.$element[0]);
            if (b.isDefaultPrevented() || !c) return;
            var d = this,
                e = this.tip(),
                f = this.getUID(this.type);
            this.setContent(), e.attr("id", f), this.$element.attr("aria-describedby", f), this.options.animation && e.addClass("fade");
            var g = "function" == typeof this.options.placement ? this.options.placement.call(this, e[0], this.$element[0]) : this.options.placement,
                h = /\s?auto?\s?/i,
                i = h.test(g);
            i && (g = g.replace(h, "") || "top"), e.detach().css({
                top: 0,
                left: 0,
                display: "block"
            }).addClass(g).data("bs." + this.type, this), this.options.container ? e.appendTo(this.options.container) : e.insertAfter(this.$element);
            var j = this.getPosition(),
                k = e[0].offsetWidth,
                l = e[0].offsetHeight;
            if (i) {
                var m = g,
                    n = this.$element.parent(),
                    o = this.getPosition(n);
                g = "bottom" == g && j.top + j.height + l - o.scroll > o.height ? "top" : "top" == g && j.top - o.scroll - l < 0 ? "bottom" : "right" == g && j.right + k > o.width ? "left" : "left" == g && j.left - k < o.left ? "right" : g, e.removeClass(m).addClass(g)
            }
            var p = this.getCalculatedOffset(g, j, k, l);
            this.applyPlacement(p, g);
            var q = function() {
                d.$element.trigger("shown.bs." + d.type), d.hoverState = null
            };
            a.support.transition && this.$tip.hasClass("fade") ? e.one("bsTransitionEnd", q).emulateTransitionEnd(150) : q()
        }
    }, c.prototype.applyPlacement = function(b, c) {
        var d = this.tip(),
            e = d[0].offsetWidth,
            f = d[0].offsetHeight,
            g = parseInt(d.css("margin-top"), 10),
            h = parseInt(d.css("margin-left"), 10);
        isNaN(g) && (g = 0), isNaN(h) && (h = 0), b.top = b.top + g, b.left = b.left + h, a.offset.setOffset(d[0], a.extend({
            using: function(a) {
                d.css({
                    top: Math.round(a.top),
                    left: Math.round(a.left)
                })
            }
        }, b), 0), d.addClass("in");
        var i = d[0].offsetWidth,
            j = d[0].offsetHeight;
        "top" == c && j != f && (b.top = b.top + f - j);
        var k = this.getViewportAdjustedDelta(c, b, i, j);
        k.left ? b.left += k.left : b.top += k.top;
        var l = k.left ? 2 * k.left - e + i : 2 * k.top - f + j,
            m = k.left ? "left" : "top",
            n = k.left ? "offsetWidth" : "offsetHeight";
        d.offset(b), this.replaceArrow(l, d[0][n], m)
    }, c.prototype.replaceArrow = function(a, b, c) {
        this.arrow().css(c, a ? 50 * (1 - a / b) + "%" : "")
    }, c.prototype.setContent = function() {
        var a = this.tip(),
            b = this.getTitle();
        a.find(".tooltip-inner")[this.options.html ? "html" : "text"](b), a.removeClass("fade in top bottom left right")
    }, c.prototype.hide = function() {
        function b() {
            "in" != c.hoverState && d.detach(), c.$element.trigger("hidden.bs." + c.type)
        }
        var c = this,
            d = this.tip(),
            e = a.Event("hide.bs." + this.type);
        return this.$element.removeAttr("aria-describedby"), this.$element.trigger(e), e.isDefaultPrevented() ? void 0 : (d.removeClass("in"), a.support.transition && this.$tip.hasClass("fade") ? d.one("bsTransitionEnd", b).emulateTransitionEnd(150) : b(), this.hoverState = null, this)
    }, c.prototype.fixTitle = function() {
        var a = this.$element;
        (a.attr("title") || "string" != typeof a.attr("data-original-title")) && a.attr("data-original-title", a.attr("title") || "").attr("title", "")
    }, c.prototype.hasContent = function() {
        return this.getTitle()
    }, c.prototype.getPosition = function(b) {
        b = b || this.$element;
        var c = b[0],
            d = "BODY" == c.tagName;
        return a.extend({}, "function" == typeof c.getBoundingClientRect ? c.getBoundingClientRect() : null, {
            scroll: d ? document.documentElement.scrollTop || document.body.scrollTop : b.scrollTop(),
            width: d ? a(window).width() : b.outerWidth(),
            height: d ? a(window).height() : b.outerHeight()
        }, d ? {
            top: 0,
            left: 0
        } : b.offset())
    }, c.prototype.getCalculatedOffset = function(a, b, c, d) {
        return "bottom" == a ? {
            top: b.top + b.height,
            left: b.left + b.width / 2 - c / 2
        } : "top" == a ? {
            top: b.top - d,
            left: b.left + b.width / 2 - c / 2
        } : "left" == a ? {
            top: b.top + b.height / 2 - d / 2,
            left: b.left - c
        } : {
            top: b.top + b.height / 2 - d / 2,
            left: b.left + b.width
        }
    }, c.prototype.getViewportAdjustedDelta = function(a, b, c, d) {
        var e = {
            top: 0,
            left: 0
        };
        if (!this.$viewport) return e;
        var f = this.options.viewport && this.options.viewport.padding || 0,
            g = this.getPosition(this.$viewport);
        if (/right|left/.test(a)) {
            var h = b.top - f - g.scroll,
                i = b.top + f - g.scroll + d;
            h < g.top ? e.top = g.top - h : i > g.top + g.height && (e.top = g.top + g.height - i)
        } else {
            var j = b.left - f,
                k = b.left + f + c;
            j < g.left ? e.left = g.left - j : k > g.width && (e.left = g.left + g.width - k)
        }
        return e
    }, c.prototype.getTitle = function() {
        var a, b = this.$element,
            c = this.options;
        return a = b.attr("data-original-title") || ("function" == typeof c.title ? c.title.call(b[0]) : c.title)
    }, c.prototype.getUID = function(a) {
        do a += ~~(1e6 * Math.random()); while (document.getElementById(a));
        return a
    }, c.prototype.tip = function() {
        return this.$tip = this.$tip || a(this.options.template)
    }, c.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
    }, c.prototype.validate = function() {
        this.$element[0].parentNode || (this.hide(), this.$element = null, this.options = null)
    }, c.prototype.enable = function() {
        this.enabled = !0
    }, c.prototype.disable = function() {
        this.enabled = !1
    }, c.prototype.toggleEnabled = function() {
        this.enabled = !this.enabled
    }, c.prototype.toggle = function(b) {
        var c = this;
        b && (c = a(b.currentTarget).data("bs." + this.type), c || (c = new this.constructor(b.currentTarget, this.getDelegateOptions()), a(b.currentTarget).data("bs." + this.type, c))), c.tip().hasClass("in") ? c.leave(c) : c.enter(c)
    }, c.prototype.destroy = function() {
        clearTimeout(this.timeout), this.hide().$element.off("." + this.type).removeData("bs." + this.type)
    };
    var d = a.fn.tooltip;
    a.fn.tooltip = b, a.fn.tooltip.Constructor = c, a.fn.tooltip.noConflict = function() {
        return a.fn.tooltip = d, this
    }
}(jQuery), + function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.popover"),
                f = "object" == typeof b && b;
            (e || "destroy" != b) && (e || d.data("bs.popover", e = new c(this, f)), "string" == typeof b && e[b]())
        })
    }
    var c = function(a, b) {
        this.init("popover", a, b)
    };
    if (!a.fn.tooltip) throw new Error("Popover requires tooltip.js");
    c.VERSION = "3.2.0", c.DEFAULTS = a.extend({}, a.fn.tooltip.Constructor.DEFAULTS, {
        placement: "right",
        trigger: "click",
        content: "",
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
    }), c.prototype = a.extend({}, a.fn.tooltip.Constructor.prototype), c.prototype.constructor = c, c.prototype.getDefaults = function() {
        return c.DEFAULTS
    }, c.prototype.setContent = function() {
        var a = this.tip(),
            b = this.getTitle(),
            c = this.getContent();
        a.find(".popover-title")[this.options.html ? "html" : "text"](b), a.find(".popover-content").empty()[this.options.html ? "string" == typeof c ? "html" : "append" : "text"](c), a.removeClass("fade top bottom left right in"), a.find(".popover-title").html() || a.find(".popover-title").hide()
    }, c.prototype.hasContent = function() {
        return this.getTitle() || this.getContent()
    }, c.prototype.getContent = function() {
        var a = this.$element,
            b = this.options;
        return a.attr("data-content") || ("function" == typeof b.content ? b.content.call(a[0]) : b.content)
    }, c.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".arrow")
    }, c.prototype.tip = function() {
        return this.$tip || (this.$tip = a(this.options.template)), this.$tip
    };
    var d = a.fn.popover;
    a.fn.popover = b, a.fn.popover.Constructor = c, a.fn.popover.noConflict = function() {
        return a.fn.popover = d, this
    }
}(jQuery), + function(a) {
    "use strict";

    function b(c, d) {
        var e = a.proxy(this.process, this);
        this.$body = a("body"), this.$scrollElement = a(a(c).is("body") ? window : c), this.options = a.extend({}, b.DEFAULTS, d), this.selector = (this.options.target || "") + " .nav li > a", this.offsets = [], this.targets = [], this.activeTarget = null, this.scrollHeight = 0, this.$scrollElement.on("scroll.bs.scrollspy", e), this.refresh(), this.process()
    }

    function c(c) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.scrollspy"),
                f = "object" == typeof c && c;
            e || d.data("bs.scrollspy", e = new b(this, f)), "string" == typeof c && e[c]()
        })
    }
    b.VERSION = "3.2.0", b.DEFAULTS = {
        offset: 10
    }, b.prototype.getScrollHeight = function() {
        return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
    }, b.prototype.refresh = function() {
        var b = "offset",
            c = 0;
        a.isWindow(this.$scrollElement[0]) || (b = "position", c = this.$scrollElement.scrollTop()), this.offsets = [], this.targets = [], this.scrollHeight = this.getScrollHeight();
        var d = this;
        this.$body.find(this.selector).map(function() {
            var d = a(this),
                e = d.data("target") || d.attr("href"),
                f = /^#./.test(e) && a(e);
            return f && f.length && f.is(":visible") && [
                [f[b]().top + c, e]
            ] || null
        }).sort(function(a, b) {
            return a[0] - b[0]
        }).each(function() {
            d.offsets.push(this[0]), d.targets.push(this[1])
        })
    }, b.prototype.process = function() {
        var a, b = this.$scrollElement.scrollTop() + this.options.offset,
            c = this.getScrollHeight(),
            d = this.options.offset + c - this.$scrollElement.height(),
            e = this.offsets,
            f = this.targets,
            g = this.activeTarget;
        if (this.scrollHeight != c && this.refresh(), b >= d) return g != (a = f[f.length - 1]) && this.activate(a);
        if (g && b <= e[0]) return g != (a = f[0]) && this.activate(a);
        for (a = e.length; a--;) g != f[a] && b >= e[a] && (!e[a + 1] || b <= e[a + 1]) && this.activate(f[a])
    }, b.prototype.activate = function(b) {
        this.activeTarget = b, a(this.selector).parentsUntil(this.options.target, ".active").removeClass("active");
        var c = this.selector + '[data-target="' + b + '"],' + this.selector + '[href="' + b + '"]',
            d = a(c).parents("li").addClass("active");
        d.parent(".dropdown-menu").length && (d = d.closest("li.dropdown").addClass("active")), d.trigger("activate.bs.scrollspy")
    };
    var d = a.fn.scrollspy;
    a.fn.scrollspy = c, a.fn.scrollspy.Constructor = b, a.fn.scrollspy.noConflict = function() {
        return a.fn.scrollspy = d, this
    }, a(window).on("load.bs.scrollspy.data-api", function() {
        a('[data-spy="scroll"]').each(function() {
            var b = a(this);
            c.call(b, b.data())
        })
    })
}(jQuery), + function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.tab");
            e || d.data("bs.tab", e = new c(this)), "string" == typeof b && e[b]()
        })
    }
    var c = function(b) {
        this.element = a(b)
    };
    c.VERSION = "3.2.0", c.prototype.show = function() {
        var b = this.element,
            c = b.closest("ul:not(.dropdown-menu)"),
            d = b.data("target");
        if (d || (d = b.attr("href"), d = d && d.replace(/.*(?=#[^\s]*$)/, "")), !b.parent("li").hasClass("active")) {
            var e = c.find(".active:last a")[0],
                f = a.Event("show.bs.tab", {
                    relatedTarget: e
                });
            if (b.trigger(f), !f.isDefaultPrevented()) {
                var g = a(d);
                this.activate(b.closest("li"), c), this.activate(g, g.parent(), function() {
                    b.trigger({
                        type: "shown.bs.tab",
                        relatedTarget: e
                    })
                })
            }
        }
    }, c.prototype.activate = function(b, c, d) {
        function e() {
            f.removeClass("active").find("> .dropdown-menu > .active").removeClass("active"), b.addClass("active"), g ? (b[0].offsetWidth, b.addClass("in")) : b.removeClass("fade"), b.parent(".dropdown-menu") && b.closest("li.dropdown").addClass("active"), d && d()
        }
        var f = c.find("> .active"),
            g = d && a.support.transition && f.hasClass("fade");
        g ? f.one("bsTransitionEnd", e).emulateTransitionEnd(150) : e(), f.removeClass("in")
    };
    var d = a.fn.tab;
    a.fn.tab = b, a.fn.tab.Constructor = c, a.fn.tab.noConflict = function() {
        return a.fn.tab = d, this
    }, a(document).on("click.bs.tab.data-api", '[data-toggle="tab"], [data-toggle="pill"]', function(c) {
        c.preventDefault(), b.call(a(this), "show")
    })
}(jQuery), + function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.affix"),
                f = "object" == typeof b && b;
            e || d.data("bs.affix", e = new c(this, f)), "string" == typeof b && e[b]()
        })
    }
    var c = function(b, d) {
        this.options = a.extend({}, c.DEFAULTS, d), this.$target = a(this.options.target).on("scroll.bs.affix.data-api", a.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", a.proxy(this.checkPositionWithEventLoop, this)), this.$element = a(b), this.affixed = this.unpin = this.pinnedOffset = null, this.checkPosition()
    };
    c.VERSION = "3.2.0", c.RESET = "affix affix-top affix-bottom", c.DEFAULTS = {
        offset: 0,
        target: window
    }, c.prototype.getPinnedOffset = function() {
        if (this.pinnedOffset) return this.pinnedOffset;
        this.$element.removeClass(c.RESET).addClass("affix");
        var a = this.$target.scrollTop(),
            b = this.$element.offset();
        return this.pinnedOffset = b.top - a
    }, c.prototype.checkPositionWithEventLoop = function() {
        setTimeout(a.proxy(this.checkPosition, this), 1)
    }, c.prototype.checkPosition = function() {
        if (this.$element.is(":visible")) {
            var b = a(document).height(),
                d = this.$target.scrollTop(),
                e = this.$element.offset(),
                f = this.options.offset,
                g = f.top,
                h = f.bottom;
            "object" != typeof f && (h = g = f), "function" == typeof g && (g = f.top(this.$element)), "function" == typeof h && (h = f.bottom(this.$element));
            var i = null != this.unpin && d + this.unpin <= e.top ? !1 : null != h && e.top + this.$element.height() >= b - h ? "bottom" : null != g && g >= d ? "top" : !1;
            if (this.affixed !== i) {
                null != this.unpin && this.$element.css("top", "");
                var j = "affix" + (i ? "-" + i : ""),
                    k = a.Event(j + ".bs.affix");
                this.$element.trigger(k), k.isDefaultPrevented() || (this.affixed = i, this.unpin = "bottom" == i ? this.getPinnedOffset() : null, this.$element.removeClass(c.RESET).addClass(j).trigger(a.Event(j.replace("affix", "affixed"))), "bottom" == i && this.$element.offset({
                    top: b - this.$element.height() - h
                }))
            }
        }
    };
    var d = a.fn.affix;
    a.fn.affix = b, a.fn.affix.Constructor = c, a.fn.affix.noConflict = function() {
        return a.fn.affix = d, this
    }, a(window).on("load", function() {
        a('[data-spy="affix"]').each(function() {
            var c = a(this),
                d = c.data();
            d.offset = d.offset || {}, d.offsetBottom && (d.offset.bottom = d.offsetBottom), d.offsetTop && (d.offset.top = d.offsetTop), b.call(c, d)
        })
    })
}(jQuery);
(function(e, t) {
    function _(e) {
        var t = M[e] = {};
        return v.each(e.split(y), function(e, n) {
            t[n] = !0
        }), t
    }

    function H(e, n, r) {
        if (r === t && e.nodeType === 1) {
            var i = "data-" + n.replace(P, "-$1").toLowerCase();
            r = e.getAttribute(i);
            if (typeof r == "string") {
                try {
                    r = r === "true" ? !0 : r === "false" ? !1 : r === "null" ? null : +r + "" === r ? +r : D.test(r) ? v.parseJSON(r) : r
                } catch (s) {}
                v.data(e, n, r)
            } else {
                r = t
            }
        }
        return r
    }

    function B(e) {
        var t;
        for (t in e) {
            if (t === "data" && v.isEmptyObject(e[t])) {
                continue
            }
            if (t !== "toJSON") {
                return !1
            }
        }
        return !0
    }

    function et() {
        return !1
    }

    function tt() {
        return !0
    }

    function ut(e) {
        return !e || !e.parentNode || e.parentNode.nodeType === 11
    }

    function at(e, t) {
        do {
            e = e[t]
        } while (e && e.nodeType !== 1);
        return e
    }

    function ft(e, t, n) {
        t = t || 0;
        if (v.isFunction(t)) {
            return v.grep(e, function(e, r) {
                var i = !!t.call(e, r, e);
                return i === n
            })
        }
        if (t.nodeType) {
            return v.grep(e, function(e, r) {
                return e === t === n
            })
        }
        if (typeof t == "string") {
            var r = v.grep(e, function(e) {
                return e.nodeType === 1
            });
            if (it.test(t)) {
                return v.filter(t, r, !n)
            }
            t = v.filter(t, r)
        }
        return v.grep(e, function(e, r) {
            return v.inArray(e, t) >= 0 === n
        })
    }

    function lt(e) {
        var t = ct.split("|"),
            n = e.createDocumentFragment();
        if (n.createElement) {
            while (t.length) {
                n.createElement(t.pop())
            }
        }
        return n
    }

    function Lt(e, t) {
        return e.getElementsByTagName(t)[0] || e.appendChild(e.ownerDocument.createElement(t))
    }

    function At(e, t) {
        if (t.nodeType !== 1 || !v.hasData(e)) {
            return
        }
        var n, r, i, s = v._data(e),
            o = v._data(t, s),
            u = s.events;
        if (u) {
            delete o.handle, o.events = {};
            for (n in u) {
                for (r = 0, i = u[n].length; r < i; r++) {
                    v.event.add(t, n, u[n][r])
                }
            }
        }
        o.data && (o.data = v.extend({}, o.data))
    }

    function Ot(e, t) {
        var n;
        if (t.nodeType !== 1) {
            return
        }
        t.clearAttributes && t.clearAttributes(), t.mergeAttributes && t.mergeAttributes(e), n = t.nodeName.toLowerCase(), n === "object" ? (t.parentNode && (t.outerHTML = e.outerHTML), v.support.html5Clone && e.innerHTML && !v.trim(t.innerHTML) && (t.innerHTML = e.innerHTML)) : n === "input" && Et.test(e.type) ? (t.defaultChecked = t.checked = e.checked, t.value !== e.value && (t.value = e.value)) : n === "option" ? t.selected = e.defaultSelected : n === "input" || n === "textarea" ? t.defaultValue = e.defaultValue : n === "script" && t.text !== e.text && (t.text = e.text), t.removeAttribute(v.expando)
    }

    function Mt(e) {
        return typeof e.getElementsByTagName != "undefined" ? e.getElementsByTagName("*") : typeof e.querySelectorAll != "undefined" ? e.querySelectorAll("*") : []
    }

    function _t(e) {
        Et.test(e.type) && (e.defaultChecked = e.checked)
    }

    function Qt(e, t) {
        if (t in e) {
            return t
        }
        var n = t.charAt(0).toUpperCase() + t.slice(1),
            r = t,
            i = Jt.length;
        while (i--) {
            t = Jt[i] + n;
            if (t in e) {
                return t
            }
        }
        return r
    }

    function Gt(e, t) {
        return e = t || e, v.css(e, "display") === "none" || !v.contains(e.ownerDocument, e)
    }

    function Yt(e, t) {
        var n, r, i = [],
            s = 0,
            o = e.length;
        for (; s < o; s++) {
            n = e[s];
            if (!n.style) {
                continue
            }
            i[s] = v._data(n, "olddisplay"), t ? (!i[s] && n.style.display === "none" && (n.style.display = ""), n.style.display === "" && Gt(n) && (i[s] = v._data(n, "olddisplay", nn(n.nodeName)))) : (r = Dt(n, "display"), !i[s] && r !== "none" && v._data(n, "olddisplay", r))
        }
        for (s = 0; s < o; s++) {
            n = e[s];
            if (!n.style) {
                continue
            }
            if (!t || n.style.display === "none" || n.style.display === "") {
                n.style.display = t ? i[s] || "" : "none"
            }
        }
        return e
    }

    function Zt(e, t, n) {
        var r = Rt.exec(t);
        return r ? Math.max(0, r[1] - (n || 0)) + (r[2] || "px") : t
    }

    function en(e, t, n, r) {
        var i = n === (r ? "border" : "content") ? 4 : t === "width" ? 1 : 0,
            s = 0;
        for (; i < 4; i += 2) {
            n === "margin" && (s += v.css(e, n + $t[i], !0)), r ? (n === "content" && (s -= parseFloat(Dt(e, "padding" + $t[i])) || 0), n !== "margin" && (s -= parseFloat(Dt(e, "border" + $t[i] + "Width")) || 0)) : (s += parseFloat(Dt(e, "padding" + $t[i])) || 0, n !== "padding" && (s += parseFloat(Dt(e, "border" + $t[i] + "Width")) || 0))
        }
        return s
    }

    function tn(e, t, n) {
        var r = t === "width" ? e.offsetWidth : e.offsetHeight,
            i = !0,
            s = v.support.boxSizing && v.css(e, "boxSizing") === "border-box";
        if (r <= 0 || r == null) {
            r = Dt(e, t);
            if (r < 0 || r == null) {
                r = e.style[t]
            }
            if (Ut.test(r)) {
                return r
            }
            i = s && (v.support.boxSizingReliable || r === e.style[t]), r = parseFloat(r) || 0
        }
        return r + en(e, t, n || (s ? "border" : "content"), i) + "px"
    }

    function nn(e) {
        if (Wt[e]) {
            return Wt[e]
        }
        var t = v("<" + e + ">").appendTo(i.body),
            n = t.css("display");
        t.remove();
        if (n === "none" || n === "") {
            Pt = i.body.appendChild(Pt || v.extend(i.createElement("iframe"), {
                frameBorder: 0,
                width: 0,
                height: 0
            }));
            if (!Ht || !Pt.createElement) {
                Ht = (Pt.contentWindow || Pt.contentDocument).document, Ht.write("<!doctype html><html><body>"), Ht.close()
            }
            t = Ht.body.appendChild(Ht.createElement(e)), n = Dt(t, "display"), i.body.removeChild(Pt)
        }
        return Wt[e] = n, n
    }

    function fn(e, t, n, r) {
        var i;
        if (v.isArray(t)) {
            v.each(t, function(t, i) {
                n || sn.test(e) ? r(e, i) : fn(e + "[" + (typeof i == "object" ? t : "") + "]", i, n, r)
            })
        } else {
            if (!n && v.type(t) === "object") {
                for (i in t) {
                    fn(e + "[" + i + "]", t[i], n, r)
                }
            } else {
                r(e, t)
            }
        }
    }

    function Cn(e) {
        return function(t, n) {
            typeof t != "string" && (n = t, t = "*");
            var r, i, s, o = t.toLowerCase().split(y),
                u = 0,
                a = o.length;
            if (v.isFunction(n)) {
                for (; u < a; u++) {
                    r = o[u], s = /^\+/.test(r), s && (r = r.substr(1) || "*"), i = e[r] = e[r] || [], i[s ? "unshift" : "push"](n)
                }
            }
        }
    }

    function kn(e, n, r, i, s, o) {
        s = s || n.dataTypes[0], o = o || {}, o[s] = !0;
        var u, a = e[s],
            f = 0,
            l = a ? a.length : 0,
            c = e === Sn;
        for (; f < l && (c || !u); f++) {
            u = a[f](n, r, i), typeof u == "string" && (!c || o[u] ? u = t : (n.dataTypes.unshift(u), u = kn(e, n, r, i, u, o)))
        }
        return (c || !u) && !o["*"] && (u = kn(e, n, r, i, "*", o)), u
    }

    function Ln(e, n) {
        var r, i, s = v.ajaxSettings.flatOptions || {};
        for (r in n) {
            n[r] !== t && ((s[r] ? e : i || (i = {}))[r] = n[r])
        }
        i && v.extend(!0, e, i)
    }

    function An(e, n, r) {
        var i, s, o, u, a = e.contents,
            f = e.dataTypes,
            l = e.responseFields;
        for (s in l) {
            s in r && (n[l[s]] = r[s])
        }
        while (f[0] === "*") {
            f.shift(), i === t && (i = e.mimeType || n.getResponseHeader("content-type"))
        }
        if (i) {
            for (s in a) {
                if (a[s] && a[s].test(i)) {
                    f.unshift(s);
                    break
                }
            }
        }
        if (f[0] in r) {
            o = f[0]
        } else {
            for (s in r) {
                if (!f[0] || e.converters[s + " " + f[0]]) {
                    o = s;
                    break
                }
                u || (u = s)
            }
            o = o || u
        }
        if (o) {
            return o !== f[0] && f.unshift(o), r[o]
        }
    }

    function On(e, t) {
        var n, r, i, s, o = e.dataTypes.slice(),
            u = o[0],
            a = {},
            f = 0;
        e.dataFilter && (t = e.dataFilter(t, e.dataType));
        if (o[1]) {
            for (n in e.converters) {
                a[n.toLowerCase()] = e.converters[n]
            }
        }
        for (; i = o[++f];) {
            if (i !== "*") {
                if (u !== "*" && u !== i) {
                    n = a[u + " " + i] || a["* " + i];
                    if (!n) {
                        for (r in a) {
                            s = r.split(" ");
                            if (s[1] === i) {
                                n = a[u + " " + s[0]] || a["* " + s[0]];
                                if (n) {
                                    n === !0 ? n = a[r] : a[r] !== !0 && (i = s[0], o.splice(f--, 0, i));
                                    break
                                }
                            }
                        }
                    }
                    if (n !== !0) {
                        if (n && e["throws"]) {
                            t = n(t)
                        } else {
                            try {
                                t = n(t)
                            } catch (l) {
                                return {
                                    state: "parsererror",
                                    error: n ? l : "No conversion from " + u + " to " + i
                                }
                            }
                        }
                    }
                }
                u = i
            }
        }
        return {
            state: "success",
            data: t
        }
    }

    function Fn() {
        try {
            return new e.XMLHttpRequest
        } catch (t) {}
    }

    function In() {
        try {
            return new e.ActiveXObject("Microsoft.XMLHTTP")
        } catch (t) {}
    }

    function $n() {
        return setTimeout(function() {
            qn = t
        }, 0), qn = v.now()
    }

    function Jn(e, t) {
        v.each(t, function(t, n) {
            var r = (Vn[t] || []).concat(Vn["*"]),
                i = 0,
                s = r.length;
            for (; i < s; i++) {
                if (r[i].call(e, t, n)) {
                    return
                }
            }
        })
    }

    function Kn(e, t, n) {
        var r, i = 0,
            s = 0,
            o = Xn.length,
            u = v.Deferred().always(function() {
                delete a.elem
            }),
            a = function() {
                var t = qn || $n(),
                    n = Math.max(0, f.startTime + f.duration - t),
                    r = n / f.duration || 0,
                    i = 1 - r,
                    s = 0,
                    o = f.tweens.length;
                for (; s < o; s++) {
                    f.tweens[s].run(i)
                }
                return u.notifyWith(e, [f, i, n]), i < 1 && o ? n : (u.resolveWith(e, [f]), !1)
            },
            f = u.promise({
                elem: e,
                props: v.extend({}, t),
                opts: v.extend(!0, {
                    specialEasing: {}
                }, n),
                originalProperties: t,
                originalOptions: n,
                startTime: qn || $n(),
                duration: n.duration,
                tweens: [],
                createTween: function(t, n, r) {
                    var i = v.Tween(e, f.opts, t, n, f.opts.specialEasing[t] || f.opts.easing);
                    return f.tweens.push(i), i
                },
                stop: function(t) {
                    var n = 0,
                        r = t ? f.tweens.length : 0;
                    for (; n < r; n++) {
                        f.tweens[n].run(1)
                    }
                    return t ? u.resolveWith(e, [f, t]) : u.rejectWith(e, [f, t]), this
                }
            }),
            l = f.props;
        Qn(l, f.opts.specialEasing);
        for (; i < o; i++) {
            r = Xn[i].call(f, e, l, f.opts);
            if (r) {
                return r
            }
        }
        return Jn(f, l), v.isFunction(f.opts.start) && f.opts.start.call(e, f), v.fx.timer(v.extend(a, {
            anim: f,
            queue: f.opts.queue,
            elem: e
        })), f.progress(f.opts.progress).done(f.opts.done, f.opts.complete).fail(f.opts.fail).always(f.opts.always)
    }

    function Qn(e, t) {
        var n, r, i, s, o;
        for (n in e) {
            r = v.camelCase(n), i = t[r], s = e[n], v.isArray(s) && (i = s[1], s = e[n] = s[0]), n !== r && (e[r] = s, delete e[n]), o = v.cssHooks[r];
            if (o && "expand" in o) {
                s = o.expand(s), delete e[r];
                for (n in s) {
                    n in e || (e[n] = s[n], t[n] = i)
                }
            } else {
                t[r] = i
            }
        }
    }

    function Gn(e, t, n) {
        var r, i, s, o, u, a, f, l, c, h = this,
            p = e.style,
            d = {},
            m = [],
            g = e.nodeType && Gt(e);
        n.queue || (l = v._queueHooks(e, "fx"), l.unqueued == null && (l.unqueued = 0, c = l.empty.fire, l.empty.fire = function() {
            l.unqueued || c()
        }), l.unqueued++, h.always(function() {
            h.always(function() {
                l.unqueued--, v.queue(e, "fx").length || l.empty.fire()
            })
        })), e.nodeType === 1 && ("height" in t || "width" in t) && (n.overflow = [p.overflow, p.overflowX, p.overflowY], v.css(e, "display") === "inline" && v.css(e, "float") === "none" && (!v.support.inlineBlockNeedsLayout || nn(e.nodeName) === "inline" ? p.display = "inline-block" : p.zoom = 1)), n.overflow && (p.overflow = "hidden", v.support.shrinkWrapBlocks || h.done(function() {
            p.overflow = n.overflow[0], p.overflowX = n.overflow[1], p.overflowY = n.overflow[2]
        }));
        for (r in t) {
            s = t[r];
            if (Un.exec(s)) {
                delete t[r], a = a || s === "toggle";
                if (s === (g ? "hide" : "show")) {
                    continue
                }
                m.push(r)
            }
        }
        o = m.length;
        if (o) {
            u = v._data(e, "fxshow") || v._data(e, "fxshow", {}), "hidden" in u && (g = u.hidden), a && (u.hidden = !g), g ? v(e).show() : h.done(function() {
                v(e).hide()
            }), h.done(function() {
                var t;
                v.removeData(e, "fxshow", !0);
                for (t in d) {
                    v.style(e, t, d[t])
                }
            });
            for (r = 0; r < o; r++) {
                i = m[r], f = h.createTween(i, g ? u[i] : 0), d[i] = u[i] || v.style(e, i), i in u || (u[i] = f.start, g && (f.end = f.start, f.start = i === "width" || i === "height" ? 1 : 0))
            }
        }
    }

    function Yn(e, t, n, r, i) {
        return new Yn.prototype.init(e, t, n, r, i)
    }

    function Zn(e, t) {
        var n, r = {
                height: e
            },
            i = 0;
        t = t ? 1 : 0;
        for (; i < 4; i += 2 - t) {
            n = $t[i], r["margin" + n] = r["padding" + n] = e
        }
        return t && (r.opacity = r.width = e), r
    }

    function tr(e) {
        return v.isWindow(e) ? e : e.nodeType === 9 ? e.defaultView || e.parentWindow : !1
    }
    var n, r, i = e.document,
        s = e.location,
        o = e.navigator,
        u = e.jQuery,
        a = e.$,
        f = Array.prototype.push,
        l = Array.prototype.slice,
        c = Array.prototype.indexOf,
        h = Object.prototype.toString,
        p = Object.prototype.hasOwnProperty,
        d = String.prototype.trim,
        v = function(e, t) {
            return new v.fn.init(e, t, n)
        },
        m = /[\-+]?(?:\d*\.|)\d+(?:[eE][\-+]?\d+|)/.source,
        g = /\S/,
        y = /\s+/,
        b = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
        w = /^(?:[^#<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,
        E = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
        S = /^[\],:{}\s]*$/,
        x = /(?:^|:|,)(?:\s*\[)+/g,
        T = /\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,
        N = /"[^"\\\r\n]*"|true|false|null|-?(?:\d\d*\.|)\d+(?:[eE][\-+]?\d+|)/g,
        C = /^-ms-/,
        k = /-([\da-z])/gi,
        L = function(e, t) {
            return (t + "").toUpperCase()
        },
        A = function() {
            i.addEventListener ? (i.removeEventListener("DOMContentLoaded", A, !1), v.ready()) : i.readyState === "complete" && (i.detachEvent("onreadystatechange", A), v.ready())
        },
        O = {};
    v.fn = v.prototype = {
        constructor: v,
        init: function(e, n, r) {
            var s, o, u, a;
            if (!e) {
                return this
            }
            if (e.nodeType) {
                return this.context = this[0] = e, this.length = 1, this
            }
            if (typeof e == "string") {
                e.charAt(0) === "<" && e.charAt(e.length - 1) === ">" && e.length >= 3 ? s = [null, e, null] : s = w.exec(e);
                if (s && (s[1] || !n)) {
                    if (s[1]) {
                        return n = n instanceof v ? n[0] : n, a = n && n.nodeType ? n.ownerDocument || n : i, e = v.parseHTML(s[1], a, !0), E.test(s[1]) && v.isPlainObject(n) && this.attr.call(e, n, !0), v.merge(this, e)
                    }
                    o = i.getElementById(s[2]);
                    if (o && o.parentNode) {
                        if (o.id !== s[2]) {
                            return r.find(e)
                        }
                        this.length = 1, this[0] = o
                    }
                    return this.context = i, this.selector = e, this
                }
                return !n || n.jquery ? (n || r).find(e) : this.constructor(n).find(e)
            }
            return v.isFunction(e) ? r.ready(e) : (e.selector !== t && (this.selector = e.selector, this.context = e.context), v.makeArray(e, this))
        },
        selector: "",
        jquery: "1.8.3",
        length: 0,
        size: function() {
            return this.length
        },
        toArray: function() {
            return l.call(this)
        },
        get: function(e) {
            return e == null ? this.toArray() : e < 0 ? this[this.length + e] : this[e]
        },
        pushStack: function(e, t, n) {
            var r = v.merge(this.constructor(), e);
            return r.prevObject = this, r.context = this.context, t === "find" ? r.selector = this.selector + (this.selector ? " " : "") + n : t && (r.selector = this.selector + "." + t + "(" + n + ")"), r
        },
        each: function(e, t) {
            return v.each(this, e, t)
        },
        ready: function(e) {
            return v.ready.promise().done(e), this
        },
        eq: function(e) {
            return e = +e, e === -1 ? this.slice(e) : this.slice(e, e + 1)
        },
        first: function() {
            return this.eq(0)
        },
        last: function() {
            return this.eq(-1)
        },
        slice: function() {
            return this.pushStack(l.apply(this, arguments), "slice", l.call(arguments).join(","))
        },
        map: function(e) {
            return this.pushStack(v.map(this, function(t, n) {
                return e.call(t, n, t)
            }))
        },
        end: function() {
            return this.prevObject || this.constructor(null)
        },
        push: f,
        sort: [].sort,
        splice: [].splice
    }, v.fn.init.prototype = v.fn, v.extend = v.fn.extend = function() {
        var e, n, r, i, s, o, u = arguments[0] || {},
            a = 1,
            f = arguments.length,
            l = !1;
        typeof u == "boolean" && (l = u, u = arguments[1] || {}, a = 2), typeof u != "object" && !v.isFunction(u) && (u = {}), f === a && (u = this, --a);
        for (; a < f; a++) {
            if ((e = arguments[a]) != null) {
                for (n in e) {
                    r = u[n], i = e[n];
                    if (u === i) {
                        continue
                    }
                    l && i && (v.isPlainObject(i) || (s = v.isArray(i))) ? (s ? (s = !1, o = r && v.isArray(r) ? r : []) : o = r && v.isPlainObject(r) ? r : {}, u[n] = v.extend(l, o, i)) : i !== t && (u[n] = i)
                }
            }
        }
        return u
    }, v.extend({
        noConflict: function(t) {
            return e.$ === v && (e.$ = a), t && e.jQuery === v && (e.jQuery = u), v
        },
        isReady: !1,
        readyWait: 1,
        holdReady: function(e) {
            e ? v.readyWait++ : v.ready(!0)
        },
        ready: function(e) {
            if (e === !0 ? --v.readyWait : v.isReady) {
                return
            }
            if (!i.body) {
                return setTimeout(v.ready, 1)
            }
            v.isReady = !0;
            if (e !== !0 && --v.readyWait > 0) {
                return
            }
            r.resolveWith(i, [v]), v.fn.trigger && v(i).trigger("ready").off("ready")
        },
        isFunction: function(e) {
            return v.type(e) === "function"
        },
        isArray: Array.isArray || function(e) {
            return v.type(e) === "array"
        },
        isWindow: function(e) {
            return e != null && e == e.window
        },
        isNumeric: function(e) {
            return !isNaN(parseFloat(e)) && isFinite(e)
        },
        type: function(e) {
            return e == null ? String(e) : O[h.call(e)] || "object"
        },
        isPlainObject: function(e) {
            if (!e || v.type(e) !== "object" || e.nodeType || v.isWindow(e)) {
                return !1
            }
            try {
                if (e.constructor && !p.call(e, "constructor") && !p.call(e.constructor.prototype, "isPrototypeOf")) {
                    return !1
                }
            } catch (n) {
                return !1
            }
            var r;
            for (r in e) {}
            return r === t || p.call(e, r)
        },
        isEmptyObject: function(e) {
            var t;
            for (t in e) {
                return !1
            }
            return !0
        },
        error: function(e) {
            throw new Error(e)
        },
        parseHTML: function(e, t, n) {
            var r;
            return !e || typeof e != "string" ? null : (typeof t == "boolean" && (n = t, t = 0), t = t || i, (r = E.exec(e)) ? [t.createElement(r[1])] : (r = v.buildFragment([e], t, n ? null : []), v.merge([], (r.cacheable ? v.clone(r.fragment) : r.fragment).childNodes)))
        },
        parseJSON: function(t) {
            if (!t || typeof t != "string") {
                return null
            }
            t = v.trim(t);
            if (e.JSON && e.JSON.parse) {
                return e.JSON.parse(t)
            }
            if (S.test(t.replace(T, "@").replace(N, "]").replace(x, ""))) {
                return (new Function("return " + t))()
            }
            v.error("Invalid JSON: " + t)
        },
        parseXML: function(n) {
            var r, i;
            if (!n || typeof n != "string") {
                return null
            }
            try {
                e.DOMParser ? (i = new DOMParser, r = i.parseFromString(n, "text/xml")) : (r = new ActiveXObject("Microsoft.XMLDOM"), r.async = "false", r.loadXML(n))
            } catch (s) {
                r = t
            }
            return (!r || !r.documentElement || r.getElementsByTagName("parsererror").length) && v.error("Invalid XML: " + n), r
        },
        noop: function() {},
        globalEval: function(t) {
            t && g.test(t) && (e.execScript || function(t) {
                e.eval.call(e, t)
            })(t)
        },
        camelCase: function(e) {
            return e.replace(C, "ms-").replace(k, L)
        },
        nodeName: function(e, t) {
            return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
        },
        each: function(e, n, r) {
            var i, s = 0,
                o = e.length,
                u = o === t || v.isFunction(e);
            if (r) {
                if (u) {
                    for (i in e) {
                        if (n.apply(e[i], r) === !1) {
                            break
                        }
                    }
                } else {
                    for (; s < o;) {
                        if (n.apply(e[s++], r) === !1) {
                            break
                        }
                    }
                }
            } else {
                if (u) {
                    for (i in e) {
                        if (n.call(e[i], i, e[i]) === !1) {
                            break
                        }
                    }
                } else {
                    for (; s < o;) {
                        if (n.call(e[s], s, e[s++]) === !1) {
                            break
                        }
                    }
                }
            }
            return e
        },
        trim: d && !d.call("\ufeff\u00a0") ? function(e) {
            return e == null ? "" : d.call(e)
        } : function(e) {
            return e == null ? "" : (e + "").replace(b, "")
        },
        makeArray: function(e, t) {
            var n, r = t || [];
            return e != null && (n = v.type(e), e.length == null || n === "string" || n === "function" || n === "regexp" || v.isWindow(e) ? f.call(r, e) : v.merge(r, e)), r
        },
        inArray: function(e, t, n) {
            var r;
            if (t) {
                if (c) {
                    return c.call(t, e, n)
                }
                r = t.length, n = n ? n < 0 ? Math.max(0, r + n) : n : 0;
                for (; n < r; n++) {
                    if (n in t && t[n] === e) {
                        return n
                    }
                }
            }
            return -1
        },
        merge: function(e, n) {
            var r = n.length,
                i = e.length,
                s = 0;
            if (typeof r == "number") {
                for (; s < r; s++) {
                    e[i++] = n[s]
                }
            } else {
                while (n[s] !== t) {
                    e[i++] = n[s++]
                }
            }
            return e.length = i, e
        },
        grep: function(e, t, n) {
            var r, i = [],
                s = 0,
                o = e.length;
            n = !!n;
            for (; s < o; s++) {
                r = !!t(e[s], s), n !== r && i.push(e[s])
            }
            return i
        },
        map: function(e, n, r) {
            var i, s, o = [],
                u = 0,
                a = e.length,
                f = e instanceof v || a !== t && typeof a == "number" && (a > 0 && e[0] && e[a - 1] || a === 0 || v.isArray(e));
            if (f) {
                for (; u < a; u++) {
                    i = n(e[u], u, r), i != null && (o[o.length] = i)
                }
            } else {
                for (s in e) {
                    i = n(e[s], s, r), i != null && (o[o.length] = i)
                }
            }
            return o.concat.apply([], o)
        },
        guid: 1,
        proxy: function(e, n) {
            var r, i, s;
            return typeof n == "string" && (r = e[n], n = e, e = r), v.isFunction(e) ? (i = l.call(arguments, 2), s = function() {
                return e.apply(n, i.concat(l.call(arguments)))
            }, s.guid = e.guid = e.guid || v.guid++, s) : t
        },
        access: function(e, n, r, i, s, o, u) {
            var a, f = r == null,
                l = 0,
                c = e.length;
            if (r && typeof r == "object") {
                for (l in r) {
                    v.access(e, n, l, r[l], 1, o, i)
                }
                s = 1
            } else {
                if (i !== t) {
                    a = u === t && v.isFunction(i), f && (a ? (a = n, n = function(e, t, n) {
                        return a.call(v(e), n)
                    }) : (n.call(e, i), n = null));
                    if (n) {
                        for (; l < c; l++) {
                            n(e[l], r, a ? i.call(e[l], l, n(e[l], r)) : i, u)
                        }
                    }
                    s = 1
                }
            }
            return s ? e : f ? n.call(e) : c ? n(e[0], r) : o
        },
        now: function() {
            return (new Date).getTime()
        }
    }), v.ready.promise = function(t) {
        if (!r) {
            r = v.Deferred();
            if (i.readyState === "complete") {
                setTimeout(v.ready, 1)
            } else {
                if (i.addEventListener) {
                    i.addEventListener("DOMContentLoaded", A, !1), e.addEventListener("load", v.ready, !1)
                } else {
                    i.attachEvent("onreadystatechange", A), e.attachEvent("onload", v.ready);
                    var n = !1;
                    try {
                        n = e.frameElement == null && i.documentElement
                    } catch (s) {}
                    n && n.doScroll && function o() {
                        if (!v.isReady) {
                            try {
                                n.doScroll("left")
                            } catch (e) {
                                return setTimeout(o, 50)
                            }
                            v.ready()
                        }
                    }()
                }
            }
        }
        return r.promise(t)
    }, v.each("Boolean Number String Function Array Date RegExp Object".split(" "), function(e, t) {
        O["[object " + t + "]"] = t.toLowerCase()
    }), n = v(i);
    var M = {};
    v.Callbacks = function(e) {
        e = typeof e == "string" ? M[e] || _(e) : v.extend({}, e);
        var n, r, i, s, o, u, a = [],
            f = !e.once && [],
            l = function(t) {
                n = e.memory && t, r = !0, u = s || 0, s = 0, o = a.length, i = !0;
                for (; a && u < o; u++) {
                    if (a[u].apply(t[0], t[1]) === !1 && e.stopOnFalse) {
                        n = !1;
                        break
                    }
                }
                i = !1, a && (f ? f.length && l(f.shift()) : n ? a = [] : c.disable())
            },
            c = {
                add: function() {
                    if (a) {
                        var t = a.length;
                        (function r(t) {
                            v.each(t, function(t, n) {
                                var i = v.type(n);
                                i === "function" ? (!e.unique || !c.has(n)) && a.push(n) : n && n.length && i !== "string" && r(n)
                            })
                        })(arguments), i ? o = a.length : n && (s = t, l(n))
                    }
                    return this
                },
                remove: function() {
                    return a && v.each(arguments, function(e, t) {
                        var n;
                        while ((n = v.inArray(t, a, n)) > -1) {
                            a.splice(n, 1), i && (n <= o && o--, n <= u && u--)
                        }
                    }), this
                },
                has: function(e) {
                    return v.inArray(e, a) > -1
                },
                empty: function() {
                    return a = [], this
                },
                disable: function() {
                    return a = f = n = t, this
                },
                disabled: function() {
                    return !a
                },
                lock: function() {
                    return f = t, n || c.disable(), this
                },
                locked: function() {
                    return !f
                },
                fireWith: function(e, t) {
                    return t = t || [], t = [e, t.slice ? t.slice() : t], a && (!r || f) && (i ? f.push(t) : l(t)), this
                },
                fire: function() {
                    return c.fireWith(this, arguments), this
                },
                fired: function() {
                    return !!r
                }
            };
        return c
    }, v.extend({
        Deferred: function(e) {
            var t = [
                    ["resolve", "done", v.Callbacks("once memory"), "resolved"],
                    ["reject", "fail", v.Callbacks("once memory"), "rejected"],
                    ["notify", "progress", v.Callbacks("memory")]
                ],
                n = "pending",
                r = {
                    state: function() {
                        return n
                    },
                    always: function() {
                        return i.done(arguments).fail(arguments), this
                    },
                    then: function() {
                        var e = arguments;
                        return v.Deferred(function(n) {
                            v.each(t, function(t, r) {
                                var s = r[0],
                                    o = e[t];
                                i[r[1]](v.isFunction(o) ? function() {
                                    var e = o.apply(this, arguments);
                                    e && v.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[s + "With"](this === i ? n : this, [e])
                                } : n[s])
                            }), e = null
                        }).promise()
                    },
                    promise: function(e) {
                        return e != null ? v.extend(e, r) : r
                    }
                },
                i = {};
            return r.pipe = r.then, v.each(t, function(e, s) {
                var o = s[2],
                    u = s[3];
                r[s[1]] = o.add, u && o.add(function() {
                    n = u
                }, t[e ^ 1][2].disable, t[2][2].lock), i[s[0]] = o.fire, i[s[0] + "With"] = o.fireWith
            }), r.promise(i), e && e.call(i, i), i
        },
        when: function(e) {
            var t = 0,
                n = l.call(arguments),
                r = n.length,
                i = r !== 1 || e && v.isFunction(e.promise) ? r : 0,
                s = i === 1 ? e : v.Deferred(),
                o = function(e, t, n) {
                    return function(r) {
                        t[e] = this, n[e] = arguments.length > 1 ? l.call(arguments) : r, n === u ? s.notifyWith(t, n) : --i || s.resolveWith(t, n)
                    }
                },
                u, a, f;
            if (r > 1) {
                u = new Array(r), a = new Array(r), f = new Array(r);
                for (; t < r; t++) {
                    n[t] && v.isFunction(n[t].promise) ? n[t].promise().done(o(t, f, n)).fail(s.reject).progress(o(t, a, u)) : --i
                }
            }
            return i || s.resolveWith(f, n), s.promise()
        }
    }), v.support = function() {
        var t, n, r, s, o, u, a, f, l, c, h, p = i.createElement("div");
        p.setAttribute("className", "t"), p.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", n = p.getElementsByTagName("*"), r = p.getElementsByTagName("a")[0];
        if (!n || !r || !n.length) {
            return {}
        }
        s = i.createElement("select"), o = s.appendChild(i.createElement("option")), u = p.getElementsByTagName("input")[0], r.style.cssText = "top:1px;float:left;opacity:.5", t = {
            leadingWhitespace: p.firstChild.nodeType === 3,
            tbody: !p.getElementsByTagName("tbody").length,
            htmlSerialize: !!p.getElementsByTagName("link").length,
            style: /top/.test(r.getAttribute("style")),
            hrefNormalized: r.getAttribute("href") === "/a",
            opacity: /^0.5/.test(r.style.opacity),
            cssFloat: !!r.style.cssFloat,
            checkOn: u.value === "on",
            optSelected: o.selected,
            getSetAttribute: p.className !== "t",
            enctype: !!i.createElement("form").enctype,
            html5Clone: i.createElement("nav").cloneNode(!0).outerHTML !== "<:nav></:nav>",
            boxModel: i.compatMode === "CSS1Compat",
            submitBubbles: !0,
            changeBubbles: !0,
            focusinBubbles: !1,
            deleteExpando: !0,
            noCloneEvent: !0,
            inlineBlockNeedsLayout: !1,
            shrinkWrapBlocks: !1,
            reliableMarginRight: !0,
            boxSizingReliable: !0,
            pixelPosition: !1
        }, u.checked = !0, t.noCloneChecked = u.cloneNode(!0).checked, s.disabled = !0, t.optDisabled = !o.disabled;
        try {
            delete p.test
        } catch (d) {
            t.deleteExpando = !1
        }!p.addEventListener && p.attachEvent && p.fireEvent && (p.attachEvent("onclick", h = function() {
            t.noCloneEvent = !1
        }), p.cloneNode(!0).fireEvent("onclick"), p.detachEvent("onclick", h)), u = i.createElement("input"), u.value = "t", u.setAttribute("type", "radio"), t.radioValue = u.value === "t", u.setAttribute("checked", "checked"), u.setAttribute("name", "t"), p.appendChild(u), a = i.createDocumentFragment(), a.appendChild(p.lastChild), t.checkClone = a.cloneNode(!0).cloneNode(!0).lastChild.checked, t.appendChecked = u.checked, a.removeChild(u), a.appendChild(p);
        if (p.attachEvent) {
            for (l in {
                    submit: !0,
                    change: !0,
                    focusin: !0
                }) {
                f = "on" + l, c = f in p, c || (p.setAttribute(f, "return;"), c = typeof p[f] == "function"), t[l + "Bubbles"] = c
            }
        }
        return v(function() {
            var n, r, s, o, u = "padding:0;margin:0;border:0;display:block;overflow:hidden;",
                a = i.getElementsByTagName("body")[0];
            if (!a) {
                return
            }
            n = i.createElement("div"), n.style.cssText = "visibility:hidden;border:0;width:0;height:0;position:static;top:0;margin-top:1px", a.insertBefore(n, a.firstChild), r = i.createElement("div"), n.appendChild(r), r.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", s = r.getElementsByTagName("td"), s[0].style.cssText = "padding:0;margin:0;border:0;display:none", c = s[0].offsetHeight === 0, s[0].style.display = "", s[1].style.display = "none", t.reliableHiddenOffsets = c && s[0].offsetHeight === 0, r.innerHTML = "", r.style.cssText = "box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;", t.boxSizing = r.offsetWidth === 4, t.doesNotIncludeMarginInBodyOffset = a.offsetTop !== 1, e.getComputedStyle && (t.pixelPosition = (e.getComputedStyle(r, null) || {}).top !== "1%", t.boxSizingReliable = (e.getComputedStyle(r, null) || {
                width: "4px"
            }).width === "4px", o = i.createElement("div"), o.style.cssText = r.style.cssText = u, o.style.marginRight = o.style.width = "0", r.style.width = "1px", r.appendChild(o), t.reliableMarginRight = !parseFloat((e.getComputedStyle(o, null) || {}).marginRight)), typeof r.style.zoom != "undefined" && (r.innerHTML = "", r.style.cssText = u + "width:1px;padding:1px;display:inline;zoom:1", t.inlineBlockNeedsLayout = r.offsetWidth === 3, r.style.display = "block", r.style.overflow = "visible", r.innerHTML = "<div></div>", r.firstChild.style.width = "5px", t.shrinkWrapBlocks = r.offsetWidth !== 3, n.style.zoom = 1), a.removeChild(n), n = r = s = o = null
        }), a.removeChild(p), n = r = s = o = u = a = p = null, t
    }();
    var D = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/,
        P = /([A-Z])/g;
    v.extend({
        cache: {},
        deletedIds: [],
        uuid: 0,
        expando: "jQuery" + (v.fn.jquery + Math.random()).replace(/\D/g, ""),
        noData: {
            embed: !0,
            object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
            applet: !0
        },
        hasData: function(e) {
            return e = e.nodeType ? v.cache[e[v.expando]] : e[v.expando], !!e && !B(e)
        },
        data: function(e, n, r, i) {
            if (!v.acceptData(e)) {
                return
            }
            var s, o, u = v.expando,
                a = typeof n == "string",
                f = e.nodeType,
                l = f ? v.cache : e,
                c = f ? e[u] : e[u] && u;
            if ((!c || !l[c] || !i && !l[c].data) && a && r === t) {
                return
            }
            c || (f ? e[u] = c = v.deletedIds.pop() || v.guid++ : c = u), l[c] || (l[c] = {}, f || (l[c].toJSON = v.noop));
            if (typeof n == "object" || typeof n == "function") {
                i ? l[c] = v.extend(l[c], n) : l[c].data = v.extend(l[c].data, n)
            }
            return s = l[c], i || (s.data || (s.data = {}), s = s.data), r !== t && (s[v.camelCase(n)] = r), a ? (o = s[n], o == null && (o = s[v.camelCase(n)])) : o = s, o
        },
        removeData: function(e, t, n) {
            if (!v.acceptData(e)) {
                return
            }
            var r, i, s, o = e.nodeType,
                u = o ? v.cache : e,
                a = o ? e[v.expando] : v.expando;
            if (!u[a]) {
                return
            }
            if (t) {
                r = n ? u[a] : u[a].data;
                if (r) {
                    v.isArray(t) || (t in r ? t = [t] : (t = v.camelCase(t), t in r ? t = [t] : t = t.split(" ")));
                    for (i = 0, s = t.length; i < s; i++) {
                        delete r[t[i]]
                    }
                    if (!(n ? B : v.isEmptyObject)(r)) {
                        return
                    }
                }
            }
            if (!n) {
                delete u[a].data;
                if (!B(u[a])) {
                    return
                }
            }
            o ? v.cleanData([e], !0) : v.support.deleteExpando || u != u.window ? delete u[a] : u[a] = null
        },
        _data: function(e, t, n) {
            return v.data(e, t, n, !0)
        },
        acceptData: function(e) {
            var t = e.nodeName && v.noData[e.nodeName.toLowerCase()];
            return !t || t !== !0 && e.getAttribute("classid") === t
        }
    }), v.fn.extend({
        data: function(e, n) {
            var r, i, s, o, u, a = this[0],
                f = 0,
                l = null;
            if (e === t) {
                if (this.length) {
                    l = v.data(a);
                    if (a.nodeType === 1 && !v._data(a, "parsedAttrs")) {
                        s = a.attributes;
                        for (u = s.length; f < u; f++) {
                            o = s[f].name, o.indexOf("data-") || (o = v.camelCase(o.substring(5)), H(a, o, l[o]))
                        }
                        v._data(a, "parsedAttrs", !0)
                    }
                }
                return l
            }
            return typeof e == "object" ? this.each(function() {
                v.data(this, e)
            }) : (r = e.split(".", 2), r[1] = r[1] ? "." + r[1] : "", i = r[1] + "!", v.access(this, function(n) {
                if (n === t) {
                    return l = this.triggerHandler("getData" + i, [r[0]]), l === t && a && (l = v.data(a, e), l = H(a, e, l)), l === t && r[1] ? this.data(r[0]) : l
                }
                r[1] = n, this.each(function() {
                    var t = v(this);
                    t.triggerHandler("setData" + i, r), v.data(this, e, n), t.triggerHandler("changeData" + i, r)
                })
            }, null, n, arguments.length > 1, null, !1))
        },
        removeData: function(e) {
            return this.each(function() {
                v.removeData(this, e)
            })
        }
    }), v.extend({
        queue: function(e, t, n) {
            var r;
            if (e) {
                return t = (t || "fx") + "queue", r = v._data(e, t), n && (!r || v.isArray(n) ? r = v._data(e, t, v.makeArray(n)) : r.push(n)), r || []
            }
        },
        dequeue: function(e, t) {
            t = t || "fx";
            var n = v.queue(e, t),
                r = n.length,
                i = n.shift(),
                s = v._queueHooks(e, t),
                o = function() {
                    v.dequeue(e, t)
                };
            i === "inprogress" && (i = n.shift(), r--), i && (t === "fx" && n.unshift("inprogress"), delete s.stop, i.call(e, o, s)), !r && s && s.empty.fire()
        },
        _queueHooks: function(e, t) {
            var n = t + "queueHooks";
            return v._data(e, n) || v._data(e, n, {
                empty: v.Callbacks("once memory").add(function() {
                    v.removeData(e, t + "queue", !0), v.removeData(e, n, !0)
                })
            })
        }
    }), v.fn.extend({
        queue: function(e, n) {
            var r = 2;
            return typeof e != "string" && (n = e, e = "fx", r--), arguments.length < r ? v.queue(this[0], e) : n === t ? this : this.each(function() {
                var t = v.queue(this, e, n);
                v._queueHooks(this, e), e === "fx" && t[0] !== "inprogress" && v.dequeue(this, e)
            })
        },
        dequeue: function(e) {
            return this.each(function() {
                v.dequeue(this, e)
            })
        },
        delay: function(e, t) {
            return e = v.fx ? v.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function(t, n) {
                var r = setTimeout(t, e);
                n.stop = function() {
                    clearTimeout(r)
                }
            })
        },
        clearQueue: function(e) {
            return this.queue(e || "fx", [])
        },
        promise: function(e, n) {
            var r, i = 1,
                s = v.Deferred(),
                o = this,
                u = this.length,
                a = function() {
                    --i || s.resolveWith(o, [o])
                };
            typeof e != "string" && (n = e, e = t), e = e || "fx";
            while (u--) {
                r = v._data(o[u], e + "queueHooks"), r && r.empty && (i++, r.empty.add(a))
            }
            return a(), s.promise(n)
        }
    });
    var j, F, I, q = /[\t\r\n]/g,
        R = /\r/g,
        U = /^(?:button|input)$/i,
        z = /^(?:button|input|object|select|textarea)$/i,
        W = /^a(?:rea|)$/i,
        X = /^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,
        V = v.support.getSetAttribute;
    v.fn.extend({
        attr: function(e, t) {
            return v.access(this, v.attr, e, t, arguments.length > 1)
        },
        removeAttr: function(e) {
            return this.each(function() {
                v.removeAttr(this, e)
            })
        },
        prop: function(e, t) {
            return v.access(this, v.prop, e, t, arguments.length > 1)
        },
        removeProp: function(e) {
            return e = v.propFix[e] || e, this.each(function() {
                try {
                    this[e] = t, delete this[e]
                } catch (n) {}
            })
        },
        addClass: function(e) {
            var t, n, r, i, s, o, u;
            if (v.isFunction(e)) {
                return this.each(function(t) {
                    v(this).addClass(e.call(this, t, this.className))
                })
            }
            if (e && typeof e == "string") {
                t = e.split(y);
                for (n = 0, r = this.length; n < r; n++) {
                    i = this[n];
                    if (i.nodeType === 1) {
                        if (!i.className && t.length === 1) {
                            i.className = e
                        } else {
                            s = " " + i.className + " ";
                            for (o = 0, u = t.length; o < u; o++) {
                                s.indexOf(" " + t[o] + " ") < 0 && (s += t[o] + " ")
                            }
                            i.className = v.trim(s)
                        }
                    }
                }
            }
            return this
        },
        removeClass: function(e) {
            var n, r, i, s, o, u, a;
            if (v.isFunction(e)) {
                return this.each(function(t) {
                    v(this).removeClass(e.call(this, t, this.className))
                })
            }
            if (e && typeof e == "string" || e === t) {
                n = (e || "").split(y);
                for (u = 0, a = this.length; u < a; u++) {
                    i = this[u];
                    if (i.nodeType === 1 && i.className) {
                        r = (" " + i.className + " ").replace(q, " ");
                        for (s = 0, o = n.length; s < o; s++) {
                            while (r.indexOf(" " + n[s] + " ") >= 0) {
                                r = r.replace(" " + n[s] + " ", " ")
                            }
                        }
                        i.className = e ? v.trim(r) : ""
                    }
                }
            }
            return this
        },
        toggleClass: function(e, t) {
            var n = typeof e,
                r = typeof t == "boolean";
            return v.isFunction(e) ? this.each(function(n) {
                v(this).toggleClass(e.call(this, n, this.className, t), t)
            }) : this.each(function() {
                if (n === "string") {
                    var i, s = 0,
                        o = v(this),
                        u = t,
                        a = e.split(y);
                    while (i = a[s++]) {
                        u = r ? u : !o.hasClass(i), o[u ? "addClass" : "removeClass"](i)
                    }
                } else {
                    if (n === "undefined" || n === "boolean") {
                        this.className && v._data(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : v._data(this, "__className__") || ""
                    }
                }
            })
        },
        hasClass: function(e) {
            var t = " " + e + " ",
                n = 0,
                r = this.length;
            for (; n < r; n++) {
                if (this[n].nodeType === 1 && (" " + this[n].className + " ").replace(q, " ").indexOf(t) >= 0) {
                    return !0
                }
            }
            return !1
        },
        val: function(e) {
            var n, r, i, s = this[0];
            if (!arguments.length) {
                if (s) {
                    return n = v.valHooks[s.type] || v.valHooks[s.nodeName.toLowerCase()], n && "get" in n && (r = n.get(s, "value")) !== t ? r : (r = s.value, typeof r == "string" ? r.replace(R, "") : r == null ? "" : r)
                }
                return
            }
            return i = v.isFunction(e), this.each(function(r) {
                var s, o = v(this);
                if (this.nodeType !== 1) {
                    return
                }
                i ? s = e.call(this, r, o.val()) : s = e, s == null ? s = "" : typeof s == "number" ? s += "" : v.isArray(s) && (s = v.map(s, function(e) {
                    return e == null ? "" : e + ""
                })), n = v.valHooks[this.type] || v.valHooks[this.nodeName.toLowerCase()];
                if (!n || !("set" in n) || n.set(this, s, "value") === t) {
                    this.value = s
                }
            })
        }
    }), v.extend({
        valHooks: {
            option: {
                get: function(e) {
                    var t = e.attributes.value;
                    return !t || t.specified ? e.value : e.text
                }
            },
            select: {
                get: function(e) {
                    var t, n, r = e.options,
                        i = e.selectedIndex,
                        s = e.type === "select-one" || i < 0,
                        o = s ? null : [],
                        u = s ? i + 1 : r.length,
                        a = i < 0 ? u : s ? i : 0;
                    for (; a < u; a++) {
                        n = r[a];
                        if ((n.selected || a === i) && (v.support.optDisabled ? !n.disabled : n.getAttribute("disabled") === null) && (!n.parentNode.disabled || !v.nodeName(n.parentNode, "optgroup"))) {
                            t = v(n).val();
                            if (s) {
                                return t
                            }
                            o.push(t)
                        }
                    }
                    return o
                },
                set: function(e, t) {
                    var n = v.makeArray(t);
                    return v(e).find("option").each(function() {
                        this.selected = v.inArray(v(this).val(), n) >= 0
                    }), n.length || (e.selectedIndex = -1), n
                }
            }
        },
        attrFn: {},
        attr: function(e, n, r, i) {
            var s, o, u, a = e.nodeType;
            if (!e || a === 3 || a === 8 || a === 2) {
                return
            }
            if (i && v.isFunction(v.fn[n])) {
                return v(e)[n](r)
            }
            if (typeof e.getAttribute == "undefined") {
                return v.prop(e, n, r)
            }
            u = a !== 1 || !v.isXMLDoc(e), u && (n = n.toLowerCase(), o = v.attrHooks[n] || (X.test(n) ? F : j));
            if (r !== t) {
                if (r === null) {
                    v.removeAttr(e, n);
                    return
                }
                return o && "set" in o && u && (s = o.set(e, r, n)) !== t ? s : (e.setAttribute(n, r + ""), r)
            }
            return o && "get" in o && u && (s = o.get(e, n)) !== null ? s : (s = e.getAttribute(n), s === null ? t : s)
        },
        removeAttr: function(e, t) {
            var n, r, i, s, o = 0;
            if (t && e.nodeType === 1) {
                r = t.split(y);
                for (; o < r.length; o++) {
                    i = r[o], i && (n = v.propFix[i] || i, s = X.test(i), s || v.attr(e, i, ""), e.removeAttribute(V ? i : n), s && n in e && (e[n] = !1))
                }
            }
        },
        attrHooks: {
            type: {
                set: function(e, t) {
                    if (U.test(e.nodeName) && e.parentNode) {
                        v.error("type property can't be changed")
                    } else {
                        if (!v.support.radioValue && t === "radio" && v.nodeName(e, "input")) {
                            var n = e.value;
                            return e.setAttribute("type", t), n && (e.value = n), t
                        }
                    }
                }
            },
            value: {
                get: function(e, t) {
                    return j && v.nodeName(e, "button") ? j.get(e, t) : t in e ? e.value : null
                },
                set: function(e, t, n) {
                    if (j && v.nodeName(e, "button")) {
                        return j.set(e, t, n)
                    }
                    e.value = t
                }
            }
        },
        propFix: {
            tabindex: "tabIndex",
            readonly: "readOnly",
            "for": "htmlFor",
            "class": "className",
            maxlength: "maxLength",
            cellspacing: "cellSpacing",
            cellpadding: "cellPadding",
            rowspan: "rowSpan",
            colspan: "colSpan",
            usemap: "useMap",
            frameborder: "frameBorder",
            contenteditable: "contentEditable"
        },
        prop: function(e, n, r) {
            var i, s, o, u = e.nodeType;
            if (!e || u === 3 || u === 8 || u === 2) {
                return
            }
            return o = u !== 1 || !v.isXMLDoc(e), o && (n = v.propFix[n] || n, s = v.propHooks[n]), r !== t ? s && "set" in s && (i = s.set(e, r, n)) !== t ? i : e[n] = r : s && "get" in s && (i = s.get(e, n)) !== null ? i : e[n]
        },
        propHooks: {
            tabIndex: {
                get: function(e) {
                    var n = e.getAttributeNode("tabindex");
                    return n && n.specified ? parseInt(n.value, 10) : z.test(e.nodeName) || W.test(e.nodeName) && e.href ? 0 : t
                }
            }
        }
    }), F = {
        get: function(e, n) {
            var r, i = v.prop(e, n);
            return i === !0 || typeof i != "boolean" && (r = e.getAttributeNode(n)) && r.nodeValue !== !1 ? n.toLowerCase() : t
        },
        set: function(e, t, n) {
            var r;
            return t === !1 ? v.removeAttr(e, n) : (r = v.propFix[n] || n, r in e && (e[r] = !0), e.setAttribute(n, n.toLowerCase())), n
        }
    }, V || (I = {
        name: !0,
        id: !0,
        coords: !0
    }, j = v.valHooks.button = {
        get: function(e, n) {
            var r;
            return r = e.getAttributeNode(n), r && (I[n] ? r.value !== "" : r.specified) ? r.value : t
        },
        set: function(e, t, n) {
            var r = e.getAttributeNode(n);
            return r || (r = i.createAttribute(n), e.setAttributeNode(r)), r.value = t + ""
        }
    }, v.each(["width", "height"], function(e, t) {
        v.attrHooks[t] = v.extend(v.attrHooks[t], {
            set: function(e, n) {
                if (n === "") {
                    return e.setAttribute(t, "auto"), n
                }
            }
        })
    }), v.attrHooks.contenteditable = {
        get: j.get,
        set: function(e, t, n) {
            t === "" && (t = "false"), j.set(e, t, n)
        }
    }), v.support.hrefNormalized || v.each(["href", "src", "width", "height"], function(e, n) {
        v.attrHooks[n] = v.extend(v.attrHooks[n], {
            get: function(e) {
                var r = e.getAttribute(n, 2);
                return r === null ? t : r
            }
        })
    }), v.support.style || (v.attrHooks.style = {
        get: function(e) {
            return e.style.cssText.toLowerCase() || t
        },
        set: function(e, t) {
            return e.style.cssText = t + ""
        }
    }), v.support.optSelected || (v.propHooks.selected = v.extend(v.propHooks.selected, {
        get: function(e) {
            var t = e.parentNode;
            return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
        }
    })), v.support.enctype || (v.propFix.enctype = "encoding"), v.support.checkOn || v.each(["radio", "checkbox"], function() {
        v.valHooks[this] = {
            get: function(e) {
                return e.getAttribute("value") === null ? "on" : e.value
            }
        }
    }), v.each(["radio", "checkbox"], function() {
        v.valHooks[this] = v.extend(v.valHooks[this], {
            set: function(e, t) {
                if (v.isArray(t)) {
                    return e.checked = v.inArray(v(e).val(), t) >= 0
                }
            }
        })
    });
    var $ = /^(?:textarea|input|select)$/i,
        J = /^([^\.]*|)(?:\.(.+)|)$/,
        K = /(?:^|\s)hover(\.\S+|)\b/,
        Q = /^key/,
        G = /^(?:mouse|contextmenu)|click/,
        Y = /^(?:focusinfocus|focusoutblur)$/,
        Z = function(e) {
            return v.event.special.hover ? e : e.replace(K, "mouseenter$1 mouseleave$1")
        };
    v.event = {
            add: function(e, n, r, i, s) {
                var o, u, a, f, l, c, h, p, d, m, g;
                if (e.nodeType === 3 || e.nodeType === 8 || !n || !r || !(o = v._data(e))) {
                    return
                }
                r.handler && (d = r, r = d.handler, s = d.selector), r.guid || (r.guid = v.guid++), a = o.events, a || (o.events = a = {}), u = o.handle, u || (o.handle = u = function(e) {
                    return typeof v == "undefined" || !!e && v.event.triggered === e.type ? t : v.event.dispatch.apply(u.elem, arguments)
                }, u.elem = e), n = v.trim(Z(n)).split(" ");
                for (f = 0; f < n.length; f++) {
                    l = J.exec(n[f]) || [], c = l[1], h = (l[2] || "").split(".").sort(), g = v.event.special[c] || {}, c = (s ? g.delegateType : g.bindType) || c, g = v.event.special[c] || {}, p = v.extend({
                        type: c,
                        origType: l[1],
                        data: i,
                        handler: r,
                        guid: r.guid,
                        selector: s,
                        needsContext: s && v.expr.match.needsContext.test(s),
                        namespace: h.join(".")
                    }, d), m = a[c];
                    if (!m) {
                        m = a[c] = [], m.delegateCount = 0;
                        if (!g.setup || g.setup.call(e, i, h, u) === !1) {
                            e.addEventListener ? e.addEventListener(c, u, !1) : e.attachEvent && e.attachEvent("on" + c, u)
                        }
                    }
                    g.add && (g.add.call(e, p), p.handler.guid || (p.handler.guid = r.guid)), s ? m.splice(m.delegateCount++, 0, p) : m.push(p), v.event.global[c] = !0
                }
                e = null
            },
            global: {},
            remove: function(e, t, n, r, i) {
                var s, o, u, a, f, l, c, h, p, d, m, g = v.hasData(e) && v._data(e);
                if (!g || !(h = g.events)) {
                    return
                }
                t = v.trim(Z(t || "")).split(" ");
                for (s = 0; s < t.length; s++) {
                    o = J.exec(t[s]) || [], u = a = o[1], f = o[2];
                    if (!u) {
                        for (u in h) {
                            v.event.remove(e, u + t[s], n, r, !0)
                        }
                        continue
                    }
                    p = v.event.special[u] || {}, u = (r ? p.delegateType : p.bindType) || u, d = h[u] || [], l = d.length, f = f ? new RegExp("(^|\\.)" + f.split(".").sort().join("\\.(?:.*\\.|)") + "(\\.|$)") : null;
                    for (c = 0; c < d.length; c++) {
                        m = d[c], (i || a === m.origType) && (!n || n.guid === m.guid) && (!f || f.test(m.namespace)) && (!r || r === m.selector || r === "**" && m.selector) && (d.splice(c--, 1), m.selector && d.delegateCount--, p.remove && p.remove.call(e, m))
                    }
                    d.length === 0 && l !== d.length && ((!p.teardown || p.teardown.call(e, f, g.handle) === !1) && v.removeEvent(e, u, g.handle), delete h[u])
                }
                v.isEmptyObject(h) && (delete g.handle, v.removeData(e, "events", !0))
            },
            customEvent: {
                getData: !0,
                setData: !0,
                changeData: !0
            },
            trigger: function(n, r, s, o) {
                if (!s || s.nodeType !== 3 && s.nodeType !== 8) {
                    var u, a, f, l, c, h, p, d, m, g, y = n.type || n,
                        b = [];
                    if (Y.test(y + v.event.triggered)) {
                        return
                    }
                    y.indexOf("!") >= 0 && (y = y.slice(0, -1), a = !0), y.indexOf(".") >= 0 && (b = y.split("."), y = b.shift(), b.sort());
                    if ((!s || v.event.customEvent[y]) && !v.event.global[y]) {
                        return
                    }
                    n = typeof n == "object" ? n[v.expando] ? n : new v.Event(y, n) : new v.Event(y), n.type = y, n.isTrigger = !0, n.exclusive = a, n.namespace = b.join("."), n.namespace_re = n.namespace ? new RegExp("(^|\\.)" + b.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, h = y.indexOf(":") < 0 ? "on" + y : "";
                    if (!s) {
                        u = v.cache;
                        for (f in u) {
                            u[f].events && u[f].events[y] && v.event.trigger(n, r, u[f].handle.elem, !0)
                        }
                        return
                    }
                    n.result = t, n.target || (n.target = s), r = r != null ? v.makeArray(r) : [], r.unshift(n), p = v.event.special[y] || {};
                    if (p.trigger && p.trigger.apply(s, r) === !1) {
                        return
                    }
                    m = [
                        [s, p.bindType || y]
                    ];
                    if (!o && !p.noBubble && !v.isWindow(s)) {
                        g = p.delegateType || y, l = Y.test(g + y) ? s : s.parentNode;
                        for (c = s; l; l = l.parentNode) {
                            m.push([l, g]), c = l
                        }
                        c === (s.ownerDocument || i) && m.push([c.defaultView || c.parentWindow || e, g])
                    }
                    for (f = 0; f < m.length && !n.isPropagationStopped(); f++) {
                        l = m[f][0], n.type = m[f][1], d = (v._data(l, "events") || {})[n.type] && v._data(l, "handle"), d && d.apply(l, r), d = h && l[h], d && v.acceptData(l) && d.apply && d.apply(l, r) === !1 && n.preventDefault()
                    }
                    return n.type = y, !o && !n.isDefaultPrevented() && (!p._default || p._default.apply(s.ownerDocument, r) === !1) && (y !== "click" || !v.nodeName(s, "a")) && v.acceptData(s) && h && s[y] && (y !== "focus" && y !== "blur" || n.target.offsetWidth !== 0) && !v.isWindow(s) && (c = s[h], c && (s[h] = null), v.event.triggered = y, s[y](), v.event.triggered = t, c && (s[h] = c)), n.result
                }
                return
            },
            dispatch: function(n) {
                n = v.event.fix(n || e.event);
                var r, i, s, o, u, a, f, c, h, p, d = (v._data(this, "events") || {})[n.type] || [],
                    m = d.delegateCount,
                    g = l.call(arguments),
                    y = !n.exclusive && !n.namespace,
                    b = v.event.special[n.type] || {},
                    w = [];
                g[0] = n, n.delegateTarget = this;
                if (b.preDispatch && b.preDispatch.call(this, n) === !1) {
                    return
                }
                if (m && (!n.button || n.type !== "click")) {
                    for (s = n.target; s != this; s = s.parentNode || this) {
                        if (s.disabled !== !0 || n.type !== "click") {
                            u = {}, f = [];
                            for (r = 0; r < m; r++) {
                                c = d[r], h = c.selector, u[h] === t && (u[h] = c.needsContext ? v(h, this).index(s) >= 0 : v.find(h, this, null, [s]).length), u[h] && f.push(c)
                            }
                            f.length && w.push({
                                elem: s,
                                matches: f
                            })
                        }
                    }
                }
                d.length > m && w.push({
                    elem: this,
                    matches: d.slice(m)
                });
                for (r = 0; r < w.length && !n.isPropagationStopped(); r++) {
                    a = w[r], n.currentTarget = a.elem;
                    for (i = 0; i < a.matches.length && !n.isImmediatePropagationStopped(); i++) {
                        c = a.matches[i];
                        if (y || !n.namespace && !c.namespace || n.namespace_re && n.namespace_re.test(c.namespace)) {
                            n.data = c.data, n.handleObj = c, o = ((v.event.special[c.origType] || {}).handle || c.handler).apply(a.elem, g), o !== t && (n.result = o, o === !1 && (n.preventDefault(), n.stopPropagation()))
                        }
                    }
                }
                return b.postDispatch && b.postDispatch.call(this, n), n.result
            },
            props: "attrChange attrName relatedNode srcElement altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
            fixHooks: {},
            keyHooks: {
                props: "char charCode key keyCode".split(" "),
                filter: function(e, t) {
                    return e.which == null && (e.which = t.charCode != null ? t.charCode : t.keyCode), e
                }
            },
            mouseHooks: {
                props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
                filter: function(e, n) {
                    var r, s, o, u = n.button,
                        a = n.fromElement;
                    return e.pageX == null && n.clientX != null && (r = e.target.ownerDocument || i, s = r.documentElement, o = r.body, e.pageX = n.clientX + (s && s.scrollLeft || o && o.scrollLeft || 0) - (s && s.clientLeft || o && o.clientLeft || 0), e.pageY = n.clientY + (s && s.scrollTop || o && o.scrollTop || 0) - (s && s.clientTop || o && o.clientTop || 0)), !e.relatedTarget && a && (e.relatedTarget = a === e.target ? n.toElement : a), !e.which && u !== t && (e.which = u & 1 ? 1 : u & 2 ? 3 : u & 4 ? 2 : 0), e
                }
            },
            fix: function(e) {
                if (e[v.expando]) {
                    return e
                }
                var t, n, r = e,
                    s = v.event.fixHooks[e.type] || {},
                    o = s.props ? this.props.concat(s.props) : this.props;
                e = v.Event(r);
                for (t = o.length; t;) {
                    n = o[--t], e[n] = r[n]
                }
                return e.target || (e.target = r.srcElement || i), e.target.nodeType === 3 && (e.target = e.target.parentNode), e.metaKey = !!e.metaKey, s.filter ? s.filter(e, r) : e
            },
            special: {
                load: {
                    noBubble: !0
                },
                focus: {
                    delegateType: "focusin"
                },
                blur: {
                    delegateType: "focusout"
                },
                beforeunload: {
                    setup: function(e, t, n) {
                        v.isWindow(this) && (this.onbeforeunload = n)
                    },
                    teardown: function(e, t) {
                        this.onbeforeunload === t && (this.onbeforeunload = null)
                    }
                }
            },
            simulate: function(e, t, n, r) {
                var i = v.extend(new v.Event, n, {
                    type: e,
                    isSimulated: !0,
                    originalEvent: {}
                });
                r ? v.event.trigger(i, null, t) : v.event.dispatch.call(t, i), i.isDefaultPrevented() && n.preventDefault()
            }
        }, v.event.handle = v.event.dispatch, v.removeEvent = i.removeEventListener ? function(e, t, n) {
            e.removeEventListener && e.removeEventListener(t, n, !1)
        } : function(e, t, n) {
            var r = "on" + t;
            e.detachEvent && (typeof e[r] == "undefined" && (e[r] = null), e.detachEvent(r, n))
        }, v.Event = function(e, t) {
            if (!(this instanceof v.Event)) {
                return new v.Event(e, t)
            }
            e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || e.returnValue === !1 || e.getPreventDefault && e.getPreventDefault() ? tt : et) : this.type = e, t && v.extend(this, t), this.timeStamp = e && e.timeStamp || v.now(), this[v.expando] = !0
        }, v.Event.prototype = {
            preventDefault: function() {
                this.isDefaultPrevented = tt;
                var e = this.originalEvent;
                if (!e) {
                    return
                }
                e.preventDefault ? e.preventDefault() : e.returnValue = !1
            },
            stopPropagation: function() {
                this.isPropagationStopped = tt;
                var e = this.originalEvent;
                if (!e) {
                    return
                }
                e.stopPropagation && e.stopPropagation(), e.cancelBubble = !0
            },
            stopImmediatePropagation: function() {
                this.isImmediatePropagationStopped = tt, this.stopPropagation()
            },
            isDefaultPrevented: et,
            isPropagationStopped: et,
            isImmediatePropagationStopped: et
        }, v.each({
            mouseenter: "mouseover",
            mouseleave: "mouseout"
        }, function(e, t) {
            v.event.special[e] = {
                delegateType: t,
                bindType: t,
                handle: function(e) {
                    var n, r = this,
                        i = e.relatedTarget,
                        s = e.handleObj,
                        o = s.selector;
                    if (!i || i !== r && !v.contains(r, i)) {
                        e.type = s.origType, n = s.handler.apply(this, arguments), e.type = t
                    }
                    return n
                }
            }
        }), v.support.submitBubbles || (v.event.special.submit = {
            setup: function() {
                if (v.nodeName(this, "form")) {
                    return !1
                }
                v.event.add(this, "click._submit keypress._submit", function(e) {
                    var n = e.target,
                        r = v.nodeName(n, "input") || v.nodeName(n, "button") ? n.form : t;
                    r && !v._data(r, "_submit_attached") && (v.event.add(r, "submit._submit", function(e) {
                        e._submit_bubble = !0
                    }), v._data(r, "_submit_attached", !0))
                })
            },
            postDispatch: function(e) {
                e._submit_bubble && (delete e._submit_bubble, this.parentNode && !e.isTrigger && v.event.simulate("submit", this.parentNode, e, !0))
            },
            teardown: function() {
                if (v.nodeName(this, "form")) {
                    return !1
                }
                v.event.remove(this, "._submit")
            }
        }), v.support.changeBubbles || (v.event.special.change = {
            setup: function() {
                if ($.test(this.nodeName)) {
                    if (this.type === "checkbox" || this.type === "radio") {
                        v.event.add(this, "propertychange._change", function(e) {
                            e.originalEvent.propertyName === "checked" && (this._just_changed = !0)
                        }), v.event.add(this, "click._change", function(e) {
                            this._just_changed && !e.isTrigger && (this._just_changed = !1), v.event.simulate("change", this, e, !0)
                        })
                    }
                    return !1
                }
                v.event.add(this, "beforeactivate._change", function(e) {
                    var t = e.target;
                    $.test(t.nodeName) && !v._data(t, "_change_attached") && (v.event.add(t, "change._change", function(e) {
                        this.parentNode && !e.isSimulated && !e.isTrigger && v.event.simulate("change", this.parentNode, e, !0)
                    }), v._data(t, "_change_attached", !0))
                })
            },
            handle: function(e) {
                var t = e.target;
                if (this !== t || e.isSimulated || e.isTrigger || t.type !== "radio" && t.type !== "checkbox") {
                    return e.handleObj.handler.apply(this, arguments)
                }
            },
            teardown: function() {
                return v.event.remove(this, "._change"), !$.test(this.nodeName)
            }
        }), v.support.focusinBubbles || v.each({
            focus: "focusin",
            blur: "focusout"
        }, function(e, t) {
            var n = 0,
                r = function(e) {
                    v.event.simulate(t, e.target, v.event.fix(e), !0)
                };
            v.event.special[t] = {
                setup: function() {
                    n++ === 0 && i.addEventListener(e, r, !0)
                },
                teardown: function() {
                    --n === 0 && i.removeEventListener(e, r, !0)
                }
            }
        }), v.fn.extend({
            on: function(e, n, r, i, s) {
                var o, u;
                if (typeof e == "object") {
                    typeof n != "string" && (r = r || n, n = t);
                    for (u in e) {
                        this.on(u, n, r, e[u], s)
                    }
                    return this
                }
                r == null && i == null ? (i = n, r = n = t) : i == null && (typeof n == "string" ? (i = r, r = t) : (i = r, r = n, n = t));
                if (i === !1) {
                    i = et
                } else {
                    if (!i) {
                        return this
                    }
                }
                return s === 1 && (o = i, i = function(e) {
                    return v().off(e), o.apply(this, arguments)
                }, i.guid = o.guid || (o.guid = v.guid++)), this.each(function() {
                    v.event.add(this, e, i, r, n)
                })
            },
            one: function(e, t, n, r) {
                return this.on(e, t, n, r, 1)
            },
            off: function(e, n, r) {
                var i, s;
                if (e && e.preventDefault && e.handleObj) {
                    return i = e.handleObj, v(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this
                }
                if (typeof e == "object") {
                    for (s in e) {
                        this.off(s, n, e[s])
                    }
                    return this
                }
                if (n === !1 || typeof n == "function") {
                    r = n, n = t
                }
                return r === !1 && (r = et), this.each(function() {
                    v.event.remove(this, e, r, n)
                })
            },
            bind: function(e, t, n) {
                return this.on(e, null, t, n)
            },
            unbind: function(e, t) {
                return this.off(e, null, t)
            },
            live: function(e, t, n) {
                return v(this.context).on(e, this.selector, t, n), this
            },
            die: function(e, t) {
                return v(this.context).off(e, this.selector || "**", t), this
            },
            delegate: function(e, t, n, r) {
                return this.on(t, e, n, r)
            },
            undelegate: function(e, t, n) {
                return arguments.length === 1 ? this.off(e, "**") : this.off(t, e || "**", n)
            },
            trigger: function(e, t) {
                return this.each(function() {
                    v.event.trigger(e, t, this)
                })
            },
            triggerHandler: function(e, t) {
                if (this[0]) {
                    return v.event.trigger(e, t, this[0], !0)
                }
            },
            toggle: function(e) {
                var t = arguments,
                    n = e.guid || v.guid++,
                    r = 0,
                    i = function(n) {
                        var i = (v._data(this, "lastToggle" + e.guid) || 0) % r;
                        return v._data(this, "lastToggle" + e.guid, i + 1), n.preventDefault(), t[i].apply(this, arguments) || !1
                    };
                i.guid = n;
                while (r < t.length) {
                    t[r++].guid = n
                }
                return this.click(i)
            },
            hover: function(e, t) {
                return this.mouseenter(e).mouseleave(t || e)
            }
        }), v.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
            v.fn[t] = function(e, n) {
                return n == null && (n = e, e = null), arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
            }, Q.test(t) && (v.event.fixHooks[t] = v.event.keyHooks), G.test(t) && (v.event.fixHooks[t] = v.event.mouseHooks)
        }),
        function(e, t) {
            function nt(e, t, n, r) {
                n = n || [], t = t || g;
                var i, s, a, f, l = t.nodeType;
                if (!e || typeof e != "string") {
                    return n
                }
                if (l !== 1 && l !== 9) {
                    return []
                }
                a = o(t);
                if (!a && !r) {
                    if (i = R.exec(e)) {
                        if (f = i[1]) {
                            if (l === 9) {
                                s = t.getElementById(f);
                                if (!s || !s.parentNode) {
                                    return n
                                }
                                if (s.id === f) {
                                    return n.push(s), n
                                }
                            } else {
                                if (t.ownerDocument && (s = t.ownerDocument.getElementById(f)) && u(t, s) && s.id === f) {
                                    return n.push(s), n
                                }
                            }
                        } else {
                            if (i[2]) {
                                return S.apply(n, x.call(t.getElementsByTagName(e), 0)), n
                            }
                            if ((f = i[3]) && Z && t.getElementsByClassName) {
                                return S.apply(n, x.call(t.getElementsByClassName(f), 0)), n
                            }
                        }
                    }
                }
                return vt(e.replace(j, "$1"), t, n, r, a)
            }

            function rt(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return n === "input" && t.type === e
                }
            }

            function it(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return (n === "input" || n === "button") && t.type === e
                }
            }

            function st(e) {
                return N(function(t) {
                    return t = +t, N(function(n, r) {
                        var i, s = e([], n.length, t),
                            o = s.length;
                        while (o--) {
                            n[i = s[o]] && (n[i] = !(r[i] = n[i]))
                        }
                    })
                })
            }

            function ot(e, t, n) {
                if (e === t) {
                    return n
                }
                var r = e.nextSibling;
                while (r) {
                    if (r === t) {
                        return -1
                    }
                    r = r.nextSibling
                }
                return 1
            }

            function ut(e, t) {
                var n, r, s, o, u, a, f, l = L[d][e + " "];
                if (l) {
                    return t ? 0 : l.slice(0)
                }
                u = e, a = [], f = i.preFilter;
                while (u) {
                    if (!n || (r = F.exec(u))) {
                        r && (u = u.slice(r[0].length) || u), a.push(s = [])
                    }
                    n = !1;
                    if (r = I.exec(u)) {
                        s.push(n = new m(r.shift())), u = u.slice(n.length), n.type = r[0].replace(j, " ")
                    }
                    for (o in i.filter) {
                        (r = J[o].exec(u)) && (!f[o] || (r = f[o](r))) && (s.push(n = new m(r.shift())), u = u.slice(n.length), n.type = o, n.matches = r)
                    }
                    if (!n) {
                        break
                    }
                }
                return t ? u.length : u ? nt.error(e) : L(e, a).slice(0)
            }

            function at(e, t, r) {
                var i = t.dir,
                    s = r && t.dir === "parentNode",
                    o = w++;
                return t.first ? function(t, n, r) {
                    while (t = t[i]) {
                        if (s || t.nodeType === 1) {
                            return e(t, n, r)
                        }
                    }
                } : function(t, r, u) {
                    if (!u) {
                        var a, f = b + " " + o + " ",
                            l = f + n;
                        while (t = t[i]) {
                            if (s || t.nodeType === 1) {
                                if ((a = t[d]) === l) {
                                    return t.sizset
                                }
                                if (typeof a == "string" && a.indexOf(f) === 0) {
                                    if (t.sizset) {
                                        return t
                                    }
                                } else {
                                    t[d] = l;
                                    if (e(t, r, u)) {
                                        return t.sizset = !0, t
                                    }
                                    t.sizset = !1
                                }
                            }
                        }
                    } else {
                        while (t = t[i]) {
                            if (s || t.nodeType === 1) {
                                if (e(t, r, u)) {
                                    return t
                                }
                            }
                        }
                    }
                }
            }

            function ft(e) {
                return e.length > 1 ? function(t, n, r) {
                    var i = e.length;
                    while (i--) {
                        if (!e[i](t, n, r)) {
                            return !1
                        }
                    }
                    return !0
                } : e[0]
            }

            function lt(e, t, n, r, i) {
                var s, o = [],
                    u = 0,
                    a = e.length,
                    f = t != null;
                for (; u < a; u++) {
                    if (s = e[u]) {
                        if (!n || n(s, r, i)) {
                            o.push(s), f && t.push(u)
                        }
                    }
                }
                return o
            }

            function ct(e, t, n, r, i, s) {
                return r && !r[d] && (r = ct(r)), i && !i[d] && (i = ct(i, s)), N(function(s, o, u, a) {
                    var f, l, c, h = [],
                        p = [],
                        d = o.length,
                        v = s || dt(t || "*", u.nodeType ? [u] : u, []),
                        m = e && (s || !t) ? lt(v, h, e, u, a) : v,
                        g = n ? i || (s ? e : d || r) ? [] : o : m;
                    n && n(m, g, u, a);
                    if (r) {
                        f = lt(g, p), r(f, [], u, a), l = f.length;
                        while (l--) {
                            if (c = f[l]) {
                                g[p[l]] = !(m[p[l]] = c)
                            }
                        }
                    }
                    if (s) {
                        if (i || e) {
                            if (i) {
                                f = [], l = g.length;
                                while (l--) {
                                    (c = g[l]) && f.push(m[l] = c)
                                }
                                i(null, g = [], f, a)
                            }
                            l = g.length;
                            while (l--) {
                                (c = g[l]) && (f = i ? T.call(s, c) : h[l]) > -1 && (s[f] = !(o[f] = c))
                            }
                        }
                    } else {
                        g = lt(g === o ? g.splice(d, g.length) : g), i ? i(null, o, g, a) : S.apply(o, g)
                    }
                })
            }

            function ht(e) {
                var t, n, r, s = e.length,
                    o = i.relative[e[0].type],
                    u = o || i.relative[" "],
                    a = o ? 1 : 0,
                    f = at(function(e) {
                        return e === t
                    }, u, !0),
                    l = at(function(e) {
                        return T.call(t, e) > -1
                    }, u, !0),
                    h = [function(e, n, r) {
                        return !o && (r || n !== c) || ((t = n).nodeType ? f(e, n, r) : l(e, n, r))
                    }];
                for (; a < s; a++) {
                    if (n = i.relative[e[a].type]) {
                        h = [at(ft(h), n)]
                    } else {
                        n = i.filter[e[a].type].apply(null, e[a].matches);
                        if (n[d]) {
                            r = ++a;
                            for (; r < s; r++) {
                                if (i.relative[e[r].type]) {
                                    break
                                }
                            }
                            return ct(a > 1 && ft(h), a > 1 && e.slice(0, a - 1).join("").replace(j, "$1"), n, a < r && ht(e.slice(a, r)), r < s && ht(e = e.slice(r)), r < s && e.join(""))
                        }
                        h.push(n)
                    }
                }
                return ft(h)
            }

            function pt(e, t) {
                var r = t.length > 0,
                    s = e.length > 0,
                    o = function(u, a, f, l, h) {
                        var p, d, v, m = [],
                            y = 0,
                            w = "0",
                            x = u && [],
                            T = h != null,
                            N = c,
                            C = u || s && i.find.TAG("*", h && a.parentNode || a),
                            k = b += N == null ? 1 : Math.E;
                        T && (c = a !== g && a, n = o.el);
                        for (;
                            (p = C[w]) != null; w++) {
                            if (s && p) {
                                for (d = 0; v = e[d]; d++) {
                                    if (v(p, a, f)) {
                                        l.push(p);
                                        break
                                    }
                                }
                                T && (b = k, n = ++o.el)
                            }
                            r && ((p = !v && p) && y--, u && x.push(p))
                        }
                        y += w;
                        if (r && w !== y) {
                            for (d = 0; v = t[d]; d++) {
                                v(x, m, a, f)
                            }
                            if (u) {
                                if (y > 0) {
                                    while (w--) {
                                        !x[w] && !m[w] && (m[w] = E.call(l))
                                    }
                                }
                                m = lt(m)
                            }
                            S.apply(l, m), T && !u && m.length > 0 && y + t.length > 1 && nt.uniqueSort(l)
                        }
                        return T && (b = k, c = N), x
                    };
                return o.el = 0, r ? N(o) : o
            }

            function dt(e, t, n) {
                var r = 0,
                    i = t.length;
                for (; r < i; r++) {
                    nt(e, t[r], n)
                }
                return n
            }

            function vt(e, t, n, r, s) {
                var o, u, f, l, c, h = ut(e),
                    p = h.length;
                if (!r && h.length === 1) {
                    u = h[0] = h[0].slice(0);
                    if (u.length > 2 && (f = u[0]).type === "ID" && t.nodeType === 9 && !s && i.relative[u[1].type]) {
                        t = i.find.ID(f.matches[0].replace($, ""), t, s)[0];
                        if (!t) {
                            return n
                        }
                        e = e.slice(u.shift().length)
                    }
                    for (o = J.POS.test(e) ? -1 : u.length - 1; o >= 0; o--) {
                        f = u[o];
                        if (i.relative[l = f.type]) {
                            break
                        }
                        if (c = i.find[l]) {
                            if (r = c(f.matches[0].replace($, ""), z.test(u[0].type) && t.parentNode || t, s)) {
                                u.splice(o, 1), e = r.length && u.join("");
                                if (!e) {
                                    return S.apply(n, x.call(r, 0)), n
                                }
                                break
                            }
                        }
                    }
                }
                return a(e, h)(r, t, s, n, z.test(e)), n
            }

            function mt() {}
            var n, r, i, s, o, u, a, f, l, c, h = !0,
                p = "undefined",
                d = ("sizcache" + Math.random()).replace(".", ""),
                m = String,
                g = e.document,
                y = g.documentElement,
                b = 0,
                w = 0,
                E = [].pop,
                S = [].push,
                x = [].slice,
                T = [].indexOf || function(e) {
                    var t = 0,
                        n = this.length;
                    for (; t < n; t++) {
                        if (this[t] === e) {
                            return t
                        }
                    }
                    return -1
                },
                N = function(e, t) {
                    return e[d] = t == null || t, e
                },
                C = function() {
                    var e = {},
                        t = [];
                    return N(function(n, r) {
                        return t.push(n) > i.cacheLength && delete e[t.shift()], e[n + " "] = r
                    }, e)
                },
                k = C(),
                L = C(),
                A = C(),
                O = "[\\x20\\t\\r\\n\\f]",
                M = "(?:\\\\.|[-\\w]|[^\\x00-\\xa0])+",
                _ = M.replace("w", "w#"),
                D = "([*^$|!~]?=)",
                P = "\\[" + O + "*(" + M + ")" + O + "*(?:" + D + O + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + _ + ")|)|)" + O + "*\\]",
                H = ":(" + M + ")(?:\\((?:(['\"])((?:\\\\.|[^\\\\])*?)\\2|([^()[\\]]*|(?:(?:" + P + ")|[^:]|\\\\.)*|.*))\\)|)",
                B = ":(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + O + "*((?:-\\d)?\\d*)" + O + "*\\)|)(?=[^-]|$)",
                j = new RegExp("^" + O + "+|((?:^|[^\\\\])(?:\\\\.)*)" + O + "+$", "g"),
                F = new RegExp("^" + O + "*," + O + "*"),
                I = new RegExp("^" + O + "*([\\x20\\t\\r\\n\\f>+~])" + O + "*"),
                q = new RegExp(H),
                R = /^(?:#([\w\-]+)|(\w+)|\.([\w\-]+))$/,
                U = /^:not/,
                z = /[\x20\t\r\n\f]*[+~]/,
                W = /:not\($/,
                X = /h\d/i,
                V = /input|select|textarea|button/i,
                $ = /\\(?!\\)/g,
                J = {
                    ID: new RegExp("^#(" + M + ")"),
                    CLASS: new RegExp("^\\.(" + M + ")"),
                    NAME: new RegExp("^\\[name=['\"]?(" + M + ")['\"]?\\]"),
                    TAG: new RegExp("^(" + M.replace("w", "w*") + ")"),
                    ATTR: new RegExp("^" + P),
                    PSEUDO: new RegExp("^" + H),
                    POS: new RegExp(B, "i"),
                    CHILD: new RegExp("^:(only|nth|first|last)-child(?:\\(" + O + "*(even|odd|(([+-]|)(\\d*)n|)" + O + "*(?:([+-]|)" + O + "*(\\d+)|))" + O + "*\\)|)", "i"),
                    needsContext: new RegExp("^" + O + "*[>+~]|" + B, "i")
                },
                K = function(e) {
                    var t = g.createElement("div");
                    try {
                        return e(t)
                    } catch (n) {
                        return !1
                    } finally {
                        t = null
                    }
                },
                Q = K(function(e) {
                    return e.appendChild(g.createComment("")), !e.getElementsByTagName("*").length
                }),
                G = K(function(e) {
                    return e.innerHTML = "<a href='#'></a>", e.firstChild && typeof e.firstChild.getAttribute !== p && e.firstChild.getAttribute("href") === "#"
                }),
                Y = K(function(e) {
                    e.innerHTML = "<select></select>";
                    var t = typeof e.lastChild.getAttribute("multiple");
                    return t !== "boolean" && t !== "string"
                }),
                Z = K(function(e) {
                    return e.innerHTML = "<div class='hidden e'></div><div class='hidden'></div>", !e.getElementsByClassName || !e.getElementsByClassName("e").length ? !1 : (e.lastChild.className = "e", e.getElementsByClassName("e").length === 2)
                }),
                et = K(function(e) {
                    e.id = d + 0, e.innerHTML = "<a name='" + d + "'></a><div name='" + d + "'></div>", y.insertBefore(e, y.firstChild);
                    var t = g.getElementsByName && g.getElementsByName(d).length === 2 + g.getElementsByName(d + 0).length;
                    return r = !g.getElementById(d), y.removeChild(e), t
                });
            try {
                x.call(y.childNodes, 0)[0].nodeType
            } catch (tt) {
                x = function(e) {
                    var t, n = [];
                    for (; t = this[e]; e++) {
                        n.push(t)
                    }
                    return n
                }
            }
            nt.matches = function(e, t) {
                return nt(e, null, null, t)
            }, nt.matchesSelector = function(e, t) {
                return nt(t, null, null, [e]).length > 0
            }, s = nt.getText = function(e) {
                var t, n = "",
                    r = 0,
                    i = e.nodeType;
                if (i) {
                    if (i === 1 || i === 9 || i === 11) {
                        if (typeof e.textContent == "string") {
                            return e.textContent
                        }
                        for (e = e.firstChild; e; e = e.nextSibling) {
                            n += s(e)
                        }
                    } else {
                        if (i === 3 || i === 4) {
                            return e.nodeValue
                        }
                    }
                } else {
                    for (; t = e[r]; r++) {
                        n += s(t)
                    }
                }
                return n
            }, o = nt.isXML = function(e) {
                var t = e && (e.ownerDocument || e).documentElement;
                return t ? t.nodeName !== "HTML" : !1
            }, u = nt.contains = y.contains ? function(e, t) {
                var n = e.nodeType === 9 ? e.documentElement : e,
                    r = t && t.parentNode;
                return e === r || !!(r && r.nodeType === 1 && n.contains && n.contains(r))
            } : y.compareDocumentPosition ? function(e, t) {
                return t && !!(e.compareDocumentPosition(t) & 16)
            } : function(e, t) {
                while (t = t.parentNode) {
                    if (t === e) {
                        return !0
                    }
                }
                return !1
            }, nt.attr = function(e, t) {
                var n, r = o(e);
                return r || (t = t.toLowerCase()), (n = i.attrHandle[t]) ? n(e) : r || Y ? e.getAttribute(t) : (n = e.getAttributeNode(t), n ? typeof e[t] == "boolean" ? e[t] ? t : null : n.specified ? n.value : null : null)
            }, i = nt.selectors = {
                cacheLength: 50,
                createPseudo: N,
                match: J,
                attrHandle: G ? {} : {
                    href: function(e) {
                        return e.getAttribute("href", 2)
                    },
                    type: function(e) {
                        return e.getAttribute("type")
                    }
                },
                find: {
                    ID: r ? function(e, t, n) {
                        if (typeof t.getElementById !== p && !n) {
                            var r = t.getElementById(e);
                            return r && r.parentNode ? [r] : []
                        }
                    } : function(e, n, r) {
                        if (typeof n.getElementById !== p && !r) {
                            var i = n.getElementById(e);
                            return i ? i.id === e || typeof i.getAttributeNode !== p && i.getAttributeNode("id").value === e ? [i] : t : []
                        }
                    },
                    TAG: Q ? function(e, t) {
                        if (typeof t.getElementsByTagName !== p) {
                            return t.getElementsByTagName(e)
                        }
                    } : function(e, t) {
                        var n = t.getElementsByTagName(e);
                        if (e === "*") {
                            var r, i = [],
                                s = 0;
                            for (; r = n[s]; s++) {
                                r.nodeType === 1 && i.push(r)
                            }
                            return i
                        }
                        return n
                    },
                    NAME: et && function(e, t) {
                        if (typeof t.getElementsByName !== p) {
                            return t.getElementsByName(name)
                        }
                    },
                    CLASS: Z && function(e, t, n) {
                        if (typeof t.getElementsByClassName !== p && !n) {
                            return t.getElementsByClassName(e)
                        }
                    }
                },
                relative: {
                    ">": {
                        dir: "parentNode",
                        first: !0
                    },
                    " ": {
                        dir: "parentNode"
                    },
                    "+": {
                        dir: "previousSibling",
                        first: !0
                    },
                    "~": {
                        dir: "previousSibling"
                    }
                },
                preFilter: {
                    ATTR: function(e) {
                        return e[1] = e[1].replace($, ""), e[3] = (e[4] || e[5] || "").replace($, ""), e[2] === "~=" && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                    },
                    CHILD: function(e) {
                        return e[1] = e[1].toLowerCase(), e[1] === "nth" ? (e[2] || nt.error(e[0]), e[3] = +(e[3] ? e[4] + (e[5] || 1) : 2 * (e[2] === "even" || e[2] === "odd")), e[4] = +(e[6] + e[7] || e[2] === "odd")) : e[2] && nt.error(e[0]), e
                    },
                    PSEUDO: function(e) {
                        var t, n;
                        if (J.CHILD.test(e[0])) {
                            return null
                        }
                        if (e[3]) {
                            e[2] = e[3]
                        } else {
                            if (t = e[4]) {
                                q.test(t) && (n = ut(t, !0)) && (n = t.indexOf(")", t.length - n) - t.length) && (t = t.slice(0, n), e[0] = e[0].slice(0, n)), e[2] = t
                            }
                        }
                        return e.slice(0, 3)
                    }
                },
                filter: {
                    ID: r ? function(e) {
                        return e = e.replace($, ""),
                            function(t) {
                                return t.getAttribute("id") === e
                            }
                    } : function(e) {
                        return e = e.replace($, ""),
                            function(t) {
                                var n = typeof t.getAttributeNode !== p && t.getAttributeNode("id");
                                return n && n.value === e
                            }
                    },
                    TAG: function(e) {
                        return e === "*" ? function() {
                            return !0
                        } : (e = e.replace($, "").toLowerCase(), function(t) {
                            return t.nodeName && t.nodeName.toLowerCase() === e
                        })
                    },
                    CLASS: function(e) {
                        var t = k[d][e + " "];
                        return t || (t = new RegExp("(^|" + O + ")" + e + "(" + O + "|$)")) && k(e, function(e) {
                            return t.test(e.className || typeof e.getAttribute !== p && e.getAttribute("class") || "")
                        })
                    },
                    ATTR: function(e, t, n) {
                        return function(r, i) {
                            var s = nt.attr(r, e);
                            return s == null ? t === "!=" : t ? (s += "", t === "=" ? s === n : t === "!=" ? s !== n : t === "^=" ? n && s.indexOf(n) === 0 : t === "*=" ? n && s.indexOf(n) > -1 : t === "$=" ? n && s.substr(s.length - n.length) === n : t === "~=" ? (" " + s + " ").indexOf(n) > -1 : t === "|=" ? s === n || s.substr(0, n.length + 1) === n + "-" : !1) : !0
                        }
                    },
                    CHILD: function(e, t, n, r) {
                        return e === "nth" ? function(e) {
                            var t, i, s = e.parentNode;
                            if (n === 1 && r === 0) {
                                return !0
                            }
                            if (s) {
                                i = 0;
                                for (t = s.firstChild; t; t = t.nextSibling) {
                                    if (t.nodeType === 1) {
                                        i++;
                                        if (e === t) {
                                            break
                                        }
                                    }
                                }
                            }
                            return i -= r, i === n || i % n === 0 && i / n >= 0
                        } : function(t) {
                            var n = t;
                            switch (e) {
                                case "only":
                                case "first":
                                    while (n = n.previousSibling) {
                                        if (n.nodeType === 1) {
                                            return !1
                                        }
                                    }
                                    if (e === "first") {
                                        return !0
                                    }
                                    n = t;
                                case "last":
                                    while (n = n.nextSibling) {
                                        if (n.nodeType === 1) {
                                            return !1
                                        }
                                    }
                                    return !0
                            }
                        }
                    },
                    PSEUDO: function(e, t) {
                        var n, r = i.pseudos[e] || i.setFilters[e.toLowerCase()] || nt.error("unsupported pseudo: " + e);
                        return r[d] ? r(t) : r.length > 1 ? (n = [e, e, "", t], i.setFilters.hasOwnProperty(e.toLowerCase()) ? N(function(e, n) {
                            var i, s = r(e, t),
                                o = s.length;
                            while (o--) {
                                i = T.call(e, s[o]), e[i] = !(n[i] = s[o])
                            }
                        }) : function(e) {
                            return r(e, 0, n)
                        }) : r
                    }
                },
                pseudos: {
                    not: N(function(e) {
                        var t = [],
                            n = [],
                            r = a(e.replace(j, "$1"));
                        return r[d] ? N(function(e, t, n, i) {
                            var s, o = r(e, null, i, []),
                                u = e.length;
                            while (u--) {
                                if (s = o[u]) {
                                    e[u] = !(t[u] = s)
                                }
                            }
                        }) : function(e, i, s) {
                            return t[0] = e, r(t, null, s, n), !n.pop()
                        }
                    }),
                    has: N(function(e) {
                        return function(t) {
                            return nt(e, t).length > 0
                        }
                    }),
                    contains: N(function(e) {
                        return function(t) {
                            return (t.textContent || t.innerText || s(t)).indexOf(e) > -1
                        }
                    }),
                    enabled: function(e) {
                        return e.disabled === !1
                    },
                    disabled: function(e) {
                        return e.disabled === !0
                    },
                    checked: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return t === "input" && !!e.checked || t === "option" && !!e.selected
                    },
                    selected: function(e) {
                        return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
                    },
                    parent: function(e) {
                        return !i.pseudos.empty(e)
                    },
                    empty: function(e) {
                        var t;
                        e = e.firstChild;
                        while (e) {
                            if (e.nodeName > "@" || (t = e.nodeType) === 3 || t === 4) {
                                return !1
                            }
                            e = e.nextSibling
                        }
                        return !0
                    },
                    header: function(e) {
                        return X.test(e.nodeName)
                    },
                    text: function(e) {
                        var t, n;
                        return e.nodeName.toLowerCase() === "input" && (t = e.type) === "text" && ((n = e.getAttribute("type")) == null || n.toLowerCase() === t)
                    },
                    radio: rt("radio"),
                    checkbox: rt("checkbox"),
                    file: rt("file"),
                    password: rt("password"),
                    image: rt("image"),
                    submit: it("submit"),
                    reset: it("reset"),
                    button: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return t === "input" && e.type === "button" || t === "button"
                    },
                    input: function(e) {
                        return V.test(e.nodeName)
                    },
                    focus: function(e) {
                        var t = e.ownerDocument;
                        return e === t.activeElement && (!t.hasFocus || t.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                    },
                    active: function(e) {
                        return e === e.ownerDocument.activeElement
                    },
                    first: st(function() {
                        return [0]
                    }),
                    last: st(function(e, t) {
                        return [t - 1]
                    }),
                    eq: st(function(e, t, n) {
                        return [n < 0 ? n + t : n]
                    }),
                    even: st(function(e, t) {
                        for (var n = 0; n < t; n += 2) {
                            e.push(n)
                        }
                        return e
                    }),
                    odd: st(function(e, t) {
                        for (var n = 1; n < t; n += 2) {
                            e.push(n)
                        }
                        return e
                    }),
                    lt: st(function(e, t, n) {
                        for (var r = n < 0 ? n + t : n; --r >= 0;) {
                            e.push(r)
                        }
                        return e
                    }),
                    gt: st(function(e, t, n) {
                        for (var r = n < 0 ? n + t : n; ++r < t;) {
                            e.push(r)
                        }
                        return e
                    })
                }
            }, f = y.compareDocumentPosition ? function(e, t) {
                return e === t ? (l = !0, 0) : (!e.compareDocumentPosition || !t.compareDocumentPosition ? e.compareDocumentPosition : e.compareDocumentPosition(t) & 4) ? -1 : 1
            } : function(e, t) {
                if (e === t) {
                    return l = !0, 0
                }
                if (e.sourceIndex && t.sourceIndex) {
                    return e.sourceIndex - t.sourceIndex
                }
                var n, r, i = [],
                    s = [],
                    o = e.parentNode,
                    u = t.parentNode,
                    a = o;
                if (o === u) {
                    return ot(e, t)
                }
                if (!o) {
                    return -1
                }
                if (!u) {
                    return 1
                }
                while (a) {
                    i.unshift(a), a = a.parentNode
                }
                a = u;
                while (a) {
                    s.unshift(a), a = a.parentNode
                }
                n = i.length, r = s.length;
                for (var f = 0; f < n && f < r; f++) {
                    if (i[f] !== s[f]) {
                        return ot(i[f], s[f])
                    }
                }
                return f === n ? ot(e, s[f], -1) : ot(i[f], t, 1)
            }, [0, 0].sort(f), h = !l, nt.uniqueSort = function(e) {
                var t, n = [],
                    r = 1,
                    i = 0;
                l = h, e.sort(f);
                if (l) {
                    for (; t = e[r]; r++) {
                        t === e[r - 1] && (i = n.push(r))
                    }
                    while (i--) {
                        e.splice(n[i], 1)
                    }
                }
                return e
            }, nt.error = function(e) {
                throw new Error("Syntax error, unrecognized expression: " + e)
            }, a = nt.compile = function(e, t) {
                var n, r = [],
                    i = [],
                    s = A[d][e + " "];
                if (!s) {
                    t || (t = ut(e)), n = t.length;
                    while (n--) {
                        s = ht(t[n]), s[d] ? r.push(s) : i.push(s)
                    }
                    s = A(e, pt(i, r))
                }
                return s
            }, g.querySelectorAll && function() {
                var e, t = vt,
                    n = /'|\\/g,
                    r = /\=[\x20\t\r\n\f]*([^'"\]]*)[\x20\t\r\n\f]*\]/g,
                    i = [":focus"],
                    s = [":active"],
                    u = y.matchesSelector || y.mozMatchesSelector || y.webkitMatchesSelector || y.oMatchesSelector || y.msMatchesSelector;
                K(function(e) {
                    e.innerHTML = "<select><option selected=''></option></select>", e.querySelectorAll("[selected]").length || i.push("\\[" + O + "*(?:checked|disabled|ismap|multiple|readonly|selected|value)"), e.querySelectorAll(":checked").length || i.push(":checked")
                }), K(function(e) {
                    e.innerHTML = "<p test=''></p>", e.querySelectorAll("[test^='']").length && i.push("[*^$]=" + O + "*(?:\"\"|'')"), e.innerHTML = "<input type='hidden'/>", e.querySelectorAll(":enabled").length || i.push(":enabled", ":disabled")
                }), i = new RegExp(i.join("|")), vt = function(e, r, s, o, u) {
                    if (!o && !u && !i.test(e)) {
                        var a, f, l = !0,
                            c = d,
                            h = r,
                            p = r.nodeType === 9 && e;
                        if (r.nodeType === 1 && r.nodeName.toLowerCase() !== "object") {
                            a = ut(e), (l = r.getAttribute("id")) ? c = l.replace(n, "\\$&") : r.setAttribute("id", c), c = "[id='" + c + "'] ", f = a.length;
                            while (f--) {
                                a[f] = c + a[f].join("")
                            }
                            h = z.test(e) && r.parentNode || r, p = a.join(",")
                        }
                        if (p) {
                            try {
                                return S.apply(s, x.call(h.querySelectorAll(p), 0)), s
                            } catch (v) {} finally {
                                l || r.removeAttribute("id")
                            }
                        }
                    }
                    return t(e, r, s, o, u)
                }, u && (K(function(t) {
                    e = u.call(t, "div");
                    try {
                        u.call(t, "[test!='']:sizzle"), s.push("!=", H)
                    } catch (n) {}
                }), s = new RegExp(s.join("|")), nt.matchesSelector = function(t, n) {
                    n = n.replace(r, "='$1']");
                    if (!o(t) && !s.test(n) && !i.test(n)) {
                        try {
                            var a = u.call(t, n);
                            if (a || e || t.document && t.document.nodeType !== 11) {
                                return a
                            }
                        } catch (f) {}
                    }
                    return nt(n, null, null, [t]).length > 0
                })
            }(), i.pseudos.nth = i.pseudos.eq, i.filters = mt.prototype = i.pseudos, i.setFilters = new mt, nt.attr = v.attr, v.find = nt, v.expr = nt.selectors, v.expr[":"] = v.expr.pseudos, v.unique = nt.uniqueSort, v.text = nt.getText, v.isXMLDoc = nt.isXML, v.contains = nt.contains
        }(e);
    var nt = /Until$/,
        rt = /^(?:parents|prev(?:Until|All))/,
        it = /^.[^:#\[\.,]*$/,
        st = v.expr.match.needsContext,
        ot = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };
    v.fn.extend({
        find: function(e) {
            var t, n, r, i, s, o, u = this;
            if (typeof e != "string") {
                return v(e).filter(function() {
                    for (t = 0, n = u.length; t < n; t++) {
                        if (v.contains(u[t], this)) {
                            return !0
                        }
                    }
                })
            }
            o = this.pushStack("", "find", e);
            for (t = 0, n = this.length; t < n; t++) {
                r = o.length, v.find(e, this[t], o);
                if (t > 0) {
                    for (i = r; i < o.length; i++) {
                        for (s = 0; s < r; s++) {
                            if (o[s] === o[i]) {
                                o.splice(i--, 1);
                                break
                            }
                        }
                    }
                }
            }
            return o
        },
        has: function(e) {
            var t, n = v(e, this),
                r = n.length;
            return this.filter(function() {
                for (t = 0; t < r; t++) {
                    if (v.contains(this, n[t])) {
                        return !0
                    }
                }
            })
        },
        not: function(e) {
            return this.pushStack(ft(this, e, !1), "not", e)
        },
        filter: function(e) {
            return this.pushStack(ft(this, e, !0), "filter", e)
        },
        is: function(e) {
            return !!e && (typeof e == "string" ? st.test(e) ? v(e, this.context).index(this[0]) >= 0 : v.filter(e, this).length > 0 : this.filter(e).length > 0)
        },
        closest: function(e, t) {
            var n, r = 0,
                i = this.length,
                s = [],
                o = st.test(e) || typeof e != "string" ? v(e, t || this.context) : 0;
            for (; r < i; r++) {
                n = this[r];
                while (n && n.ownerDocument && n !== t && n.nodeType !== 11) {
                    if (o ? o.index(n) > -1 : v.find.matchesSelector(n, e)) {
                        s.push(n);
                        break
                    }
                    n = n.parentNode
                }
            }
            return s = s.length > 1 ? v.unique(s) : s, this.pushStack(s, "closest", e)
        },
        index: function(e) {
            return e ? typeof e == "string" ? v.inArray(this[0], v(e)) : v.inArray(e.jquery ? e[0] : e, this) : this[0] && this[0].parentNode ? this.prevAll().length : -1
        },
        add: function(e, t) {
            var n = typeof e == "string" ? v(e, t) : v.makeArray(e && e.nodeType ? [e] : e),
                r = v.merge(this.get(), n);
            return this.pushStack(ut(n[0]) || ut(r[0]) ? r : v.unique(r))
        },
        addBack: function(e) {
            return this.add(e == null ? this.prevObject : this.prevObject.filter(e))
        }
    }), v.fn.andSelf = v.fn.addBack, v.each({
        parent: function(e) {
            var t = e.parentNode;
            return t && t.nodeType !== 11 ? t : null
        },
        parents: function(e) {
            return v.dir(e, "parentNode")
        },
        parentsUntil: function(e, t, n) {
            return v.dir(e, "parentNode", n)
        },
        next: function(e) {
            return at(e, "nextSibling")
        },
        prev: function(e) {
            return at(e, "previousSibling")
        },
        nextAll: function(e) {
            return v.dir(e, "nextSibling")
        },
        prevAll: function(e) {
            return v.dir(e, "previousSibling")
        },
        nextUntil: function(e, t, n) {
            return v.dir(e, "nextSibling", n)
        },
        prevUntil: function(e, t, n) {
            return v.dir(e, "previousSibling", n)
        },
        siblings: function(e) {
            return v.sibling((e.parentNode || {}).firstChild, e)
        },
        children: function(e) {
            return v.sibling(e.firstChild)
        },
        contents: function(e) {
            return v.nodeName(e, "iframe") ? e.contentDocument || e.contentWindow.document : v.merge([], e.childNodes)
        }
    }, function(e, t) {
        v.fn[e] = function(n, r) {
            var i = v.map(this, t, n);
            return nt.test(e) || (r = n), r && typeof r == "string" && (i = v.filter(r, i)), i = this.length > 1 && !ot[e] ? v.unique(i) : i, this.length > 1 && rt.test(e) && (i = i.reverse()), this.pushStack(i, e, l.call(arguments).join(","))
        }
    }), v.extend({
        filter: function(e, t, n) {
            return n && (e = ":not(" + e + ")"), t.length === 1 ? v.find.matchesSelector(t[0], e) ? [t[0]] : [] : v.find.matches(e, t)
        },
        dir: function(e, n, r) {
            var i = [],
                s = e[n];
            while (s && s.nodeType !== 9 && (r === t || s.nodeType !== 1 || !v(s).is(r))) {
                s.nodeType === 1 && i.push(s), s = s[n]
            }
            return i
        },
        sibling: function(e, t) {
            var n = [];
            for (; e; e = e.nextSibling) {
                e.nodeType === 1 && e !== t && n.push(e)
            }
            return n
        }
    });
    var ct = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
        ht = / jQuery\d+="(?:null|\d+)"/g,
        pt = /^\s+/,
        dt = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
        vt = /<([\w:]+)/,
        mt = /<tbody/i,
        gt = /<|&#?\w+;/,
        yt = /<(?:script|style|link)/i,
        bt = /<(?:script|object|embed|option|style)/i,
        wt = new RegExp("<(?:" + ct + ")[\\s/>]", "i"),
        Et = /^(?:checkbox|radio)$/,
        St = /checked\s*(?:[^=]|=\s*.checked.)/i,
        xt = /\/(java|ecma)script/i,
        Tt = /^\s*<!(?:\[CDATA\[|\-\-)|[\]\-]{2}>\s*$/g,
        Nt = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            legend: [1, "<fieldset>", "</fieldset>"],
            thead: [1, "<table>", "</table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
            area: [1, "<map>", "</map>"],
            _default: [0, "", ""]
        },
        Ct = lt(i),
        kt = Ct.appendChild(i.createElement("div"));
    Nt.optgroup = Nt.option, Nt.tbody = Nt.tfoot = Nt.colgroup = Nt.caption = Nt.thead, Nt.th = Nt.td, v.support.htmlSerialize || (Nt._default = [1, "X<div>", "</div>"]), v.fn.extend({
            text: function(e) {
                return v.access(this, function(e) {
                    return e === t ? v.text(this) : this.empty().append((this[0] && this[0].ownerDocument || i).createTextNode(e))
                }, null, e, arguments.length)
            },
            wrapAll: function(e) {
                if (v.isFunction(e)) {
                    return this.each(function(t) {
                        v(this).wrapAll(e.call(this, t))
                    })
                }
                if (this[0]) {
                    var t = v(e, this[0].ownerDocument).eq(0).clone(!0);
                    this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                        var e = this;
                        while (e.firstChild && e.firstChild.nodeType === 1) {
                            e = e.firstChild
                        }
                        return e
                    }).append(this)
                }
                return this
            },
            wrapInner: function(e) {
                return v.isFunction(e) ? this.each(function(t) {
                    v(this).wrapInner(e.call(this, t))
                }) : this.each(function() {
                    var t = v(this),
                        n = t.contents();
                    n.length ? n.wrapAll(e) : t.append(e)
                })
            },
            wrap: function(e) {
                var t = v.isFunction(e);
                return this.each(function(n) {
                    v(this).wrapAll(t ? e.call(this, n) : e)
                })
            },
            unwrap: function() {
                return this.parent().each(function() {
                    v.nodeName(this, "body") || v(this).replaceWith(this.childNodes)
                }).end()
            },
            append: function() {
                return this.domManip(arguments, !0, function(e) {
                    (this.nodeType === 1 || this.nodeType === 11) && this.appendChild(e)
                })
            },
            prepend: function() {
                return this.domManip(arguments, !0, function(e) {
                    (this.nodeType === 1 || this.nodeType === 11) && this.insertBefore(e, this.firstChild)
                })
            },
            before: function() {
                if (!ut(this[0])) {
                    return this.domManip(arguments, !1, function(e) {
                        this.parentNode.insertBefore(e, this)
                    })
                }
                if (arguments.length) {
                    var e = v.clean(arguments);
                    return this.pushStack(v.merge(e, this), "before", this.selector)
                }
            },
            after: function() {
                if (!ut(this[0])) {
                    return this.domManip(arguments, !1, function(e) {
                        this.parentNode.insertBefore(e, this.nextSibling)
                    })
                }
                if (arguments.length) {
                    var e = v.clean(arguments);
                    return this.pushStack(v.merge(this, e), "after", this.selector)
                }
            },
            remove: function(e, t) {
                var n, r = 0;
                for (;
                    (n = this[r]) != null; r++) {
                    if (!e || v.filter(e, [n]).length) {
                        !t && n.nodeType === 1 && (v.cleanData(n.getElementsByTagName("*")), v.cleanData([n])), n.parentNode && n.parentNode.removeChild(n)
                    }
                }
                return this
            },
            empty: function() {
                var e, t = 0;
                for (;
                    (e = this[t]) != null; t++) {
                    e.nodeType === 1 && v.cleanData(e.getElementsByTagName("*"));
                    while (e.firstChild) {
                        e.removeChild(e.firstChild)
                    }
                }
                return this
            },
            clone: function(e, t) {
                return e = e == null ? !1 : e, t = t == null ? e : t, this.map(function() {
                    return v.clone(this, e, t)
                })
            },
            html: function(e) {
                return v.access(this, function(e) {
                    var n = this[0] || {},
                        r = 0,
                        i = this.length;
                    if (e === t) {
                        return n.nodeType === 1 ? n.innerHTML.replace(ht, "") : t
                    }
                    if (typeof e == "string" && !yt.test(e) && (v.support.htmlSerialize || !wt.test(e)) && (v.support.leadingWhitespace || !pt.test(e)) && !Nt[(vt.exec(e) || ["", ""])[1].toLowerCase()]) {
                        e = e.replace(dt, "<$1></$2>");
                        try {
                            for (; r < i; r++) {
                                n = this[r] || {}, n.nodeType === 1 && (v.cleanData(n.getElementsByTagName("*")), n.innerHTML = e)
                            }
                            n = 0
                        } catch (s) {}
                    }
                    n && this.empty().append(e)
                }, null, e, arguments.length)
            },
            replaceWith: function(e) {
                return ut(this[0]) ? this.length ? this.pushStack(v(v.isFunction(e) ? e() : e), "replaceWith", e) : this : v.isFunction(e) ? this.each(function(t) {
                    var n = v(this),
                        r = n.html();
                    n.replaceWith(e.call(this, t, r))
                }) : (typeof e != "string" && (e = v(e).detach()), this.each(function() {
                    var t = this.nextSibling,
                        n = this.parentNode;
                    v(this).remove(), t ? v(t).before(e) : v(n).append(e)
                }))
            },
            detach: function(e) {
                return this.remove(e, !0)
            },
            domManip: function(e, n, r) {
                e = [].concat.apply([], e);
                var i, s, o, u, a = 0,
                    f = e[0],
                    l = [],
                    c = this.length;
                if (!v.support.checkClone && c > 1 && typeof f == "string" && St.test(f)) {
                    return this.each(function() {
                        v(this).domManip(e, n, r)
                    })
                }
                if (v.isFunction(f)) {
                    return this.each(function(i) {
                        var s = v(this);
                        e[0] = f.call(this, i, n ? s.html() : t), s.domManip(e, n, r)
                    })
                }
                if (this[0]) {
                    i = v.buildFragment(e, this, l), o = i.fragment, s = o.firstChild, o.childNodes.length === 1 && (o = s);
                    if (s) {
                        n = n && v.nodeName(s, "tr");
                        for (u = i.cacheable || c - 1; a < c; a++) {
                            r.call(n && v.nodeName(this[a], "table") ? Lt(this[a], "tbody") : this[a], a === u ? o : v.clone(o, !0, !0))
                        }
                    }
                    o = s = null, l.length && v.each(l, function(e, t) {
                        t.src ? v.ajax ? v.ajax({
                            url: t.src,
                            type: "GET",
                            dataType: "script",
                            async: !1,
                            global: !1,
                            "throws": !0
                        }) : v.error("no ajax") : v.globalEval((t.text || t.textContent || t.innerHTML || "").replace(Tt, "")), t.parentNode && t.parentNode.removeChild(t)
                    })
                }
                return this
            }
        }), v.buildFragment = function(e, n, r) {
            var s, o, u, a = e[0];
            return n = n || i, n = !n.nodeType && n[0] || n, n = n.ownerDocument || n, e.length === 1 && typeof a == "string" && a.length < 512 && n === i && a.charAt(0) === "<" && !bt.test(a) && (v.support.checkClone || !St.test(a)) && (v.support.html5Clone || !wt.test(a)) && (o = !0, s = v.fragments[a], u = s !== t), s || (s = n.createDocumentFragment(), v.clean(e, n, s, r), o && (v.fragments[a] = u && s)), {
                fragment: s,
                cacheable: o
            }
        }, v.fragments = {}, v.each({
            appendTo: "append",
            prependTo: "prepend",
            insertBefore: "before",
            insertAfter: "after",
            replaceAll: "replaceWith"
        }, function(e, t) {
            v.fn[e] = function(n) {
                var r, i = 0,
                    s = [],
                    o = v(n),
                    u = o.length,
                    a = this.length === 1 && this[0].parentNode;
                if ((a == null || a && a.nodeType === 11 && a.childNodes.length === 1) && u === 1) {
                    return o[t](this[0]), this
                }
                for (; i < u; i++) {
                    r = (i > 0 ? this.clone(!0) : this).get(), v(o[i])[t](r), s = s.concat(r)
                }
                return this.pushStack(s, e, o.selector)
            }
        }), v.extend({
            clone: function(e, t, n) {
                var r, i, s, o;
                v.support.html5Clone || v.isXMLDoc(e) || !wt.test("<" + e.nodeName + ">") ? o = e.cloneNode(!0) : (kt.innerHTML = e.outerHTML, kt.removeChild(o = kt.firstChild));
                if ((!v.support.noCloneEvent || !v.support.noCloneChecked) && (e.nodeType === 1 || e.nodeType === 11) && !v.isXMLDoc(e)) {
                    Ot(e, o), r = Mt(e), i = Mt(o);
                    for (s = 0; r[s]; ++s) {
                        i[s] && Ot(r[s], i[s])
                    }
                }
                if (t) {
                    At(e, o);
                    if (n) {
                        r = Mt(e), i = Mt(o);
                        for (s = 0; r[s]; ++s) {
                            At(r[s], i[s])
                        }
                    }
                }
                return r = i = null, o
            },
            clean: function(e, t, n, r) {
                var s, o, u, a, f, l, c, h, p, d, m, g, y = t === i && Ct,
                    b = [];
                if (!t || typeof t.createDocumentFragment == "undefined") {
                    t = i
                }
                for (s = 0;
                    (u = e[s]) != null; s++) {
                    typeof u == "number" && (u += "");
                    if (!u) {
                        continue
                    }
                    if (typeof u == "string") {
                        if (!gt.test(u)) {
                            u = t.createTextNode(u)
                        } else {
                            y = y || lt(t), c = t.createElement("div"), y.appendChild(c), u = u.replace(dt, "<$1></$2>"), a = (vt.exec(u) || ["", ""])[1].toLowerCase(), f = Nt[a] || Nt._default, l = f[0], c.innerHTML = f[1] + u + f[2];
                            while (l--) {
                                c = c.lastChild
                            }
                            if (!v.support.tbody) {
                                h = mt.test(u), p = a === "table" && !h ? c.firstChild && c.firstChild.childNodes : f[1] === "<table>" && !h ? c.childNodes : [];
                                for (o = p.length - 1; o >= 0; --o) {
                                    v.nodeName(p[o], "tbody") && !p[o].childNodes.length && p[o].parentNode.removeChild(p[o])
                                }
                            }!v.support.leadingWhitespace && pt.test(u) && c.insertBefore(t.createTextNode(pt.exec(u)[0]), c.firstChild), u = c.childNodes, c.parentNode.removeChild(c)
                        }
                    }
                    u.nodeType ? b.push(u) : v.merge(b, u)
                }
                c && (u = c = y = null);
                if (!v.support.appendChecked) {
                    for (s = 0;
                        (u = b[s]) != null; s++) {
                        v.nodeName(u, "input") ? _t(u) : typeof u.getElementsByTagName != "undefined" && v.grep(u.getElementsByTagName("input"), _t)
                    }
                }
                if (n) {
                    m = function(e) {
                        if (!e.type || xt.test(e.type)) {
                            return r ? r.push(e.parentNode ? e.parentNode.removeChild(e) : e) : n.appendChild(e)
                        }
                    };
                    for (s = 0;
                        (u = b[s]) != null; s++) {
                        if (!v.nodeName(u, "script") || !m(u)) {
                            n.appendChild(u), typeof u.getElementsByTagName != "undefined" && (g = v.grep(v.merge([], u.getElementsByTagName("script")), m), b.splice.apply(b, [s + 1, 0].concat(g)), s += g.length)
                        }
                    }
                }
                return b
            },
            cleanData: function(e, t) {
                var n, r, i, s, o = 0,
                    u = v.expando,
                    a = v.cache,
                    f = v.support.deleteExpando,
                    l = v.event.special;
                for (;
                    (i = e[o]) != null; o++) {
                    if (t || v.acceptData(i)) {
                        r = i[u], n = r && a[r];
                        if (n) {
                            if (n.events) {
                                for (s in n.events) {
                                    l[s] ? v.event.remove(i, s) : v.removeEvent(i, s, n.handle)
                                }
                            }
                            a[r] && (delete a[r], f ? delete i[u] : i.removeAttribute ? i.removeAttribute(u) : i[u] = null, v.deletedIds.push(r))
                        }
                    }
                }
            }
        }),
        function() {
            var e, t;
            v.uaMatch = function(e) {
                e = e.toLowerCase();
                var t = /(chrome)[ \/]([\w.]+)/.exec(e) || /(webkit)[ \/]([\w.]+)/.exec(e) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e) || /(msie) ([\w.]+)/.exec(e) || e.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e) || [];
                return {
                    browser: t[1] || "",
                    version: t[2] || "0"
                }
            }, e = v.uaMatch(o.userAgent), t = {}, e.browser && (t[e.browser] = !0, t.version = e.version), t.chrome ? t.webkit = !0 : t.webkit && (t.safari = !0), v.browser = t, v.sub = function() {
                function e(t, n) {
                    return new e.fn.init(t, n)
                }
                v.extend(!0, e, this), e.superclass = this, e.fn = e.prototype = this(), e.fn.constructor = e, e.sub = this.sub, e.fn.init = function(r, i) {
                    return i && i instanceof v && !(i instanceof e) && (i = e(i)), v.fn.init.call(this, r, i, t)
                }, e.fn.init.prototype = e.fn;
                var t = e(i);
                return e
            }
        }();
    var Dt, Pt, Ht, Bt = /alpha\([^)]*\)/i,
        jt = /opacity=([^)]*)/,
        Ft = /^(top|right|bottom|left)$/,
        It = /^(none|table(?!-c[ea]).+)/,
        qt = /^margin/,
        Rt = new RegExp("^(" + m + ")(.*)$", "i"),
        Ut = new RegExp("^(" + m + ")(?!px)[a-z%]+$", "i"),
        zt = new RegExp("^([-+])=(" + m + ")", "i"),
        Wt = {
            BODY: "block"
        },
        Xt = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        },
        Vt = {
            letterSpacing: 0,
            fontWeight: 400
        },
        $t = ["Top", "Right", "Bottom", "Left"],
        Jt = ["Webkit", "O", "Moz", "ms"],
        Kt = v.fn.toggle;
    v.fn.extend({
        css: function(e, n) {
            return v.access(this, function(e, n, r) {
                return r !== t ? v.style(e, n, r) : v.css(e, n)
            }, e, n, arguments.length > 1)
        },
        show: function() {
            return Yt(this, !0)
        },
        hide: function() {
            return Yt(this)
        },
        toggle: function(e, t) {
            var n = typeof e == "boolean";
            return v.isFunction(e) && v.isFunction(t) ? Kt.apply(this, arguments) : this.each(function() {
                (n ? e : Gt(this)) ? v(this).show(): v(this).hide()
            })
        }
    }), v.extend({
        cssHooks: {
            opacity: {
                get: function(e, t) {
                    if (t) {
                        var n = Dt(e, "opacity");
                        return n === "" ? "1" : n
                    }
                }
            }
        },
        cssNumber: {
            fillOpacity: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            "float": v.support.cssFloat ? "cssFloat" : "styleFloat"
        },
        style: function(e, n, r, i) {
            if (!e || e.nodeType === 3 || e.nodeType === 8 || !e.style) {
                return
            }
            var s, o, u, a = v.camelCase(n),
                f = e.style;
            n = v.cssProps[a] || (v.cssProps[a] = Qt(f, a)), u = v.cssHooks[n] || v.cssHooks[a];
            if (r === t) {
                return u && "get" in u && (s = u.get(e, !1, i)) !== t ? s : f[n]
            }
            o = typeof r, o === "string" && (s = zt.exec(r)) && (r = (s[1] + 1) * s[2] + parseFloat(v.css(e, n)), o = "number");
            if (r == null || o === "number" && isNaN(r)) {
                return
            }
            o === "number" && !v.cssNumber[a] && (r += "px");
            if (!u || !("set" in u) || (r = u.set(e, r, i)) !== t) {
                try {
                    f[n] = r
                } catch (l) {}
            }
        },
        css: function(e, n, r, i) {
            var s, o, u, a = v.camelCase(n);
            return n = v.cssProps[a] || (v.cssProps[a] = Qt(e.style, a)), u = v.cssHooks[n] || v.cssHooks[a], u && "get" in u && (s = u.get(e, !0, i)), s === t && (s = Dt(e, n)), s === "normal" && n in Vt && (s = Vt[n]), r || i !== t ? (o = parseFloat(s), r || v.isNumeric(o) ? o || 0 : s) : s
        },
        swap: function(e, t, n) {
            var r, i, s = {};
            for (i in t) {
                s[i] = e.style[i], e.style[i] = t[i]
            }
            r = n.call(e);
            for (i in t) {
                e.style[i] = s[i]
            }
            return r
        }
    }), e.getComputedStyle ? Dt = function(t, n) {
        var r, i, s, o, u = e.getComputedStyle(t, null),
            a = t.style;
        return u && (r = u.getPropertyValue(n) || u[n], r === "" && !v.contains(t.ownerDocument, t) && (r = v.style(t, n)), Ut.test(r) && qt.test(n) && (i = a.width, s = a.minWidth, o = a.maxWidth, a.minWidth = a.maxWidth = a.width = r, r = u.width, a.width = i, a.minWidth = s, a.maxWidth = o)), r
    } : i.documentElement.currentStyle && (Dt = function(e, t) {
        var n, r, i = e.currentStyle && e.currentStyle[t],
            s = e.style;
        return i == null && s && s[t] && (i = s[t]), Ut.test(i) && !Ft.test(t) && (n = s.left, r = e.runtimeStyle && e.runtimeStyle.left, r && (e.runtimeStyle.left = e.currentStyle.left), s.left = t === "fontSize" ? "1em" : i, i = s.pixelLeft + "px", s.left = n, r && (e.runtimeStyle.left = r)), i === "" ? "auto" : i
    }), v.each(["height", "width"], function(e, t) {
        v.cssHooks[t] = {
            get: function(e, n, r) {
                if (n) {
                    return e.offsetWidth === 0 && It.test(Dt(e, "display")) ? v.swap(e, Xt, function() {
                        return tn(e, t, r)
                    }) : tn(e, t, r)
                }
            },
            set: function(e, n, r) {
                return Zt(e, n, r ? en(e, t, r, v.support.boxSizing && v.css(e, "boxSizing") === "border-box") : 0)
            }
        }
    }), v.support.opacity || (v.cssHooks.opacity = {
        get: function(e, t) {
            return jt.test((t && e.currentStyle ? e.currentStyle.filter : e.style.filter) || "") ? 0.01 * parseFloat(RegExp.$1) + "" : t ? "1" : ""
        },
        set: function(e, t) {
            var n = e.style,
                r = e.currentStyle,
                i = v.isNumeric(t) ? "alpha(opacity=" + t * 100 + ")" : "",
                s = r && r.filter || n.filter || "";
            n.zoom = 1;
            if (t >= 1 && v.trim(s.replace(Bt, "")) === "" && n.removeAttribute) {
                n.removeAttribute("filter");
                if (r && !r.filter) {
                    return
                }
            }
            n.filter = Bt.test(s) ? s.replace(Bt, i) : s + " " + i
        }
    }), v(function() {
        v.support.reliableMarginRight || (v.cssHooks.marginRight = {
            get: function(e, t) {
                return v.swap(e, {
                    display: "inline-block"
                }, function() {
                    if (t) {
                        return Dt(e, "marginRight")
                    }
                })
            }
        }), !v.support.pixelPosition && v.fn.position && v.each(["top", "left"], function(e, t) {
            v.cssHooks[t] = {
                get: function(e, n) {
                    if (n) {
                        var r = Dt(e, t);
                        return Ut.test(r) ? v(e).position()[t] + "px" : r
                    }
                }
            }
        })
    }), v.expr && v.expr.filters && (v.expr.filters.hidden = function(e) {
        return e.offsetWidth === 0 && e.offsetHeight === 0 || !v.support.reliableHiddenOffsets && (e.style && e.style.display || Dt(e, "display")) === "none"
    }, v.expr.filters.visible = function(e) {
        return !v.expr.filters.hidden(e)
    }), v.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(e, t) {
        v.cssHooks[e + t] = {
            expand: function(n) {
                var r, i = typeof n == "string" ? n.split(" ") : [n],
                    s = {};
                for (r = 0; r < 4; r++) {
                    s[e + $t[r] + t] = i[r] || i[r - 2] || i[0]
                }
                return s
            }
        }, qt.test(e) || (v.cssHooks[e + t].set = Zt)
    });
    var rn = /%20/g,
        sn = /\[\]$/,
        on = /\r?\n/g,
        un = /^(?:color|date|datetime|datetime-local|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,
        an = /^(?:select|textarea)/i;
    v.fn.extend({
        serialize: function() {
            return v.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                return this.elements ? v.makeArray(this.elements) : this
            }).filter(function() {
                return this.name && !this.disabled && (this.checked || an.test(this.nodeName) || un.test(this.type))
            }).map(function(e, t) {
                var n = v(this).val();
                return n == null ? null : v.isArray(n) ? v.map(n, function(e, n) {
                    return {
                        name: t.name,
                        value: e.replace(on, "\r\n")
                    }
                }) : {
                    name: t.name,
                    value: n.replace(on, "\r\n")
                }
            }).get()
        }
    }), v.param = function(e, n) {
        var r, i = [],
            s = function(e, t) {
                t = v.isFunction(t) ? t() : t == null ? "" : t, i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
            };
        n === t && (n = v.ajaxSettings && v.ajaxSettings.traditional);
        if (v.isArray(e) || e.jquery && !v.isPlainObject(e)) {
            v.each(e, function() {
                s(this.name, this.value)
            })
        } else {
            for (r in e) {
                fn(r, e[r], n, s)
            }
        }
        return i.join("&").replace(rn, "+")
    };
    var ln, cn, hn = /#.*$/,
        pn = /^(.*?):[ \t]*([^\r\n]*)\r?$/mg,
        dn = /^(?:about|app|app\-storage|.+\-extension|file|res|widget):$/,
        vn = /^(?:GET|HEAD)$/,
        mn = /^\/\//,
        gn = /\?/,
        yn = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
        bn = /([?&])_=[^&]*/,
        wn = /^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
        En = v.fn.load,
        Sn = {},
        xn = {},
        Tn = ["*/"] + ["*"];
    try {
        cn = s.href
    } catch (Nn) {
        cn = i.createElement("a"), cn.href = "", cn = cn.href
    }
    ln = wn.exec(cn.toLowerCase()) || [], v.fn.load = function(e, n, r) {
        if (typeof e != "string" && En) {
            return En.apply(this, arguments)
        }
        if (!this.length) {
            return this
        }
        var i, s, o, u = this,
            a = e.indexOf(" ");
        return a >= 0 && (i = e.slice(a, e.length), e = e.slice(0, a)), v.isFunction(n) ? (r = n, n = t) : n && typeof n == "object" && (s = "POST"), v.ajax({
            url: e,
            type: s,
            dataType: "html",
            data: n,
            complete: function(e, t) {
                r && u.each(r, o || [e.responseText, t, e])
            }
        }).done(function(e) {
            o = arguments, u.html(i ? v("<div>").append(e.replace(yn, "")).find(i) : e)
        }), this
    }, v.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "), function(e, t) {
        v.fn[t] = function(e) {
            return this.on(t, e)
        }
    }), v.each(["get", "post"], function(e, n) {
        v[n] = function(e, r, i, s) {
            return v.isFunction(r) && (s = s || i, i = r, r = t), v.ajax({
                type: n,
                url: e,
                data: r,
                success: i,
                dataType: s
            })
        }
    }), v.extend({
        getScript: function(e, n) {
            return v.get(e, t, n, "script")
        },
        getJSON: function(e, t, n) {
            return v.get(e, t, n, "json")
        },
        ajaxSetup: function(e, t) {
            return t ? Ln(e, v.ajaxSettings) : (t = e, e = v.ajaxSettings), Ln(e, t), e
        },
        ajaxSettings: {
            url: cn,
            isLocal: dn.test(ln[1]),
            global: !0,
            type: "GET",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            processData: !0,
            async: !0,
            accepts: {
                xml: "application/xml, text/xml",
                html: "text/html",
                text: "text/plain",
                json: "application/json, text/javascript",
                "*": Tn
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText"
            },
            converters: {
                "* text": e.String,
                "text html": !0,
                "text json": v.parseJSON,
                "text xml": v.parseXML
            },
            flatOptions: {
                context: !0,
                url: !0
            }
        },
        ajaxPrefilter: Cn(Sn),
        ajaxTransport: Cn(xn),
        ajax: function(e, n) {
            function T(e, n, s, a) {
                var l, y, b, w, S, T = n;
                if (E === 2) {
                    return
                }
                E = 2, u && clearTimeout(u), o = t, i = a || "", x.readyState = e > 0 ? 4 : 0, s && (w = An(c, x, s));
                if (e >= 200 && e < 300 || e === 304) {
                    c.ifModified && (S = x.getResponseHeader("Last-Modified"), S && (v.lastModified[r] = S), S = x.getResponseHeader("Etag"), S && (v.etag[r] = S)), e === 304 ? (T = "notmodified", l = !0) : (l = On(c, w), T = l.state, y = l.data, b = l.error, l = !b)
                } else {
                    b = T;
                    if (!T || e) {
                        T = "error", e < 0 && (e = 0)
                    }
                }
                x.status = e, x.statusText = (n || T) + "", l ? d.resolveWith(h, [y, T, x]) : d.rejectWith(h, [x, T, b]), x.statusCode(g), g = t, f && p.trigger("ajax" + (l ? "Success" : "Error"), [x, c, l ? y : b]), m.fireWith(h, [x, T]), f && (p.trigger("ajaxComplete", [x, c]), --v.active || v.event.trigger("ajaxStop"))
            }
            typeof e == "object" && (n = e, e = t), n = n || {};
            var r, i, s, o, u, a, f, l, c = v.ajaxSetup({}, n),
                h = c.context || c,
                p = h !== c && (h.nodeType || h instanceof v) ? v(h) : v.event,
                d = v.Deferred(),
                m = v.Callbacks("once memory"),
                g = c.statusCode || {},
                b = {},
                w = {},
                E = 0,
                S = "canceled",
                x = {
                    readyState: 0,
                    setRequestHeader: function(e, t) {
                        if (!E) {
                            var n = e.toLowerCase();
                            e = w[n] = w[n] || e, b[e] = t
                        }
                        return this
                    },
                    getAllResponseHeaders: function() {
                        return E === 2 ? i : null
                    },
                    getResponseHeader: function(e) {
                        var n;
                        if (E === 2) {
                            if (!s) {
                                s = {};
                                while (n = pn.exec(i)) {
                                    s[n[1].toLowerCase()] = n[2]
                                }
                            }
                            n = s[e.toLowerCase()]
                        }
                        return n === t ? null : n
                    },
                    overrideMimeType: function(e) {
                        return E || (c.mimeType = e), this
                    },
                    abort: function(e) {
                        return e = e || S, o && o.abort(e), T(0, e), this
                    }
                };
            d.promise(x), x.success = x.done, x.error = x.fail, x.complete = m.add, x.statusCode = function(e) {
                if (e) {
                    var t;
                    if (E < 2) {
                        for (t in e) {
                            g[t] = [g[t], e[t]]
                        }
                    } else {
                        t = e[x.status], x.always(t)
                    }
                }
                return this
            }, c.url = ((e || c.url) + "").replace(hn, "").replace(mn, ln[1] + "//"), c.dataTypes = v.trim(c.dataType || "*").toLowerCase().split(y), c.crossDomain == null && (a = wn.exec(c.url.toLowerCase()), c.crossDomain = !(!a || a[1] === ln[1] && a[2] === ln[2] && (a[3] || (a[1] === "http:" ? 80 : 443)) == (ln[3] || (ln[1] === "http:" ? 80 : 443)))), c.data && c.processData && typeof c.data != "string" && (c.data = v.param(c.data, c.traditional)), kn(Sn, c, n, x);
            if (E === 2) {
                return x
            }
            f = c.global, c.type = c.type.toUpperCase(), c.hasContent = !vn.test(c.type), f && v.active++ === 0 && v.event.trigger("ajaxStart");
            if (!c.hasContent) {
                c.data && (c.url += (gn.test(c.url) ? "&" : "?") + c.data, delete c.data), r = c.url;
                if (c.cache === !1) {
                    var N = v.now(),
                        C = c.url.replace(bn, "$1_=" + N);
                    c.url = C + (C === c.url ? (gn.test(c.url) ? "&" : "?") + "_=" + N : "")
                }
            }(c.data && c.hasContent && c.contentType !== !1 || n.contentType) && x.setRequestHeader("Content-Type", c.contentType), c.ifModified && (r = r || c.url, v.lastModified[r] && x.setRequestHeader("If-Modified-Since", v.lastModified[r]), v.etag[r] && x.setRequestHeader("If-None-Match", v.etag[r])), x.setRequestHeader("Accept", c.dataTypes[0] && c.accepts[c.dataTypes[0]] ? c.accepts[c.dataTypes[0]] + (c.dataTypes[0] !== "*" ? ", " + Tn + "; q=0.01" : "") : c.accepts["*"]);
            for (l in c.headers) {
                x.setRequestHeader(l, c.headers[l])
            }
            if (!c.beforeSend || c.beforeSend.call(h, x, c) !== !1 && E !== 2) {
                S = "abort";
                for (l in {
                        success: 1,
                        error: 1,
                        complete: 1
                    }) {
                    x[l](c[l])
                }
                o = kn(xn, c, n, x);
                if (!o) {
                    T(-1, "No Transport")
                } else {
                    x.readyState = 1, f && p.trigger("ajaxSend", [x, c]), c.async && c.timeout > 0 && (u = setTimeout(function() {
                        x.abort("timeout")
                    }, c.timeout));
                    try {
                        E = 1, o.send(b, T)
                    } catch (k) {
                        if (!(E < 2)) {
                            throw k
                        }
                        T(-1, k)
                    }
                }
                return x
            }
            return x.abort()
        },
        active: 0,
        lastModified: {},
        etag: {}
    });
    var Mn = [],
        _n = /\?/,
        Dn = /(=)\?(?=&|$)|\?\?/,
        Pn = v.now();
    v.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var e = Mn.pop() || v.expando + "_" + Pn++;
            return this[e] = !0, e
        }
    }), v.ajaxPrefilter("json jsonp", function(n, r, i) {
        var s, o, u, a = n.data,
            f = n.url,
            l = n.jsonp !== !1,
            c = l && Dn.test(f),
            h = l && !c && typeof a == "string" && !(n.contentType || "").indexOf("application/x-www-form-urlencoded") && Dn.test(a);
        if (n.dataTypes[0] === "jsonp" || c || h) {
            return s = n.jsonpCallback = v.isFunction(n.jsonpCallback) ? n.jsonpCallback() : n.jsonpCallback, o = e[s], c ? n.url = f.replace(Dn, "$1" + s) : h ? n.data = a.replace(Dn, "$1" + s) : l && (n.url += (_n.test(f) ? "&" : "?") + n.jsonp + "=" + s), n.converters["script json"] = function() {
                return u || v.error(s + " was not called"), u[0]
            }, n.dataTypes[0] = "json", e[s] = function() {
                u = arguments
            }, i.always(function() {
                e[s] = o, n[s] && (n.jsonpCallback = r.jsonpCallback, Mn.push(s)), u && v.isFunction(o) && o(u[0]), u = o = t
            }), "script"
        }
    }), v.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /javascript|ecmascript/
        },
        converters: {
            "text script": function(e) {
                return v.globalEval(e), e
            }
        }
    }), v.ajaxPrefilter("script", function(e) {
        e.cache === t && (e.cache = !1), e.crossDomain && (e.type = "GET", e.global = !1)
    }), v.ajaxTransport("script", function(e) {
        if (e.crossDomain) {
            var n, r = i.head || i.getElementsByTagName("head")[0] || i.documentElement;
            return {
                send: function(s, o) {
                    n = i.createElement("script"), n.async = "async", e.scriptCharset && (n.charset = e.scriptCharset), n.src = e.url, n.onload = n.onreadystatechange = function(e, i) {
                        if (i || !n.readyState || /loaded|complete/.test(n.readyState)) {
                            n.onload = n.onreadystatechange = null, r && n.parentNode && r.removeChild(n), n = t, i || o(200, "success")
                        }
                    }, r.insertBefore(n, r.firstChild)
                },
                abort: function() {
                    n && n.onload(0, 1)
                }
            }
        }
    });
    var Hn, Bn = e.ActiveXObject ? function() {
            for (var e in Hn) {
                Hn[e](0, 1)
            }
        } : !1,
        jn = 0;
    v.ajaxSettings.xhr = e.ActiveXObject ? function() {
            return !this.isLocal && Fn() || In()
        } : Fn,
        function(e) {
            v.extend(v.support, {
                ajax: !!e,
                cors: !!e && "withCredentials" in e
            })
        }(v.ajaxSettings.xhr()), v.support.ajax && v.ajaxTransport(function(n) {
            if (!n.crossDomain || v.support.cors) {
                var r;
                return {
                    send: function(i, s) {
                        var o, u, a = n.xhr();
                        n.username ? a.open(n.type, n.url, n.async, n.username, n.password) : a.open(n.type, n.url, n.async);
                        if (n.xhrFields) {
                            for (u in n.xhrFields) {
                                a[u] = n.xhrFields[u]
                            }
                        }
                        n.mimeType && a.overrideMimeType && a.overrideMimeType(n.mimeType), !n.crossDomain && !i["X-Requested-With"] && (i["X-Requested-With"] = "XMLHttpRequest");
                        try {
                            for (u in i) {
                                a.setRequestHeader(u, i[u])
                            }
                        } catch (f) {}
                        a.send(n.hasContent && n.data || null), r = function(e, i) {
                            var u, f, l, c, h;
                            try {
                                if (r && (i || a.readyState === 4)) {
                                    r = t, o && (a.onreadystatechange = v.noop, Bn && delete Hn[o]);
                                    if (i) {
                                        a.readyState !== 4 && a.abort()
                                    } else {
                                        u = a.status, l = a.getAllResponseHeaders(), c = {}, h = a.responseXML, h && h.documentElement && (c.xml = h);
                                        try {
                                            c.text = a.responseText
                                        } catch (p) {}
                                        try {
                                            f = a.statusText
                                        } catch (p) {
                                            f = ""
                                        }!u && n.isLocal && !n.crossDomain ? u = c.text ? 200 : 404 : u === 1223 && (u = 204)
                                    }
                                }
                            } catch (d) {
                                i || s(-1, d)
                            }
                            c && s(u, f, c, l)
                        }, n.async ? a.readyState === 4 ? setTimeout(r, 0) : (o = ++jn, Bn && (Hn || (Hn = {}, v(e).unload(Bn)), Hn[o] = r), a.onreadystatechange = r) : r()
                    },
                    abort: function() {
                        r && r(0, 1)
                    }
                }
            }
        });
    var qn, Rn, Un = /^(?:toggle|show|hide)$/,
        zn = new RegExp("^(?:([-+])=|)(" + m + ")([a-z%]*)$", "i"),
        Wn = /queueHooks$/,
        Xn = [Gn],
        Vn = {
            "*": [function(e, t) {
                var n, r, i = this.createTween(e, t),
                    s = zn.exec(t),
                    o = i.cur(),
                    u = +o || 0,
                    a = 1,
                    f = 20;
                if (s) {
                    n = +s[2], r = s[3] || (v.cssNumber[e] ? "" : "px");
                    if (r !== "px" && u) {
                        u = v.css(i.elem, e, !0) || n || 1;
                        do {
                            a = a || ".5", u /= a, v.style(i.elem, e, u + r)
                        } while (a !== (a = i.cur() / o) && a !== 1 && --f)
                    }
                    i.unit = r, i.start = u, i.end = s[1] ? u + (s[1] + 1) * n : n
                }
                return i
            }]
        };
    v.Animation = v.extend(Kn, {
        tweener: function(e, t) {
            v.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
            var n, r = 0,
                i = e.length;
            for (; r < i; r++) {
                n = e[r], Vn[n] = Vn[n] || [], Vn[n].unshift(t)
            }
        },
        prefilter: function(e, t) {
            t ? Xn.unshift(e) : Xn.push(e)
        }
    }), v.Tween = Yn, Yn.prototype = {
        constructor: Yn,
        init: function(e, t, n, r, i, s) {
            this.elem = e, this.prop = n, this.easing = i || "swing", this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = s || (v.cssNumber[n] ? "" : "px")
        },
        cur: function() {
            var e = Yn.propHooks[this.prop];
            return e && e.get ? e.get(this) : Yn.propHooks._default.get(this)
        },
        run: function(e) {
            var t, n = Yn.propHooks[this.prop];
            return this.options.duration ? this.pos = t = v.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : Yn.propHooks._default.set(this), this
        }
    }, Yn.prototype.init.prototype = Yn.prototype, Yn.propHooks = {
        _default: {
            get: function(e) {
                var t;
                return e.elem[e.prop] == null || !!e.elem.style && e.elem.style[e.prop] != null ? (t = v.css(e.elem, e.prop, !1, ""), !t || t === "auto" ? 0 : t) : e.elem[e.prop]
            },
            set: function(e) {
                v.fx.step[e.prop] ? v.fx.step[e.prop](e) : e.elem.style && (e.elem.style[v.cssProps[e.prop]] != null || v.cssHooks[e.prop]) ? v.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
            }
        }
    }, Yn.propHooks.scrollTop = Yn.propHooks.scrollLeft = {
        set: function(e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
        }
    }, v.each(["toggle", "show", "hide"], function(e, t) {
        var n = v.fn[t];
        v.fn[t] = function(r, i, s) {
            return r == null || typeof r == "boolean" || !e && v.isFunction(r) && v.isFunction(i) ? n.apply(this, arguments) : this.animate(Zn(t, !0), r, i, s)
        }
    }), v.fn.extend({
        fadeTo: function(e, t, n, r) {
            return this.filter(Gt).css("opacity", 0).show().end().animate({
                opacity: t
            }, e, n, r)
        },
        animate: function(e, t, n, r) {
            var i = v.isEmptyObject(e),
                s = v.speed(t, n, r),
                o = function() {
                    var t = Kn(this, v.extend({}, e), s);
                    i && t.stop(!0)
                };
            return i || s.queue === !1 ? this.each(o) : this.queue(s.queue, o)
        },
        stop: function(e, n, r) {
            var i = function(e) {
                var t = e.stop;
                delete e.stop, t(r)
            };
            return typeof e != "string" && (r = n, n = e, e = t), n && e !== !1 && this.queue(e || "fx", []), this.each(function() {
                var t = !0,
                    n = e != null && e + "queueHooks",
                    s = v.timers,
                    o = v._data(this);
                if (n) {
                    o[n] && o[n].stop && i(o[n])
                } else {
                    for (n in o) {
                        o[n] && o[n].stop && Wn.test(n) && i(o[n])
                    }
                }
                for (n = s.length; n--;) {
                    s[n].elem === this && (e == null || s[n].queue === e) && (s[n].anim.stop(r), t = !1, s.splice(n, 1))
                }(t || !r) && v.dequeue(this, e)
            })
        }
    }), v.each({
        slideDown: Zn("show"),
        slideUp: Zn("hide"),
        slideToggle: Zn("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function(e, t) {
        v.fn[e] = function(e, n, r) {
            return this.animate(t, e, n, r)
        }
    }), v.speed = function(e, t, n) {
        var r = e && typeof e == "object" ? v.extend({}, e) : {
            complete: n || !n && t || v.isFunction(e) && e,
            duration: e,
            easing: n && t || t && !v.isFunction(t) && t
        };
        r.duration = v.fx.off ? 0 : typeof r.duration == "number" ? r.duration : r.duration in v.fx.speeds ? v.fx.speeds[r.duration] : v.fx.speeds._default;
        if (r.queue == null || r.queue === !0) {
            r.queue = "fx"
        }
        return r.old = r.complete, r.complete = function() {
            v.isFunction(r.old) && r.old.call(this), r.queue && v.dequeue(this, r.queue)
        }, r
    }, v.easing = {
        linear: function(e) {
            return e
        },
        swing: function(e) {
            return 0.5 - Math.cos(e * Math.PI) / 2
        }
    }, v.timers = [], v.fx = Yn.prototype.init, v.fx.tick = function() {
        var e, n = v.timers,
            r = 0;
        qn = v.now();
        for (; r < n.length; r++) {
            e = n[r], !e() && n[r] === e && n.splice(r--, 1)
        }
        n.length || v.fx.stop(), qn = t
    }, v.fx.timer = function(e) {
        e() && v.timers.push(e) && !Rn && (Rn = setInterval(v.fx.tick, v.fx.interval))
    }, v.fx.interval = 13, v.fx.stop = function() {
        clearInterval(Rn), Rn = null
    }, v.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    }, v.fx.step = {}, v.expr && v.expr.filters && (v.expr.filters.animated = function(e) {
        return v.grep(v.timers, function(t) {
            return e === t.elem
        }).length
    });
    var er = /^(?:body|html)$/i;
    v.fn.offset = function(e) {
        if (arguments.length) {
            return e === t ? this : this.each(function(t) {
                v.offset.setOffset(this, e, t)
            })
        }
        var n, r, i, s, o, u, a, f = {
                top: 0,
                left: 0
            },
            l = this[0],
            c = l && l.ownerDocument;
        if (!c) {
            return
        }
        return (r = c.body) === l ? v.offset.bodyOffset(l) : (n = c.documentElement, v.contains(n, l) ? (typeof l.getBoundingClientRect != "undefined" && (f = l.getBoundingClientRect()), i = tr(c), s = n.clientTop || r.clientTop || 0, o = n.clientLeft || r.clientLeft || 0, u = i.pageYOffset || n.scrollTop, a = i.pageXOffset || n.scrollLeft, {
            top: f.top + u - s,
            left: f.left + a - o
        }) : f)
    }, v.offset = {
        bodyOffset: function(e) {
            var t = e.offsetTop,
                n = e.offsetLeft;
            return v.support.doesNotIncludeMarginInBodyOffset && (t += parseFloat(v.css(e, "marginTop")) || 0, n += parseFloat(v.css(e, "marginLeft")) || 0), {
                top: t,
                left: n
            }
        },
        setOffset: function(e, t, n) {
            var r = v.css(e, "position");
            r === "static" && (e.style.position = "relative");
            var i = v(e),
                s = i.offset(),
                o = v.css(e, "top"),
                u = v.css(e, "left"),
                a = (r === "absolute" || r === "fixed") && v.inArray("auto", [o, u]) > -1,
                f = {},
                l = {},
                c, h;
            a ? (l = i.position(), c = l.top, h = l.left) : (c = parseFloat(o) || 0, h = parseFloat(u) || 0), v.isFunction(t) && (t = t.call(e, n, s)), t.top != null && (f.top = t.top - s.top + c), t.left != null && (f.left = t.left - s.left + h), "using" in t ? t.using.call(e, f) : i.css(f)
        }
    }, v.fn.extend({
        position: function() {
            if (!this[0]) {
                return
            }
            var e = this[0],
                t = this.offsetParent(),
                n = this.offset(),
                r = er.test(t[0].nodeName) ? {
                    top: 0,
                    left: 0
                } : t.offset();
            return n.top -= parseFloat(v.css(e, "marginTop")) || 0, n.left -= parseFloat(v.css(e, "marginLeft")) || 0, r.top += parseFloat(v.css(t[0], "borderTopWidth")) || 0, r.left += parseFloat(v.css(t[0], "borderLeftWidth")) || 0, {
                top: n.top - r.top,
                left: n.left - r.left
            }
        },
        offsetParent: function() {
            return this.map(function() {
                var e = this.offsetParent || i.body;
                while (e && !er.test(e.nodeName) && v.css(e, "position") === "static") {
                    e = e.offsetParent
                }
                return e || i.body
            })
        }
    }), v.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function(e, n) {
        var r = /Y/.test(n);
        v.fn[e] = function(i) {
            return v.access(this, function(e, i, s) {
                var o = tr(e);
                if (s === t) {
                    return o ? n in o ? o[n] : o.document.documentElement[i] : e[i]
                }
                o ? o.scrollTo(r ? v(o).scrollLeft() : s, r ? s : v(o).scrollTop()) : e[i] = s
            }, e, i, arguments.length, null)
        }
    }), v.each({
        Height: "height",
        Width: "width"
    }, function(e, n) {
        v.each({
            padding: "inner" + e,
            content: n,
            "": "outer" + e
        }, function(r, i) {
            v.fn[i] = function(i, s) {
                var o = arguments.length && (r || typeof i != "boolean"),
                    u = r || (i === !0 || s === !0 ? "margin" : "border");
                return v.access(this, function(n, r, i) {
                    var s;
                    return v.isWindow(n) ? n.document.documentElement["client" + e] : n.nodeType === 9 ? (s = n.documentElement, Math.max(n.body["scroll" + e], s["scroll" + e], n.body["offset" + e], s["offset" + e], s["client" + e])) : i === t ? v.css(n, r, i, u) : v.style(n, r, i, u)
                }, n, o ? i : t, o, null)
            }
        })
    }), e.jQuery = e.$ = v, typeof define == "function" && define.amd && define.amd.jQuery && define("jquery", [], function() {
        return v
    })
})(window);
(function() {
    var e;
    var d = function d() {};
    var b = ["assert", "clear", "count", "debug", "dir", "dirxml", "error", "exception", "group", "groupCollapsed", "groupEnd", "info", "log", "markTimeline", "profile", "profileEnd", "table", "time", "timeEnd", "timeStamp", "trace", "warn"];
    var c = b.length;
    var a = (window.console = window.console || {});
    while (c--) {
        e = b[c];
        if (!a[e]) {
            a[e] = d
        }
    }
}());
jQuery.easing.jswing = jQuery.easing.swing;
jQuery.extend(jQuery.easing, {
    def: "easeOutQuad",
    swing: function(e, f, a, h, g) {
        return jQuery.easing[jQuery.easing.def](e, f, a, h, g)
    },
    easeInQuad: function(e, f, a, h, g) {
        return h * (f /= g) * f + a
    },
    easeOutQuad: function(e, f, a, h, g) {
        return -h * (f /= g) * (f - 2) + a
    },
    easeInOutQuad: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f + a
        }
        return -h / 2 * ((--f) * (f - 2) - 1) + a
    },
    easeInCubic: function(e, f, a, h, g) {
        return h * (f /= g) * f * f + a
    },
    easeOutCubic: function(e, f, a, h, g) {
        return h * ((f = f / g - 1) * f * f + 1) + a
    },
    easeInOutCubic: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f + a
        }
        return h / 2 * ((f -= 2) * f * f + 2) + a
    },
    easeInQuart: function(e, f, a, h, g) {
        return h * (f /= g) * f * f * f + a
    },
    easeOutQuart: function(e, f, a, h, g) {
        return -h * ((f = f / g - 1) * f * f * f - 1) + a
    },
    easeInOutQuart: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f * f + a
        }
        return -h / 2 * ((f -= 2) * f * f * f - 2) + a
    },
    easeInQuint: function(e, f, a, h, g) {
        return h * (f /= g) * f * f * f * f + a
    },
    easeOutQuint: function(e, f, a, h, g) {
        return h * ((f = f / g - 1) * f * f * f * f + 1) + a
    },
    easeInOutQuint: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f * f * f + a
        }
        return h / 2 * ((f -= 2) * f * f * f * f + 2) + a
    },
    easeInSine: function(e, f, a, h, g) {
        return -h * Math.cos(f / g * (Math.PI / 2)) + h + a
    },
    easeOutSine: function(e, f, a, h, g) {
        return h * Math.sin(f / g * (Math.PI / 2)) + a
    },
    easeInOutSine: function(e, f, a, h, g) {
        return -h / 2 * (Math.cos(Math.PI * f / g) - 1) + a
    },
    easeInExpo: function(e, f, a, h, g) {
        return (f == 0) ? a : h * Math.pow(2, 10 * (f / g - 1)) + a
    },
    easeOutExpo: function(e, f, a, h, g) {
        return (f == g) ? a + h : h * (-Math.pow(2, -10 * f / g) + 1) + a
    },
    easeInOutExpo: function(e, f, a, h, g) {
        if (f == 0) {
            return a
        }
        if (f == g) {
            return a + h
        }
        if ((f /= g / 2) < 1) {
            return h / 2 * Math.pow(2, 10 * (f - 1)) + a
        }
        return h / 2 * (-Math.pow(2, -10 * --f) + 2) + a
    },
    easeInCirc: function(e, f, a, h, g) {
        return -h * (Math.sqrt(1 - (f /= g) * f) - 1) + a
    },
    easeOutCirc: function(e, f, a, h, g) {
        return h * Math.sqrt(1 - (f = f / g - 1) * f) + a
    },
    easeInOutCirc: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return -h / 2 * (Math.sqrt(1 - f * f) - 1) + a
        }
        return h / 2 * (Math.sqrt(1 - (f -= 2) * f) + 1) + a
    },
    easeInElastic: function(f, h, e, l, k) {
        var i = 1.70158;
        var j = 0;
        var g = l;
        if (h == 0) {
            return e
        }
        if ((h /= k) == 1) {
            return e + l
        }
        if (!j) {
            j = k * 0.3
        }
        if (g < Math.abs(l)) {
            g = l;
            var i = j / 4
        } else {
            var i = j / (2 * Math.PI) * Math.asin(l / g)
        }
        return -(g * Math.pow(2, 10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j)) + e
    },
    easeOutElastic: function(f, h, e, l, k) {
        var i = 1.70158;
        var j = 0;
        var g = l;
        if (h == 0) {
            return e
        }
        if ((h /= k) == 1) {
            return e + l
        }
        if (!j) {
            j = k * 0.3
        }
        if (g < Math.abs(l)) {
            g = l;
            var i = j / 4
        } else {
            var i = j / (2 * Math.PI) * Math.asin(l / g)
        }
        return g * Math.pow(2, -10 * h) * Math.sin((h * k - i) * (2 * Math.PI) / j) + l + e
    },
    easeInOutElastic: function(f, h, e, l, k) {
        var i = 1.70158;
        var j = 0;
        var g = l;
        if (h == 0) {
            return e
        }
        if ((h /= k / 2) == 2) {
            return e + l
        }
        if (!j) {
            j = k * (0.3 * 1.5)
        }
        if (g < Math.abs(l)) {
            g = l;
            var i = j / 4
        } else {
            var i = j / (2 * Math.PI) * Math.asin(l / g)
        }
        if (h < 1) {
            return -0.5 * (g * Math.pow(2, 10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j)) + e
        }
        return g * Math.pow(2, -10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j) * 0.5 + l + e
    },
    easeInBack: function(e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        return i * (f /= h) * f * ((g + 1) * f - g) + a
    },
    easeOutBack: function(e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        return i * ((f = f / h - 1) * f * ((g + 1) * f + g) + 1) + a
    },
    easeInOutBack: function(e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        if ((f /= h / 2) < 1) {
            return i / 2 * (f * f * (((g *= (1.525)) + 1) * f - g)) + a
        }
        return i / 2 * ((f -= 2) * f * (((g *= (1.525)) + 1) * f + g) + 2) + a
    },
    easeInBounce: function(e, f, a, h, g) {
        return h - jQuery.easing.easeOutBounce(e, g - f, 0, h, g) + a
    },
    easeOutBounce: function(e, f, a, h, g) {
        if ((f /= g) < (1 / 2.75)) {
            return h * (7.5625 * f * f) + a
        } else {
            if (f < (2 / 2.75)) {
                return h * (7.5625 * (f -= (1.5 / 2.75)) * f + 0.75) + a
            } else {
                if (f < (2.5 / 2.75)) {
                    return h * (7.5625 * (f -= (2.25 / 2.75)) * f + 0.9375) + a
                } else {
                    return h * (7.5625 * (f -= (2.625 / 2.75)) * f + 0.984375) + a
                }
            }
        }
    },
    easeInOutBounce: function(e, f, a, h, g) {
        if (f < g / 2) {
            return jQuery.easing.easeInBounce(e, f * 2, 0, h, g) * 0.5 + a
        }
        return jQuery.easing.easeOutBounce(e, f * 2 - g, 0, h, g) * 0.5 + h * 0.5 + a
    }
});
(function(f) {
    var e = "bgPos";
    var d = !!f.Tween;
    if (d) {
        f.Tween.propHooks.backgroundPosition = {
            get: function(g) {
                return b(f(g.elem).css(g.prop))
            },
            set: function(g) {
                c(g)
            }
        }
    } else {
        f.fx.step.backgroundPosition = c
    }

    function b(j) {
        var i = (j || "").split(/ /);
        var h = {
            center: "50%",
            left: "0%",
            right: "100%",
            top: "0%",
            bottom: "100%"
        };
        var g = function(l) {
            var k = (h[i[l]] || i[l] || "50%").match(/^([+-]=)?([+-]?\d+(\.\d*)?)(.*)$/);
            i[l] = [k[1], parseFloat(k[2]), k[4] || "px"]
        };
        if (i.length == 1 && f.inArray(i[0], ["top", "bottom"]) > -1) {
            i[1] = i[0];
            i[0] = "50%"
        }
        g(0);
        g(1);
        return i
    }

    function c(g) {
        if (!g.set) {
            a(g)
        }
        f(g.elem).css("background-position", ((g.pos * (g.end[0][1] - g.start[0][1]) + g.start[0][1]) + g.end[0][2]) + " " + ((g.pos * (g.end[1][1] - g.start[1][1]) + g.start[1][1]) + g.end[1][2]))
    }

    function a(h) {
        var g = f(h.elem);
        var k = g.data(e);
        g.css("backgroundPosition", k);
        h.start = b(k);
        h.end = b(f.fn.jquery >= "1.6" ? h.end : h.options.curAnim.backgroundPosition || h.options.curAnim["background-position"]);
        for (var j = 0; j < h.end.length; j++) {
            if (h.end[j][0]) {
                h.end[j][1] = h.start[j][1] + (h.end[j][0] == "-=" ? -1 : +1) * h.end[j][1]
            }
        }
        h.set = true
    }
    f.fn.animate = function(g) {
        return function(i, h, k, j) {
            if (i.backgroundPosition || i["background-position"]) {
                this.data(e, this.css("backgroundPosition") || "left top")
            }
            return g.apply(this, [i, h, k, j])
        }
    }(f.fn.animate)
})(jQuery);
(function(j, o, r) {
    var q = "hashchange",
        l = document,
        n, m = j.event.special,
        k = l.documentMode,
        p = "on" + q in o && (k === r || k > 7);

    function s(a) {
        a = a || location.href;
        return "#" + a.replace(/^[^#]*#?(.*)$/, "$1")
    }
    j.fn[q] = function(a) {
        return a ? this.bind(q, a) : this.trigger(q)
    };
    j.fn[q].delay = 50;
    m[q] = j.extend(m[q], {
        setup: function() {
            if (p) {
                return false
            }
            j(n.start)
        },
        teardown: function() {
            if (p) {
                return false
            }
            j(n.stop)
        }
    });
    n = (function() {
        var d = {},
            e, a = s(),
            c = function(h) {
                return h
            },
            b = c,
            f = c;
        d.start = function() {
            e || g()
        };
        d.stop = function() {
            e && clearTimeout(e);
            e = r
        };

        function g() {
            var h = s(),
                i = f(a);
            if (h !== a) {
                b(a = h, i);
                j(o).trigger(q)
            } else {
                if (i !== a) {
                    location.href = location.href.replace(/#.*/, "") + i
                }
            }
            e = setTimeout(g, j.fn[q].delay)
        }
        j.browser.msie && !p && (function() {
            var i, h;
            d.start = function() {
                if (!i) {
                    h = j.fn[q].src;
                    h = h && h + s();
                    i = j('<iframe tabindex="-1" title="empty"/>').hide().one("load", function() {
                        h || b(s());
                        g()
                    }).attr("src", h || "javascript:0").insertAfter("body")[0].contentWindow;
                    l.onpropertychange = function() {
                        try {
                            if (event.propertyName === "title") {
                                i.document.title = l.title
                            }
                        } catch (t) {}
                    }
                }
            };
            d.stop = c;
            f = function() {
                return s(i.location.href)
            };
            b = function(w, z) {
                var x = i.document,
                    y = j.fn[q].domain;
                if (w !== z) {
                    x.title = l.title;
                    x.open();
                    y && x.write('<script>document.domain="' + y + '"<\/script>');
                    x.close();
                    i.location.hash = w
                }
            }
        })();
        return d
    })()
})(jQuery, this);
$(document).ajaxSend(function(c, d, b) {
    var a = $("meta[name=csrf-token]");
    if (a) {
        d.setRequestHeader("X-App-Key", a.attr("content"))
    }
});
(function(a) {
    a.fn.jrumble = function(c) {
        var b = a.extend({
            x: 2,
            y: 2,
            rotation: 1,
            speed: 15,
            opacity: false,
            opacityMin: 0.5
        }, c);
        return this.each(function() {
            var x = a(this),
                v = b.x * 2,
                u = b.y * 2,
                s = b.rotation * 2,
                w = b.speed === 0 ? 1 : b.speed,
                q = b.opacity,
                f = b.opacityMin,
                r, t, e = function() {
                    var h = Math.floor(Math.random() * (v + 1)) - v / 2,
                        g = Math.floor(Math.random() * (u + 1)) - u / 2,
                        j = Math.floor(Math.random() * (s + 1)) - s / 2,
                        i = q ? Math.random() + f : 1,
                        h = h === 0 && v !== 0 ? Math.random() < 0.5 ? 1 : -1 : h,
                        g = g === 0 && u !== 0 ? Math.random() < 0.5 ? 1 : -1 : g;
                    x.css("display") === "inline" && (r = true, x.css("display", "inline-block"));
                    x.css({
                        position: "relative",
                        left: h + "px",
                        top: g + "px",
                        "-ms-filter": "progid:DXImageTransform.Microsoft.Alpha(Opacity=" + i * 100 + ")",
                        filter: "alpha(opacity=" + i * 100 + ")",
                        "-moz-opacity": i,
                        "-khtml-opacity": i,
                        opacity: i,
                        "-webkit-transform": "rotate(" + j + "deg)",
                        "-moz-transform": "rotate(" + j + "deg)",
                        "-ms-transform": "rotate(" + j + "deg)",
                        "-o-transform": "rotate(" + j + "deg)",
                        transform: "rotate(" + j + "deg)"
                    })
                },
                d = {
                    left: 0,
                    top: 0,
                    "-ms-filter": "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)",
                    filter: "alpha(opacity=100)",
                    "-moz-opacity": 1,
                    "-khtml-opacity": 1,
                    opacity: 1,
                    "-webkit-transform": "rotate(0deg)",
                    "-moz-transform": "rotate(0deg)",
                    "-ms-transform": "rotate(0deg)",
                    "-o-transform": "rotate(0deg)",
                    transform: "rotate(0deg)"
                };
            x.bind({
                startRumble: function(g) {
                    g.stopPropagation();
                    clearInterval(t);
                    t = setInterval(e, w)
                },
                stopRumble: function(g) {
                    g.stopPropagation();
                    clearInterval(t);
                    r && x.css("display", "inline");
                    x.css(d)
                }
            })
        })
    }
})(jQuery);
var Overlay = (function() {
    return {
        show: function() {
            var b = this.getPageSize();
            var a = $("#overlay");
            a.css("display", "block");
            a.css("height", "100%");
            a.css("zIndex", "9000");
            $("object,embed").hide()
        },
        center: function(c) {
            var b = this.getPageSize();
            var a = 0,
                d = 0;
            a = Math.round(b[2] / 2) - Math.round(c.width() / 2);
            if (a < 0) {
                a = 0
            }
            d = $(window).scrollTop() + (Math.round(b[3] / 2) - Math.round(c.height() / 2));
            if (d < 0) {
                d = 0
            }
            c.css("left", a + "px");
            c.css("top", d + "px")
        },
        hide: function() {
            var a = $("#overlay");
            a.css("zIndex", "9000");
            a.css("display", "none");
            $("object,embed").show()
        },
        showDialogOnOverlay: function(a) {
            this.show();
            this.center(a);
            a.css("top", "80px");
            a.show()
        },
        getPageSize: function() {
            return [$(document).width(), $(document).height(), $(window).width(), $(window).height()]
        }
    }
})();
var ChangePassword = (function() {
    return {
        init: function() {
            if ($("#forgot-password").length) {
                $("#forgot-password").click(function(a) {
                    a.preventDefault();
                    ChangePassword.showForgotPasswordForm()
                })
            }
            if ($("#forgot-password-localization-link").length) {
                $("#forgot-password-localization-link").click(function(a) {
                    a.preventDefault();
                    ChangePassword.showForgotPasswordForm()
                })
            }
        },
        showChangeEmailPasswordSentNotice: function(a) {
            Overlay.showDialogOnOverlay($("#change-password-form"));
            $("#change-password-email-address").val(a);
            $("#email-sent-container").html(a);
            $("#change-password-email-sent-notice").show();
            $("#change-password-success-button").click(function() {
                $("#change-password-email-sent-notice").hide();
                $("#change-password-form").hide();
                Overlay.hide()
            });
            $("#change-password-change-link").click(function() {
                $("#change-password-email-sent-notice").hide();
                ChangePassword.showForgotPasswordForm()
            })
        },
        showForgotPasswordForm: function() {
            Overlay.showDialogOnOverlay($("#change-password-form"));
            var a = $("#change-password-email-address");
            $("#change-password-form-content").show();
            if ($("#credentials-email").length) {
                if ($("#credentials-email").val().length > 0) {
                    a.val($("#login-username").val())
                }
            }
            $("#change-password-submit-button").click(b);

            function b() {
                if (ChangePassword.isValidEmailAddress()) {
                    $("#forgotten-pw-form").submit();
                    b = $.noop
                } else {
                    a.addClass("error");
                    $("#change-password-error-container").show();
                    a.focus()
                }
            }
            $("#change-password-cancel-link").click(function() {
                $("#change-password-form-content").hide();
                $("#change-password-form").hide();
                Overlay.hide()
            });
            a.focus()
        },
        isValidEmailAddress: function() {
            var a = $("#change-password-email-address").val();
            return a.length > 0 && a.length <= 48
        },
        showForgotPasswordFormWithEmail: function(a) {
            this.showForgotPasswordForm();
            $("#change-password-email-address").val(a)
        }
    }
})();
var RecaptchaUtil = (function() {
    return {
        showRecaptcha: function(b, c) {
            var a = {
                theme: "custom",
                custom_theme_widget: b
            };
            Recaptcha.destroy();
            this.generateRecaptcha();
            Recaptcha.create(c, b, a)
        },
        reloadRecaptcha: function() {
            this.generateRecaptcha();
            Recaptcha.reload()
        },
        generateRecaptcha: function() {
            $.post("/captcha/generate")
        }
    }
})();
var Registration = (function() {
    var b = {};
    var n;
    var m = false;
    var l;
    var g = false;
    var j = {
        registration_captcha: $("#recaptcha_response_field"),
        registration_birthday: $("#registration-birthday"),
        registration_birthday_format: $("#registration-birthday"),
        registration_termsofservice: $("#registration-tos"),
        registration_cookiepolicy: $("#registration-cookies"),
        registration_password: $("#registration-password"),
        registration_email: $("#registration-email"),
        registration_parent_email: $("#parent-email")
    };

    function c(r, t, q) {
        if (typeof r == "string") {
            $("#registration-form").replaceWith(r);
            $("#registration-form").css({
                visibility: "visible"
            })
        } else {
            $("#registration-form .field-error").remove();
            $("#registration-form .error").removeClass("error");
            $("#registration-form-main .details span").remove();
            for (var s in b) {
                b[s].cancel()
            }
            if (r.registrationErrors) {
                n = r.registrationErrors.empty_field_error_message;
                o();
                $.each(r.registrationErrors, function(u, v) {
                    k(u, v)
                })
            }
            if (r.registrationMessages) {
                $.each(r.registrationMessages, function(u, v) {
                    f(u, v)
                })
            }
            if (r.registrationCompletionRedirectUrl) {
                window.location = r.registrationCompletionRedirectUrl
            }
        }
    }

    function k(q, r) {
        if (typeof(j[q]) != "undefined") {
            j[q].trigger("startRumble");
            b[j[q].attr("id")] = [2];
            b[j[q].attr("id")] = new p(j[q]);
            j[q].attr("placeholder", n);
            if ((q == "registration_termsofservice") || (q == "registration_cookiepolicy")) {
                j[q].before('<div class="field-error">' + r + "</div>")
            } else {
                j[q].parent().children(".details").append("<span> " + r + "</span>")
            }
            j[q].addClass("error");
            if (q == "registration_captcha") {
                RecaptchaUtil.reloadRecaptcha();
                $("#captcha-overlay").addClass("error");
                i()
            } else {
                if (q == "registration_parent_email") {
                    h()
                }
            }
            if (j[q].is("input")) {
                j[q].focus()
            }
        }
    }

    function p(s) {
        $(s).jrumble({
            speed: 40,
            x: 1,
            y: 1,
            rotation: 1
        });
        this.ids = [2];
        this.elem = s;
        var r = this;
        var q = 0;
        var t = function(u) {
            if (q >= 1) {
                r.cancel();
                return
            }
            u.trigger("startRumble");
            r.ids[0] = setTimeout(function() {
                u.trigger("stopRumble");
                r.ids[1] = setTimeout(function() {
                    t(u)
                }, 1300)
            }, 800);
            q++
        };
        s.trigger("startRumble");
        t(s);
        return this
    }
    p.prototype.cancel = function() {
        clearTimeout(this.ids[0]);
        clearTimeout(this.ids[1]);
        this.elem.trigger("stopRumble")
    };

    function f(q, r) {
        if (q == "registration.captcha_required" && r == "true") {
            i()
        }
    }

    function i() {
        $("#registration-form").removeClass("hide-captcha");
        if ($("#registration-form-main-right #password-field-container").length) {
            $("#password-field-container").appendTo($("#registration-form-main-left"))
        } else {
            RecaptchaUtil.reloadRecaptcha()
        }
    }

    function a(q, s, r) {}

    function e() {}

    function o() {
        m = false;
        $(".register-submit").removeClass("dimmed")
    }

    function h() {
        $("#registration-form-main-left").hide();
        $("#registration-form-main-right").hide();
        $("#parent-email-container").show()
    }
    return {
        init: function() {
            $("#registration-birthday select").change(function() {
                $("#registration-birthday").removeClass("error")
            });
            $("#registration-form input").keypress(function() {
                $(this).removeClass("error")
            });
            $("#registration-form input").change(function() {
                $(this).removeClass("error")
            })
        },
        stopRumbling: function(q) {
            var s = q.attr("id");
            if (s == "tos" || s == "cookies") {
                s = "registration-" + s
            }
            var r = b[s];
            if (!r) {
                return
            }
            b[s].cancel()
        },
        stopRumbles: function d() {
            for (var q in b) {
                b[q].cancel()
            }
        },
        submit: function(q) {
            if (!m) {
                m = true;
                $(".register-submit").addClass("dimmed");
                $.post("../../register_confirm.php", $("#register-new-user").serialize()).done(c).fail(a).always(e)
            }
            q.preventDefault();
            return false
        },
        setRecaptchaKey: function(q) {
            l = q
        },
        setCaptchaLoaded: function() {
            g = true
        },
        onWillBecomeActive: function() {
            if (!g) {
                RecaptchaUtil.showRecaptcha("captcha-container", l);
                g = true
            }
        },
        onBecomeActive: function() {
            $("#registration-email").focus();
            $("#content").removeClass("login-error");
            $("header").removeClass("login-error");
            $("#login-errors").hide();
            $.post("/registration/start");
            if ($("#captcha-placeholder").length) {
                $("#login-recaptcha-left").appendTo($("#captcha-placeholder"));
                $("header form").removeClass("captcha")
            }
        }
    }
})();
var EuCookiePolicy = (function() {
    return {
        init: function() {
            var a = Cookie.get("habbocpolicy");
            if (a == null) {
                $("#eu_cookie_policy").show();
                $("#eu_cookie_policy_close").click(function() {
                    Cookie.set("habbocpolicy", "hidden");
                    $("#eu_cookie_policy").hide()
                })
            }
        }
    }
})();
$(document).ready(function() {
    $("#tell-me-more-link").toggle(Carousel.showTellMeMore, Carousel.hideTellMeMore);
    $("#carousel #image2, #carousel #image3").css("transition", "top 0.4s ease-in");
    $("#credentials-submit").click(function(a) {
        $("#credentials-submit").closest("form").submit();
        a.preventDefault()
    });
    $(document).on("click", ".recaptcha-reload", function(a) {
        a.preventDefault();
        RecaptchaUtil.reloadRecaptcha()
    });
    $(".register-submit").click(Registration.submit);
    $("#registration-form-main input").click(function() {
        Registration.stopRumbles()
    });
    $("#registration-form-main input").keypress(function() {
        Registration.stopRumbles();
        $(this).attr("placeholder", "")
    });
    $("#registration-birthday").children().focus(function() {
        Registration.stopRumbles();
        $(this).attr("placeholder", "")
    });
    $("#registration-birthday").click(function() {
        Registration.stopRumbling($(this))
    });
    Registration.init();
    while (habboPageInitQueue.length > 0) {
        (habboPageInitQueue.shift())()
    }
    if ($("#credentials-email").val().length > 0) {
        $("#credentials-password").focus()
    }
    if (location.hash == "#registration") {
        LandingPage.scrollToRegistration(true)
    }
    $(window).hashchange(function() {
        if (location.hash == "#registration") {
            LandingPage.scrollToRegistration()
        } else {
            if (location.hash == "#home" || location.hash == "") {
                LandingPage.scrollToTop()
            }
        }
    })
});
var AnimationHelper = (function() {
    var b = 500;
    var a = "webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd transitionend";
    return {
        animate: function(d, e, f, c) {
            if (!c) {
                c = b
            }
            if (Modernizr.csstransitions) {
                d.css("transition", "all " + c + "ms ease-in-out");
                d.css(e);
                if ($.isFunction(f)) {
                    d.bind(a, function() {
                        d.unbind(a);
                        f()
                    })
                }
            } else {
                if ($.isFunction(f)) {
                    d.animate(e, {
                        duration: c,
                        easing: "easeInOutQuart",
                        queue: false,
                        complete: f
                    })
                } else {
                    d.animate(e, {
                        duration: c,
                        easing: "easeInOutQuart",
                        queue: false
                    })
                }
            }
        }
    }
})();
var Carousel = (function() {
    return {
        showTellMeMore: function(a) {
            AnimationHelper.animate($("#carousel #image2"), {
                top: "220px"
            }, null, 400);
            AnimationHelper.animate($("#carousel #image3"), {
                top: "-220px"
            }, function() {
                $("#tell-me-more").fadeIn()
            }, 400);
            a.preventDefault()
        },
        hideTellMeMore: function(a) {
            $("#tell-me-more").fadeOut();
            AnimationHelper.animate($("#carousel #image2"), {
                top: "6px"
            }, null, 400);
            AnimationHelper.animate($("#carousel #image3"), {
                top: "6px"
            }, null, 400);
            a.preventDefault()
        }
    }
})();
var LandingPage = (function() {
    var f = 950;
    var d = 650;
    var b = 1450;
    var a = {
        "login-username": "credentials-email",
        "login-password": "credentials-password"
    };
    var c = 1;

    function e() {
        $("#credentials-email").focus();
        if ($("#captcha-placeholder").length) {
            $("#recaptcha_response_field").removeClass("error");
            $("#login-recaptcha-left").appendTo($("#login-recaptcha"));
            $("header form").addClass("captcha")
        }
        $("#registration-form").css({
            visibility: "hidden"
        })
    }
    return {
        focusForced: false,
        fieldFocus: function(g) {
            var h;
            if ($("#" + g).length) {
                h = $("#" + g)
            } else {
                h = $("#" + a[g])
            }
            if (h.length) {
                if (g != "login-username") {
                    h.focus();
                    h.val("");
                    h.addClass("focus")
                }
            }
        },
        scrollToRegistration: function(h) {
            c = 1;
            var g = [f, d, b];
            if (h) {
                g = [f / 10, d / 10, b / 10]
            }
            AnimationHelper.animate($("header form"), {
                opacity: 0
            }, null, g[0]);
            AnimationHelper.animate($("ul"), {
                "background-color": "rgba(10,51,68,1)"
            }, null, g[2]);
            AnimationHelper.animate($("footer"), {
                bottom: "0px"
            }, function() {
                AnimationHelper.animate($("footer"), {
                    bottom: "-130px"
                }, null, 1000)
            }, 400);
            AnimationHelper.animate($("#home-anchor"), {
                top: "-2000px",
                "background-position": "475px -1200px"
            }, null, g[1]);
            AnimationHelper.animate($("#registration-anchor"), {
                top: 0,
                "background-position": "800px 124px"
            }, function() {
                if (c == 1) {
                    Registration.onBecomeActive()
                }
            }, g[2]);
            AnimationHelper.animate($("#floaters"), {
                top: "1500px"
            }, null, g[1]);
            AnimationHelper.animate($("#sail"), {
                top: "21px"
            }, null, g[2]);
            AnimationHelper.animate($("#baggage"), {
                top: "550px"
            }, null, g[2]);
            $("#registration-form").css({
                visibility: "visible"
            });
            Registration.onWillBecomeActive()
        },
        scrollToTop: function() {
            c = 0;
            AnimationHelper.animate($("ul"), {
                "background-color": "rgba(10,51,68,0)"
            }, null, f);
            AnimationHelper.animate($("header form"), {
                opacity: 1
            }, null, f);
            AnimationHelper.animate($("#home-anchor"), {
                top: 0,
                "background-position": "475px 0"
            }, function() {
                if (c == 0) {
                    e()
                }
            }, b);
            AnimationHelper.animate($("footer"), {
                bottom: "0px"
            }, function() {
                AnimationHelper.animate($("footer"), {
                    bottom: "-30px"
                }, null, 400)
            }, 800);
            AnimationHelper.animate($("#registration-anchor"), {
                top: "2000px",
                "background-position": "676px 1200px"
            }, null, d);
            AnimationHelper.animate($("#floaters"), {
                top: "888px"
            }, null, d);
            AnimationHelper.animate($("#sail"), {
                top: "1500px"
            }, null, b);
            AnimationHelper.animate($("#baggage"), {
                top: "1100px"
            }, null, b)
        }
    }
})();

function fullscreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}

function back() {
    window.history.back();
}