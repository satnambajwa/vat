! function (n, e, m) {
	"use strict";
	m.app = m.app || {};
	var d = m("body"),
		u = m(n),
		l = m('div[data-menu="menu-wrapper"]').html(),
		r = m('div[data-menu="menu-wrapper"]').attr("class");
	m.app.menu = {
		expanded: null,
		collapsed: null,
		hidden: null,
		container: null,
		horizontalMenu: !1,
		manualScroller: {
			obj: null,
			init: function () {
				var e = m(".main-menu").hasClass("menu-dark") ? "light" : "dark";
				this.obj = m(".main-menu-content").perfectScrollbar({
					suppressScrollX: !0,
					theme: e
				})
			},
			update: function () {
				if (this.obj) {
					var e;
					if (!0 === m(".main-menu").data("scroll-to-active")) e = 0 < m(".main-menu-content").find("li.active").parents("li").length ? m(".main-menu-content").find("li.active").parents("li").last().position() : m(".main-menu-content").find("li.active").position(), setTimeout(function () {
						void 0 !== e && m.app.menu.container.stop().animate({
							scrollTop: e.top
						}, 300), m(".main-menu").data("scroll-to-active", "false")
					}, 300);
					m(".main-menu-content").perfectScrollbar("update")
				}
			},
			enable: function () {
				this.init()
			},
			disable: function () {
				this.obj && m(".main-menu-content").perfectScrollbar("destroy")
			},
			updateHeight: function () {
				"vertical-menu" != d.data("menu") && "vertical-menu-modern" != d.data("menu") && "vertical-overlay-menu" != d.data("menu") || !m(".main-menu").hasClass("menu-fixed") || (m(".main-menu-content").css("height", m(n).height() - m(".header-navbar").height() - m(".main-menu-header").outerHeight() - m(".main-menu-footer").outerHeight()), this.update())
			}
		},
		init: function (e) {
			if (0 < m(".main-menu-content").length) {
				this.container = m(".main-menu-content");
				var n = "";
				if (!0 === e && (n = "collapsed"), "vertical-menu-modern" == d.data("menu")) {
					var a = "";
					"undefined" != typeof Storage && (a = localStorage.getItem("menuLocked")), "false" === a ? this.change("collapsed") : this.change()
				} else this.change(n)
			} else this.drillDownMenu()
		},
		drillDownMenu: function (e) {
			m(".drilldown-menu").length && ("sm" == e || "xs" == e ? "true" == m("#navbar-mobile").attr("aria-expanded") && m(".drilldown-menu").slidingMenu({
				backLabel: !0
			}) : m(".drilldown-menu").slidingMenu({
				backLabel: !0
			}))
		},
		change: function (e) {
			var n = Unison.fetch.now();
			this.reset();
			var a, t, i = d.data("menu");
			if (n) switch (n.name) {
				case "xl":
				case "lg":
					"vertical-overlay-menu" === i ? this.hide() : "vertical-compact-menu" === i ? this.open() : "horizontal-menu" === i && "lg" == n.name ? this.collapse() : "collapsed" === e ? this.collapse(e) : this.expand();
					break;
				case "md":
					"vertical-overlay-menu" === i ? this.hide() : "vertical-compact-menu" === i ? this.open() : this.collapse();
					break;
				case "sm":
				case "xs":
					this.hide()
			}
			"vertical-menu" !== i && "vertical-compact-menu" !== i && "vertical-content-menu" !== i && "vertical-menu-modern" !== i || this.toOverlayMenu(n.name), d.is(".horizontal-layout") && !d.hasClass(".horizontal-menu-demo") && (this.changeMenu(n.name), m(".menu-toggle").removeClass("is-active")), "horizontal-menu" != i && this.drillDownMenu(n.name), "xl" == n.name && (m('body[data-open="hover"] .dropdown').off("mouseenter").on("mouseenter", function (e) {
				m(this).hasClass("show") ? m(this).removeClass("show") : m(this).addClass("show")
			}).off("mouseleave").on("mouseleave", function (e) {
				m(this).removeClass("show")
			}), m('body[data-open="hover"] .dropdown a').off("click").on("click", function (e) {
				if ("horizontal-menu" == i && m(this).hasClass("dropdown-toggle")) return !1
			})), m(".header-navbar").hasClass("navbar-brand-center") && m(".header-navbar").attr("data-nav", "brand-center"), "sm" == n.name || "xs" == n.name ? m(".header-navbar[data-nav=brand-center]").removeClass("navbar-brand-center") : m(".header-navbar[data-nav=brand-center]").addClass("navbar-brand-center"), m("ul.dropdown-menu [data-toggle=dropdown]").on("click", function (e) {
				0 < m(this).siblings("ul.dropdown-menu").length && e.preventDefault(), e.stopPropagation(), m(this).parent().siblings().removeClass("show"), m(this).parent().toggleClass("show")
			}), "horizontal-menu" == i && ("sm" == n.name || "xs" == n.name ? m(".menu-fixed").length && m(".menu-fixed").unstick() : m(".navbar-fixed").length && m(".navbar-fixed").sticky()), "vertical-menu" !== i && "vertical-overlay-menu" !== i && "vertical-content-menu" !== i || (jQuery.expr[":"].Contains = function (e, n, a) {
				return 0 <= (e.textContent || e.innerText || "").toUpperCase().indexOf(a[3].toUpperCase())
			}, a = m("#main-menu-navigation"), t = m(".menu-search"), m(t).change(function () {
				var e = m(this).val();
				if (e) {
					m(".navigation-header").hide(), m(a).find("li a:not(:Contains(" + e + "))").hide().parent().hide();
					var n = m(a).find("li a:Contains(" + e + ")");
					n.parent().hasClass("has-sub") ? (n.show().parents("li").show().addClass("open").closest("li").children("a").show().children("li").show(), 0 < n.siblings("ul").length && n.siblings("ul").children("li").show().children("a").show()) : n.show().parents("li").show().addClass("open").closest("li").children("a").show()
				} else m(".navigation-header").show(), m(a).find("li a").show().parent().show().removeClass("open");
				return m.app.menu.manualScroller.update(), !1
			}).keyup(function () {
				m(this).change()
			}))
		},
		transit: function (e, n) {
			var a = this;
			d.addClass("changing-menu"), e.call(a), d.hasClass("vertical-layout") && (d.hasClass("menu-open") || d.hasClass("menu-expanded") ? (m(".menu-toggle").addClass("is-active"), "vertical-menu" !== d.data("menu") && "vertical-content-menu" !== d.data("menu") || m(".main-menu-header") && m(".main-menu-header").show()) : (m(".menu-toggle").removeClass("is-active"), "vertical-menu" !== d.data("menu") && "vertical-content-menu" !== d.data("menu") || m(".main-menu-header") && m(".main-menu-header").hide())), setTimeout(function () {
				n.call(a), d.removeClass("changing-menu"), a.update()
			}, 500)
		},
		open: function () {
			this.transit(function () {
				d.removeClass("menu-hide menu-collapsed").addClass("menu-open"), this.hidden = !1, this.expanded = !0
			}, function () {
				!m(".main-menu").hasClass("menu-native-scroll") && m(".main-menu").hasClass("menu-fixed") && (this.manualScroller.enable(), m(".main-menu-content").css("height", m(n).height() - m(".header-navbar").height() - m(".main-menu-header").outerHeight() - m(".main-menu-footer").outerHeight()))
			})
		},
		hide: function () {
			this.transit(function () {
				d.removeClass("menu-open menu-expanded").addClass("menu-hide"), this.hidden = !0, this.expanded = !1
			}, function () {
				!m(".main-menu").hasClass("menu-native-scroll") && m(".main-menu").hasClass("menu-fixed") && this.manualScroller.enable()
			})
		},
		expand: function () {
			!1 === this.expanded && ("vertical-menu-modern" == d.data("menu") && (m(".modern-nav-toggle").find(".toggle-icon").removeClass("ft-toggle-left").addClass("ft-toggle-right"), "undefined" != typeof Storage && localStorage.setItem("menuLocked", "true")), this.transit(function () {
				d.removeClass("menu-collapsed").addClass("menu-expanded"), this.collapsed = !1, this.expanded = !0
			}, function () {
				m(".main-menu").hasClass("menu-native-scroll") || "horizontal-menu" == d.data("menu") ? this.manualScroller.disable() : m(".main-menu").hasClass("menu-fixed") && this.manualScroller.enable(), "vertical-menu" != d.data("menu") && "vertical-menu-modern" != d.data("menu") || !m(".main-menu").hasClass("menu-fixed") || m(".main-menu-content").css("height", m(n).height() - m(".header-navbar").height() - m(".main-menu-header").outerHeight() - m(".main-menu-footer").outerHeight())
			}))
		},
		collapse: function (e) {
			!1 === this.collapsed && ("vertical-menu-modern" == d.data("menu") && (m(".modern-nav-toggle").find(".toggle-icon").removeClass("ft-toggle-right").addClass("ft-toggle-left"), "undefined" != typeof Storage && localStorage.setItem("menuLocked", "false")), this.transit(function () {
				d.removeClass("menu-expanded").addClass("menu-collapsed"), this.collapsed = !0, this.expanded = !1
			}, function () {
				"vertical-content-menu" == d.data("menu") && this.manualScroller.disable(), "horizontal-menu" == d.data("menu") && d.hasClass("vertical-overlay-menu") && m(".main-menu").hasClass("menu-fixed") && this.manualScroller.enable(), "vertical-menu" != d.data("menu") && "vertical-menu-modern" != d.data("menu") || !m(".main-menu").hasClass("menu-fixed") || m(".main-menu-content").css("height", m(n).height() - m(".header-navbar").height()), "vertical-menu-modern" == d.data("menu") && m(".main-menu").hasClass("menu-fixed") && this.manualScroller.enable()
			}))
		},
		toOverlayMenu: function (e) {
			var n = d.data("menu");
			"sm" == e || "xs" == e ? (d.hasClass(n) && d.removeClass(n).addClass("vertical-overlay-menu"), "vertical-content-menu" == n && m(".main-menu").addClass("menu-fixed")) : (d.hasClass("vertical-overlay-menu") && d.removeClass("vertical-overlay-menu").addClass(n), "vertical-content-menu" == n && m(".main-menu").removeClass("menu-fixed"))
		},
		changeMenu: function (e) {
			m('div[data-menu="menu-wrapper"]').html(""), m('div[data-menu="menu-wrapper"]').html(l);
			var n = m('div[data-menu="menu-wrapper"]'),
				a = (m('div[data-menu="menu-container"]'), m('ul[data-menu="menu-navigation"]')),
				t = m('li[data-menu="megamenu"]'),
				i = m("li[data-mega-col]"),
				s = m('li[data-menu="dropdown"]'),
				o = m('li[data-menu="dropdown-submenu"]');
			"sm" == e || "xs" == e ? (d.removeClass(d.data("menu")).addClass("vertical-layout vertical-overlay-menu fixed-navbar"), m("nav.header-navbar").addClass("fixed-top"), n.removeClass().addClass("main-menu menu-light menu-fixed menu-shadow"), a.removeClass().addClass("navigation navigation-main"), t.removeClass("dropdown mega-dropdown").addClass("has-sub"), t.children("ul").removeClass(), i.each(function (e, n) {
				m(n).find(".mega-menu-sub").find("li").has("ul").addClass("has-sub");
				var a = m(n).children().first(),
					t = "";
				a.is("h6") && (t = a.html(), a.remove(), m(n).prepend('<a href="#">' + t + "</a>").addClass("has-sub mega-menu-title"))
			}), t.find("a").removeClass("dropdown-toggle"), t.find("a").removeClass("dropdown-item"), s.removeClass("dropdown").addClass("has-sub"), s.find("a").removeClass("dropdown-toggle nav-link"), s.children("ul").find("a").removeClass("dropdown-item"), s.find("ul").removeClass("dropdown-menu"), o.removeClass().addClass("has-sub"), m.app.nav.init(), m("ul.dropdown-menu [data-toggle=dropdown]").on("click", function (e) {
				e.preventDefault(), e.stopPropagation(), m(this).parent().siblings().removeClass("open"), m(this).parent().toggleClass("open")
			})) : (d.removeClass("vertical-layout vertical-overlay-menu fixed-navbar").addClass(d.data("menu")), m("nav.header-navbar").removeClass("fixed-top"), n.removeClass().addClass(r), this.drillDownMenu(e), m("a.dropdown-item.nav-has-children").on("click", function () {
				event.preventDefault(), event.stopPropagation()
			}), m("a.dropdown-item.nav-has-parent").on("click", function () {
				event.preventDefault(), event.stopPropagation()
			}))
		},
		toggle: function () {
			var e = Unison.fetch.now(),
				n = (this.collapsed, this.expanded),
				a = this.hidden,
				t = d.data("menu");
			switch (e.name) {
				case "xl":
				case "lg":
				case "md":
					!0 === n ? "vertical-compact-menu" == t || "vertical-overlay-menu" == t ? this.hide() : this.collapse() : "vertical-compact-menu" == t || "vertical-overlay-menu" == t ? this.open() : this.expand();
					break;
				case "sm":
				case "xs":
					!0 === a ? this.open() : this.hide()
			}
			this.drillDownMenu(e.name)
		},
		update: function () {
			this.manualScroller.update()
		},
		reset: function () {
			this.expanded = !1, this.collapsed = !1, this.hidden = !1, d.removeClass("menu-hide menu-open menu-collapsed menu-expanded")
		}
	}, m.app.nav = {
		container: m(".navigation-main"),
		initialized: !1,
		navItem: m(".navigation-main").find("li").not(".navigation-category"),
		config: {
			speed: 300
		},
		init: function (e) {
			this.initialized = !0, m.extend(this.config, e), this.bind_events()
		},
		bind_events: function () {
			var s = this;
			m(".navigation-main").on("mouseenter.app.menu", "li", function () {
				var e = m(this);
				if (m(".hover", ".navigation-main").removeClass("hover"), d.hasClass("menu-collapsed") && "vertical-menu-modern" != d.data("menu") || "vertical-compact-menu" == d.data("menu") && !d.hasClass("vertical-overlay-menu")) {
					m(".main-menu-content").children("span.menu-title").remove(), m(".main-menu-content").children("a.menu-title").remove(), m(".main-menu-content").children("ul.menu-content").remove();
					var n, a, t, i = e.find("span.menu-title").clone();
					if (e.hasClass("has-sub") || (n = e.find("span.menu-title").text(), a = e.children("a").attr("href"), "" !== n && ((i = m("<a>")).attr("href", a), i.attr("title", n), i.text(n), i.addClass("menu-title"))), t = e.css("border-top") ? e.position().top + parseInt(e.css("border-top"), 10) : e.position().top, "vertical-compact-menu" !== d.data("menu") && i.appendTo(".main-menu-content").css({
							position: "fixed",
							top: t
						}), e.hasClass("has-sub") && e.hasClass("nav-item")) {
						e.children("ul:first");
						s.adjustSubmenu(e)
					}
				}
				e.addClass("hover")
			}).on("mouseleave.app.menu", "li", function () {}).on("active.app.menu", "li", function (e) {
				m(this).addClass("active"), e.stopPropagation()
			}).on("deactive.app.menu", "li.active", function (e) {
				m(this).removeClass("active"), e.stopPropagation()
			}).on("open.app.menu", "li", function (e) {
				var n = m(this);
				if (n.addClass("open"), s.expand(n), m(".main-menu").hasClass("menu-collapsible")) return !1;
				n.siblings(".open").find("li.open").trigger("close.app.menu"), n.siblings(".open").trigger("close.app.menu"), e.stopPropagation()
			}).on("close.app.menu", "li.open", function (e) {
				var n = m(this);
				n.removeClass("open"), s.collapse(n), e.stopPropagation()
			}).on("click.app.menu", "li", function (e) {
				var n = m(this);
				n.is(".disabled") ? e.preventDefault() : d.hasClass("menu-collapsed") && "vertical-menu-modern" != d.data("menu") || "vertical-compact-menu" == d.data("menu") && n.is(".has-sub") && !d.hasClass("vertical-overlay-menu") ? e.preventDefault() : n.has("ul") ? n.is(".open") ? n.trigger("close.app.menu") : n.trigger("open.app.menu") : n.is(".active") || (n.siblings(".active").trigger("deactive.app.menu"), n.trigger("active.app.menu")), e.stopPropagation()
			}), m(".navbar-header, .main-menu").on("mouseenter", function () {
				if ("vertical-menu-modern" == d.data("menu") && (m(".main-menu, .navbar-header").addClass("expanded"), d.hasClass("menu-collapsed"))) {
					var e = m(".main-menu li.menu-collapsed-open"),
						n = e.children("ul");
					n.hide().slideDown(200, function () {
						m(this).css("display", "")
					}), e.addClass("open").removeClass("menu-collapsed-open")
				}
			}).on("mouseleave", function () {
				d.hasClass("menu-collapsed") && "vertical-menu-modern" == d.data("menu") && setTimeout(function () {
					if (0 === m(".main-menu:hover").length && 0 === m(".navbar-header:hover").length && (m(".main-menu, .navbar-header").removeClass("expanded"), d.hasClass("menu-collapsed"))) {
						var e = m(".main-menu li.open"),
							n = e.children("ul");
						e.addClass("menu-collapsed-open"), n.show().slideUp(200, function () {
							m(this).css("display", "")
						}), e.removeClass("open")
					}
				}, 1)
			}), m(".main-menu-content").on("mouseleave", function () {
				(d.hasClass("menu-collapsed") || "vertical-compact-menu" == d.data("menu")) && (m(".main-menu-content").children("span.menu-title").remove(), m(".main-menu-content").children("a.menu-title").remove(), m(".main-menu-content").children("ul.menu-content").remove()), m(".hover", ".navigation-main").removeClass("hover")
			}), m(".navigation-main li.has-sub > a").on("click", function (e) {
				e.preventDefault()
			}), m("ul.menu-content").on("click", "li", function (e) {
				var n = m(this);
				if (n.is(".disabled")) e.preventDefault();
				else if (n.has("ul"))
					if (n.is(".open")) n.removeClass("open"), s.collapse(n);
					else {
						if (n.addClass("open"), s.expand(n), m(".main-menu").hasClass("menu-collapsible")) return !1;
						n.siblings(".open").find("li.open").trigger("close.app.menu"), n.siblings(".open").trigger("close.app.menu"), e.stopPropagation()
					}
				else n.is(".active") || (n.siblings(".active").trigger("deactive.app.menu"), n.trigger("active.app.menu"));
				e.stopPropagation()
			})
		},
		adjustSubmenu: function (e) {
			var n, a, t, i, s, o, l = e.children("ul:first"),
				r = l.clone(!0);
			m(".main-menu-header").height(), n = e.position().top, t = u.height() - m(".header-navbar").height(), s = 0, l.height(), 0 < parseInt(e.css("border-top"), 10) && (s = parseInt(e.css("border-top"), 10)), i = t - n - e.height() - 30, o = m(".main-menu").hasClass("menu-dark") ? "light" : "dark", "vertical-compact-menu" === d.data("menu") ? (a = n + s, i = t - n - 30) : "vertical-content-menu" === d.data("menu") ? (a = n + e.height() + s, i = t - m(".content-header").height() - e.height() - n - 60) : a = n + e.height() + s, "vertical-content-menu" == d.data("menu") ? r.addClass("menu-popout").appendTo(".main-menu-content").css({
				top: a,
				position: "fixed"
			}) : (r.addClass("menu-popout").appendTo(".main-menu-content").css({
				top: a,
				position: "fixed",
				"max-height": i
			}), m(".main-menu-content > ul.menu-content").perfectScrollbar({
				theme: o
			}))
		},
		collapse: function (e, n) {
			e.children("ul").show().slideUp(m.app.nav.config.speed, function () {
				m(this).css("display", ""), m(this).find("> li").removeClass("is-shown"), n && n(), m.app.nav.container.trigger("collapsed.app.menu")
			})
		},
		expand: function (e, n) {
			var a = e.children("ul"),
				t = a.children("li").addClass("is-hidden");
			a.hide().slideDown(m.app.nav.config.speed, function () {
				m(this).css("display", ""), n && n(), m.app.nav.container.trigger("expanded.app.menu")
			}), setTimeout(function () {
				t.addClass("is-shown"), t.removeClass("is-hidden")
			}, 0)
		},
		refresh: function () {
			m.app.nav.container.find(".open").removeClass("open")
		}
	}
}(window, document, jQuery);