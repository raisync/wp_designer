/**
 * Time-To jQuery plug-in
 * Show countdown timer or realtime clock
 *
 * @author Alexey Teterin <altmoc@gmail.com>
 * @version 1.2.0
 * @license MIT http://opensource.org/licenses/MIT
 * @date 2016-11-02
 */
! function(t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}(function(t) {
    function e(e, a) {
        var o, l, d, r, c, u, h, p, f, m = this.data(),
            y = this.find("ul"),
            g = !1;
        if (m.vals && 0 !== y.length) {
            for (e || (e = m.seconds), m.intervalId && (g = !0, clearTimeout(m.intervalId)), o = Math.floor(e / s), l = o * s, d = Math.floor((e - l) / n), l += d * n, r = Math.floor((e - l) / 60), l += 60 * r, c = e - l, u = (o < 100 ? "0" + (o < 10 ? "0" : "") : "") + o + (d < 10 ? "0" : "") + d + (r < 10 ? "0" : "") + r + (c < 10 ? "0" : "") + c, h = m.vals.length - 1, p = u.length - 1; h >= 0; h -= 1, p -= 1) f = parseInt(u.substr(p, 1), 10), m.vals[h] = f, y.eq(h).children().html(f);
            (g || a) && (m.ttStartTime = t.now(), m.intervalId = setTimeout(i.bind(this), 1e3), this.data("intervalId", m.intervalId))
        }
    }

    function i(e) {
        var s, n, a, o, l, d, r = this,
            c = this.find("ul"),
            u = this.data();
        return u.vals && 0 !== c.length ? ("undefined" == typeof e && (e = u.iSec), s = u.vals[e], n = c.eq(e), a = n.children(), o = u.countdown ? -1 : 1, a.eq(1).html(s), s += o, e === u.iSec && (l = u.tickTimeout, d = t.now() - u.ttStartTime, u.sec += o, l += Math.abs(u.seconds - u.sec) * l - d, u.intervalId = setTimeout(i.bind(this), l)), (s < 0 || s > u.limits[e]) && (s < 0 ? (s = u.limits[e], e === u.iHour && u.displayDays > 0 && e > 0 && 0 === u.vals[e - 1] && (s = 3)) : s = 0, e > 0 && i.call(this, e - 1)), a.eq(0).html(s), t.support.transition ? (n.addClass("transition"), n.css({
            top: 0
        }), setTimeout(function() {
            n.removeClass("transition"), a.eq(1).html(s), n.css({
                top: "-" + u.height + "px"
            }), o > 0 || e !== u.iSec || (u.sec === u.countdownAlertLimit && c.parent().addClass("timeTo-alert"), 0 === u.sec && (c.parent().removeClass("timeTo-alert"), u.intervalId && (clearTimeout(u.intervalId), r.data("intervalId", null)), "function" == typeof u.callback && u.callback()))
        }, 410)) : n.stop().animate({
            top: 0
        }, 400, e !== u.iSec ? null : function() {
            a.eq(1).html(s), n.css({
                top: "-" + u.height + "px"
            }), o > 0 || e !== u.iSec || (u.sec === u.countdownAlertLimit ? c.parent().addClass("timeTo-alert") : 0 === u.sec && (c.parent().removeClass("timeTo-alert"), u.intervalId && (clearTimeout(u.intervalId), r.data("intervalId", null)), "function" == typeof u.callback && u.callback()))
        }), void(u.vals[e] = s)) : (u.intervalId && (clearTimeout(u.intervalId), this.data("intervalId", null)), void(u.callback && u.callback()))
    }
    var s = 86400,
        n = 3600,
        a = {
            callback: null,
            captionSize: 0,
            countdown: !0,
            countdownAlertLimit: 10,
            displayCaptions: !1,
            displayDays: 0,
            displayHours: !0,
            fontSize: 0,
            lang: "en",
            languages: {},
            seconds: 0,
            start: !0,
            theme: "white",
            width: 25,
            height: 15,
            gap: 8,
            vals: [0, 0, 0, 0, 0, 0, 0, 0, 0],
            limits: [9, 9, 9, 2, 9, 5, 9, 5, 9],
            iSec: 8,
            iHour: 4,
            tickTimeout: 1e3,
            intervalId: null
        },
        o = {
            start: function(s) {
                var n;
                s && (e.call(this, s), n = setTimeout(i.bind(this), 1e3), this.data("ttStartTime", t.now()), this.data("intervalId", n))
            },
            stop: function() {
                var t = this.data();
                return t.intervalId && (clearTimeout(t.intervalId), this.data("intervalId", null)), t
            },
            reset: function(t) {
                var i = o.stop.call(this),
                    s = "undefined" == typeof t ? i.seconds : t;
                this.find("div").css({
                    backgroundPosition: "left center"
                }), this.find("ul").parent().removeClass("timeTo-alert"), e.call(this, s, !0)
            }
        },
        l = {
            en: {
                days: "days",
                hours: "hours",
                min: "minutes",
                sec: "seconds"
            },
            ru: {
                days: "дней",
                hours: "часов",
                min: "минут",
                sec: "секунд"
            },
            ua: {
                days: "днiв",
                hours: "годин",
                min: "хвилин",
                sec: "секунд"
            },
            de: {
                days: "Tag",
                hours: "Uhr",
                min: "Minuten",
                sec: "Secunden"
            },
            fr: {
                days: "jours",
                hours: "heures",
                min: "minutes",
                sec: "secondes"
            },
            sp: {
                days: "días",
                hours: "horas",
                min: "minutos",
                sec: "segundos"
            },
            it: {
                days: "giorni",
                hours: "ore",
                min: "minuti",
                sec: "secondi"
            },
            nl: {
                days: "dagen",
                hours: "uren",
                min: "minuten",
                sec: "seconden"
            },
            no: {
                days: "dager",
                hours: "timer",
                min: "minutter",
                sec: "sekunder"
            },
            pt: {
                days: "dias",
                hours: "horas",
                min: "minutos",
                sec: "segundos"
            },
            tr: {
                days: "gün",
                hours: "saat",
                min: "dakika",
                sec: "saniye"
            }
        };
    return "undefined" == typeof t.support.transition && (t.support.transition = function() {
        var t = document.body || document.documentElement,
            e = t.style,
            i = void 0 !== e.transition || void 0 !== e.WebkitTransition || void 0 !== e.MozTransition || void 0 !== e.MsTransition || void 0 !== e.OTransition;
        return i
    }()), t.fn.timeTo = function() {
        var i, d, r, c, u, h, p, f, m, y, g = {},
            v = t.now();
        for (i = 0; i < arguments.length; i += 1) d = arguments[i], 0 === i && "string" == typeof d ? c = d : "object" == typeof d ? "function" == typeof d.getTime ? g.timeTo = d : g = t.extend(g, d) : "function" == typeof d ? g.callback = d : (r = parseInt(d, 10), isNaN(r) || (g.seconds = r));
        if (g.timeTo) g.timeTo.getTime ? u = g.timeTo.getTime() : "number" == typeof g.timeTo && (u = g.timeTo), u > v ? g.seconds = Math.floor((u - v) / 1e3) : g.seconds = 0;
        else if (g.time || !g.seconds)
            if (u = g.time, u || (u = new Date), "object" == typeof u && u.getTime) g.seconds = u.getHours() * n + 60 * u.getMinutes() + u.getSeconds(), g.countdown = !1;
            else if ("string" == typeof u) {
            for (p = u.split(":"), f = 0, m = 1; p.length;) y = p.pop(), f += y * m, m *= 60;
            g.seconds = f, g.countdown = !1
        }
        return g.countdown !== !1 && g.seconds > s && "undefined" == typeof g.displayDays ? (h = Math.floor(g.seconds / s), g.displayDays = h < 10 && 1 || h < 100 && 2 || 3) : g.displayDays === !0 ? g.displayDays = 3 : g.displayDays && (g.displayDays = g.displayDays > 0 ? Math.floor(g.displayDays) : 3), this.each(function() {
            var i, s, n, d, r, u, h, p, f, m, y, v, T, I, w, S, x, b, M, k, D, z, C = t(this),
                $ = C.data();
            if ($.intervalId && (clearInterval($.intervalId), $.intervalId = null), $.vals) "reset" !== c && t.extend($, g);
            else {
                if (s = $.opt ? $.options : g, i = Object.keys(a).reduce(function(t, e) {
                        return Array.isArray(a[e]) ? t[e] = a[e].slice(0) : t[e] = a[e], t
                    }, {}), $ = t.extend(i, s), $.options = s, $.height = Math.round(100 * $.fontSize / 93) || $.height, $.width = Math.round(.8 * $.fontSize + .13 * $.height) || $.width, $.displayHours = !(!$.displayDays && !$.displayHours), d = {
                        fontFamily: $.fontFamily
                    }, $.fontSize > 0 && (d.fontSize = $.fontSize + "px"), r = $.languages[$.lang] || l[$.lang], C.addClass("timeTo").addClass("timeTo-" + $.theme).css(d), u = Math.round($.height / 10), h = '<ul style="left:' + u + "px; top:-" + $.height + 'px"><li>0</li><li>0</li></ul></div>', p = $.fontSize ? ' style="width:' + $.width + "px; height:" + $.height + 'px;"' : ' style=""', f = '<div class="first"' + p + ">" + h, m = "<div" + p + ">" + h, y = "<span>:</span>", v = Math.round(2 * $.width + 3), T = $.captionSize || $.fontSize && Math.round(.43 * $.fontSize), I = T ? "font-size:" + T + "px;" : "", w = T ? ' style="' + I + '"' : "", S = ($.displayCaptions ? ($.displayHours ? '<figure style="max-width:' + v + 'px">$1<figcaption' + w + ">" + r.hours + "</figcaption></figure>" + y : "") + '<figure style="max-width:' + v + 'px">$1<figcaption' + w + ">" + r.min + "</figcaption></figure>" + y + '<figure style="max-width:' + v + 'px">$1<figcaption' + w + ">" + r.sec + "</figcaption></figure>" : ($.displayHours ? "$1" + y : "") + "$1" + y + "$1").replace(/\$1/g, f + m), $.displayDays > 0) {
                    for (x = .4 * $.fontSize || a.gap, b = f, n = $.displayDays - 1; n > 0; n -= 1) b += 1 === n ? m.replace('">', "margin-right:" + Math.round(x) + 'px">') : m;
                    S = ($.displayCaptions ? '<figure style="width:' + Math.round($.width * $.displayDays + x + 4) + 'px">$1<figcaption style="' + I + "padding-right:" + Math.round(x) + 'px">' + r.days + "</figcaption></figure>" : "$1").replace(/\$1/, b) + S
                }
                C.html(S)
            }
            if (M = C.find("div"), M.length < $.vals.length) {
                for (k = $.vals.length - M.length, D = $.vals, z = $.limits, $.vals = [], $.limits = [], n = 0; n < M.length; n += 1) $.vals[n] = D[k + n], $.limits[n] = z[k + n];
                $.iSec = $.vals.length - 1, $.iHour = $.vals.length - 5
            }
            $.sec = $.seconds, C.data($), c && o[c] ? o[c].call(C, $.seconds) : $.start ? o.start.call(C, $.seconds) : e.call(C, $.seconds)
        })
    }, t
});