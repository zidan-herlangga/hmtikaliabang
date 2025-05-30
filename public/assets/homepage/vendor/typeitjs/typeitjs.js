// TypeIt by Alex MacArthur - https://typeitjs.com
!(function (e, t) {
  "object" == typeof exports && "undefined" != typeof module
    ? (module.exports = t())
    : "function" == typeof define && define.amd
    ? define(t)
    : ((e = "undefined" != typeof globalThis ? globalThis : e || self).TypeIt =
        t());
})(this, function () {
  "use strict";
  const e = (e) => Array.isArray(e),
    t = (t) => (e(t) ? t : [t]);
  const s = "data-typeit-id",
    i = "ti-cursor",
    r = { started: !1, completed: !1, frozen: !1, destroyed: !1 },
    n = {
      breakLines: !0,
      cursor: {
        autoPause: !0,
        autoPauseDelay: 500,
        animation: {
          frames: [0, 0, 1].map((e) => ({ opacity: e })),
          options: {
            iterations: 1 / 0,
            easing: "steps(2, start)",
            fill: "forwards",
          },
        },
      },
      cursorChar: "|",
      cursorSpeed: 1e3,
      deleteSpeed: null,
      html: !0,
      lifeLike: !0,
      loop: !1,
      loopDelay: 750,
      nextStringDelay: 750,
      speed: 100,
      startDelay: 250,
      startDelete: !1,
      strings: [],
      waitUntilVisible: !1,
      beforeString: () => {},
      afterString: () => {},
      beforeStep: () => {},
      afterStep: () => {},
      afterComplete: () => {},
    },
    o = `[${s}]:before {content: '.'; display: inline-block; width: 0; visibility: hidden;}`,
    a = (e) => document.createElement(e),
    u = (e) => document.createTextNode(e),
    l = (e, t = "") => {
      let s = a("style");
      (s.id = t), s.appendChild(u(e)), document.head.appendChild(s);
    },
    h = (t) => (e(t) || (t = [t / 2, t / 2]), t),
    d = (e, t) => Math.abs(Math.random() * (e + t - (e - t)) + (e - t));
  let p = (e) => e / 2;
  const c = (e) => Array.from(e);
  let m = (e) => (
    [...e.childNodes].forEach((e) => {
      if (e.nodeValue)
        return (
          [...e.nodeValue].forEach((t) => {
            e.parentNode.insertBefore(u(t), e);
          }),
          void e.remove()
        );
      m(e);
    }),
    e
  );
  const f = (e) => {
    let t = document.implementation.createHTMLDocument();
    return (t.body.innerHTML = e), m(t.body);
  };
  function y(e, t = !1, s = !1) {
    let r,
      n = e.querySelector(`.${i}`),
      o = document.createTreeWalker(e, NodeFilter.SHOW_ALL, {
        acceptNode: (e) => {
          if (n && s) {
            if (e.classList?.contains(i)) return NodeFilter.FILTER_ACCEPT;
            if (n.contains(e)) return NodeFilter.FILTER_REJECT;
          }
          return e.classList?.contains(i)
            ? NodeFilter.FILTER_REJECT
            : NodeFilter.FILTER_ACCEPT;
        },
      }),
      a = [];
    for (; (r = o.nextNode()); )
      r.originalParent || (r.originalParent = r.parentNode), a.push(r);
    return t ? a.reverse() : a;
  }
  function g(e, t = !0) {
    return t ? y(f(e)) : c(e).map(u);
  }
  const b = ({ index: e, newIndex: t, queueItems: s, cleanUp: i }) => {
      for (let r = e + 1; r < t + 1; r++) i(s[r][0]);
    },
    P = (e) => Number.isInteger(e),
    C = ({ queueItems: e, selector: t, cursorPosition: s, to: i }) => {
      if (P(t)) return -1 * t;
      let r = new RegExp("END", "i").test(i),
        n = t
          ? [...e].reverse().findIndex(({ char: e }) => {
              let s = e.parentElement,
                i = s.matches(t);
              return !(!r || !i) || (i && s.firstChild.isSameNode(e));
            })
          : -1;
      return n < 0 && (n = r ? 0 : e.length - 1), n - s + (r ? 0 : 1);
    },
    I = (e, t) => new Array(t).fill(e);
  let v = (e) =>
      new Promise((t) => {
        requestAnimationFrame(async () => {
          t(await e());
        });
      }),
    w = (e) => e?.getAnimations().find((t) => t.id === e.dataset.tiAnimationId),
    T = ({ cursor: e, frames: t, options: s }) => {
      let i = e.animate(t, s);
      return (
        i.pause(),
        (i.id = e.dataset.tiAnimationId),
        v(() => {
          v(() => {
            i.play();
          });
        }),
        i
      );
    },
    q = (e) => e.func?.call(null),
    S = async ({
      index: e,
      queueItems: t,
      wait: s,
      cursor: i,
      cursorOptions: r,
    }) => {
      let n = t[e][1],
        o = [],
        a = e,
        u = n,
        l = () => u && !u.delay,
        h = n.shouldPauseCursor() && r.autoPause;
      for (; l(); ) o.push(u), l() && a++, (u = t[a] ? t[a][1] : null);
      if (o.length)
        return (
          await v(async () => {
            for (let e of o) await q(e);
          }),
          a - 1
        );
      let d,
        p = w(i);
      return (
        p &&
          (d = {
            ...p.effect.getComputedTiming(),
            delay: h ? r.autoPauseDelay : 0,
          }),
        await s(async () => {
          p && h && p.cancel(),
            await v(() => {
              q(n);
            });
        }, n.delay),
        await (({ cursor: e, options: t, cursorOptions: s }) => {
          if (!e || !s) return;
          let i,
            r = w(e);
          r &&
            ((t.delay = r.effect.getComputedTiming().delay),
            (i = r.currentTime),
            r.cancel());
          let n = T({ cursor: e, frames: s.animation.frames, options: t });
          return i && (n.currentTime = i), n;
        })({ cursor: i, options: d, cursorOptions: r }),
        e
      );
    };
  const N = (e) => "value" in e;
  let A = (e) => ("function" == typeof e ? e() : e),
    E = (e, t = document, s = !1) => t["querySelector" + (s ? "All" : "")](e);
  const L = (e, t) => Object.assign({}, e, t);
  let x = {
    "font-family": "",
    "font-weight": "",
    "font-size": "",
    "font-style": "",
    "line-height": "",
    color: "",
    transform: "translateX(-.125em)",
  };
  return class {
    element;
    timeouts;
    cursorPosition;
    predictedCursorPosition;
    statuses = { started: !1, completed: !1, frozen: !1, destroyed: !1 };
    opts;
    id;
    queue;
    cursor;
    unfreeze = () => {};
    constructor(e, s = {}) {
      var i;
      (this.opts = L(n, s)),
        (this.element = "string" == typeof (i = e) ? E(i) : i),
        (this.timeouts = []),
        (this.cursorPosition = 0),
        (this.unfreeze = () => {}),
        (this.predictedCursorPosition = null),
        (this.statuses = L({}, r)),
        (this.id = Math.random().toString().substring(2, 9)),
        (this.queue = (function (e) {
          let s = function (e) {
              return (
                t(e).forEach((e) =>
                  n.set(Symbol(e.char?.innerText), i({ ...e }))
                ),
                this
              );
            },
            i = (e) => (
              (e.shouldPauseCursor = function () {
                return Boolean(
                  this.typeable || this.cursorable || this.deletable
                );
              }),
              e
            ),
            r = () => Array.from(n.values()),
            n = new Map();
          return (
            s(e),
            {
              add: s,
              set: function (e, t) {
                let s = [...n.keys()];
                n.set(s[e], i(t));
              },
              wipe: function () {
                (n = new Map()), s(e);
              },
              done: (e, t = !1) => (t ? n.delete(e) : (n.get(e).done = !0)),
              reset: function () {
                n.forEach((e) => delete e.done);
              },
              destroy: (e) => n.delete(e),
              getItems: (e = !1) => (e ? r() : r().filter((e) => !e.done)),
              getQueue: () => n,
              getTypeable: () => r().filter((e) => e.typeable),
            }
          );
        })([{ delay: this.opts.startDelay }])),
        this.#e(s),
        (this.cursor = this.#t()),
        (this.element.dataset.typeitId = this.id),
        l(o),
        this.opts.strings.length && this.#s();
    }
    go() {
      return this.statuses.started
        ? this
        : (this.#i(),
          this.opts.waitUntilVisible
            ? ((e = this.element),
              (t = this.#r.bind(this)),
              new IntersectionObserver(
                (s, i) => {
                  s.forEach((s) => {
                    s.isIntersecting && (t(), i.unobserve(e));
                  });
                },
                { threshold: 1 }
              ).observe(e),
              this)
            : (this.#r(), this));
      var e, t;
    }
    destroy(e = !0) {
      (this.timeouts = (this.timeouts.forEach(clearTimeout), [])),
        A(e) && this.cursor && this.#n(this.cursor),
        (this.statuses.destroyed = !0);
    }
    reset(e) {
      !this.is("destroyed") && this.destroy(),
        e ? (this.queue.wipe(), e(this)) : this.queue.reset(),
        (this.cursorPosition = 0);
      for (let t in this.statuses) this.statuses[t] = !1;
      return (this.element[this.#o() ? "value" : "innerHTML"] = ""), this;
    }
    is = function (e) {
      return this.statuses[e];
    };
    type(e, t = {}) {
      e = A(e);
      let { instant: s } = t,
        i = this.#a(t),
        r = g(e, this.opts.html).map((e) => {
          return {
            func: () => this.#u(e),
            char: e,
            delay:
              s || ((t = e), /<(.+)>(.*?)<\/(.+)>/.test(t.outerHTML))
                ? 0
                : this.#l(),
            typeable: e.nodeType === Node.TEXT_NODE,
          };
          var t;
        }),
        n = [
          i[0],
          { func: async () => await this.opts.beforeString(e, this) },
          ...r,
          { func: async () => await this.opts.afterString(e, this) },
          i[1],
        ];
      return this.#h(n, t);
    }
    break(e = {}) {
      return this.#h({ func: () => this.#u(a("BR")), typeable: !0 }, e);
    }
    move(e, t = {}) {
      e = A(e);
      let s = this.#a(t),
        { instant: i, to: r } = t,
        n = C({
          queueItems: this.queue.getTypeable(),
          selector: null === e ? "" : e,
          to: r,
          cursorPosition: this.#d,
        }),
        o = n < 0 ? -1 : 1;
      return (
        (this.predictedCursorPosition = this.#d + n),
        this.#h(
          [
            s[0],
            ...I(
              {
                func: () => this.#p(o),
                delay: i ? 0 : this.#l(),
                cursorable: !0,
              },
              Math.abs(n)
            ),
            s[1],
          ],
          t
        )
      );
    }
    exec(e, t = {}) {
      let s = this.#a(t);
      return this.#h([s[0], { func: () => e(this) }, s[1]], t);
    }
    options(e, t = {}) {
      return (e = A(e)), this.#c(e), this.#h({}, t);
    }
    pause(e, t = {}) {
      return this.#h({ delay: A(e) }, t);
    }
    delete(e = null, t = {}) {
      e = A(e);
      let s = this.#a(t),
        i = e,
        { instant: r, to: n } = t,
        o = this.queue.getTypeable(),
        a = (() =>
          null === i
            ? o.length
            : P(i)
            ? i
            : C({
                queueItems: o,
                selector: i,
                cursorPosition: this.#d,
                to: n,
              }))();
      return this.#h(
        [
          s[0],
          ...I(
            {
              func: this.#m.bind(this),
              delay: r ? 0 : this.#l(1),
              deletable: !0,
            },
            a
          ),
          s[1],
        ],
        t
      );
    }
    freeze() {
      this.statuses.frozen = !0;
    }
    flush(e = () => {}) {
      return this.#i(), this.#r(!1).then(e), this;
    }
    getQueue() {
      return this.queue;
    }
    getOptions() {
      return this.opts;
    }
    updateOptions(e) {
      return this.#c(e);
    }
    getElement() {
      return this.element;
    }
    empty(e = {}) {
      return this.#h({ func: this.#f.bind(this) }, e);
    }
    async #f() {
      this.#o()
        ? (this.element.value = "")
        : this.#y.forEach(this.#n.bind(this));
    }
    async #r(e = !0) {
      this.statuses.started = !0;
      let t = (t) => {
        this.queue.done(t, !e);
      };
      try {
        let s = [...this.queue.getQueue()];
        for (let e = 0; e < s.length; e++) {
          let [i, r] = s[e];
          if (!r.done) {
            if (!r.deletable || (r.deletable && this.#y.length)) {
              let i = await this.#g(e, s);
              b({ index: e, newIndex: i, queueItems: s, cleanUp: t }), (e = i);
            }
            t(i);
          }
        }
        if (!e) return this;
        if (
          ((this.statuses.completed = !0),
          await this.opts.afterComplete(this),
          !this.opts.loop)
        )
          throw "";
        let i = this.opts.loopDelay;
        this.#b(async () => {
          await this.#P(i[0]), this.#r();
        }, i[1]);
      } catch (s) {}
      return this;
    }
    async #p(e) {
      var t, s, r;
      (this.cursorPosition =
        ((t = e),
        (s = this.cursorPosition),
        (r = this.#y),
        Math.min(Math.max(s + t, 0), r.length))),
        ((e, t, s) => {
          let r = t[s - 1],
            n = E(`.${i}`, e);
          (e = r?.parentNode || e).insertBefore(n, r || null);
        })(this.element, this.#y, this.cursorPosition);
    }
    async #P(e) {
      let t = this.#d;
      t && (await this.#p({ value: t }));
      let s = this.#y.map((e) => [
        Symbol(),
        {
          func: this.#m.bind(this),
          delay: this.#l(1),
          deletable: !0,
          shouldPauseCursor: () => !0,
        },
      ]);
      for (let i = 0; i < s.length; i++) await this.#g(i, s);
      this.queue.reset(), this.queue.set(0, { delay: e });
    }
    #g(e, t) {
      return S({
        index: e,
        queueItems: t,
        wait: this.#b.bind(this),
        cursor: this.cursor,
        cursorOptions: this.opts.cursor,
      });
    }
    async #b(e, t, s = !1) {
      this.statuses.frozen &&
        (await new Promise((e) => {
          this.unfreeze = () => {
            (this.statuses.frozen = !1), e();
          };
        })),
        s || (await this.opts.beforeStep(this)),
        await ((e, t, s) =>
          new Promise((i) => {
            s.push(
              setTimeout(async () => {
                await e(), i();
              }, t || 0)
            );
          }))(e, t, this.timeouts),
        s || (await this.opts.afterStep(this));
    }
    async #i() {
      if (
        (!this.#o() && this.cursor && this.element.appendChild(this.cursor),
        this.#C)
      ) {
        ((e, t) => {
          let r = `[${s}='${e}'] .${i}`,
            n = getComputedStyle(t),
            o = Object.entries(x).reduce(
              (e, [t, s]) => `${e} ${t}: var(--ti-cursor-${t}, ${s || n[t]});`,
              ""
            );
          l(`${r} { display: inline-block; width: 0; ${o} }`, e);
        })(this.id, this.element),
          (this.cursor.dataset.tiAnimationId = this.id);
        let { animation: e } = this.opts.cursor,
          { frames: t, options: r } = e;
        T({
          frames: t,
          cursor: this.cursor,
          options: { duration: this.opts.cursorSpeed, ...r },
        });
      }
    }
    #o() {
      return N(this.element);
    }
    #h(e, t) {
      return this.queue.add(e), this.#I(t), this;
    }
    #I(e = {}) {
      let t = e.delay;
      t && this.queue.add({ delay: t });
    }
    #a(e = {}) {
      return [{ func: () => this.#c(e) }, { func: () => this.#c(this.opts) }];
    }
    async #c(e) {
      this.opts = L(this.opts, e);
    }
    #s() {
      let e = this.opts.strings.filter((e) => !!e);
      e.forEach((t, s) => {
        if ((this.type(t), s + 1 === e.length)) return;
        let i = this.opts.breakLines
          ? [{ func: () => this.#u(a("BR")), typeable: !0 }]
          : I(
              { func: this.#m.bind(this), delay: this.#l(1) },
              this.queue.getTypeable().length
            );
        this.#v(i);
      });
    }
    #e = (e) => {
      (this.opts.cursor = ((e) => {
        if ("object" == typeof e) {
          let t = {},
            { frames: s, options: i } = n.cursor.animation;
          return (
            (t.animation = e.animation || {}),
            (t.animation.frames = e.animation?.frames || s),
            (t.animation.options = L(i, e.animation?.options || {})),
            (t.autoPause = e.autoPause ?? n.cursor.autoPause),
            (t.autoPauseDelay = e.autoPauseDelay || n.cursor.autoPauseDelay),
            t
          );
        }
        return !0 === e ? n.cursor : e;
      })(e.cursor ?? n.cursor)),
        (this.opts.strings = this.#w(t(this.opts.strings))),
        (this.opts = L(this.opts, {
          html: !this.#T && this.opts.html,
          nextStringDelay: h(this.opts.nextStringDelay),
          loopDelay: h(this.opts.loopDelay),
        }));
    };
    #w(e) {
      let t = this.element.innerHTML;
      return t
        ? ((this.element.innerHTML = ""),
          this.opts.startDelete
            ? ((this.element.innerHTML = t),
              m(this.element),
              this.#v(
                I(
                  {
                    func: this.#m.bind(this),
                    delay: this.#l(1),
                    deletable: !0,
                  },
                  this.#y.length
                )
              ),
              e)
            : ((s = t),
              s
                .replace(/<!--(.+?)-->/g, "")
                .trim()
                .split(/<br(?:\s*?)(?:\/)?>/)).concat(e))
        : e;
      var s;
    }
    #t() {
      if (this.#T) return null;
      let e = a("span");
      return (
        (e.className = i),
        this.#C
          ? ((e.innerHTML = f(this.opts.cursorChar).innerHTML), e)
          : ((e.style.visibility = "hidden"), e)
      );
    }
    #v(e) {
      let t = this.opts.nextStringDelay;
      this.queue.add([{ delay: t[0] }, ...e, { delay: t[1] }]);
    }
    #u(e) {
      ((e, t) => {
        if (N(e)) return void (e.value = `${e.value}${t.textContent}`);
        t.innerHTML = "";
        let s =
          ((r = t.originalParent),
          /body/i.test(r?.tagName) ? e : t.originalParent || e);
        var r;
        s.insertBefore(t, E("." + i, s) || null);
      })(this.element, e);
    }
    #m() {
      this.#y.length &&
        (this.#T
          ? (this.element.value = this.element.value.slice(0, -1))
          : this.#n(this.#y[this.cursorPosition]));
    }
    #n(e) {
      ((e, t) => {
        if (!e) return;
        let s = e.parentNode;
        (s.childNodes.length > 1 || s.isSameNode(t) ? e : s).remove();
      })(e, this.element);
    }
    #l(e = 0) {
      return (function (e) {
        let { speed: t, deleteSpeed: s, lifeLike: i } = e;
        return (
          (s = null !== s ? s : t / 3), i ? [d(t, p(t)), d(s, p(s))] : [t, s]
        );
      })(this.opts)[e];
    }
    get #d() {
      return this.predictedCursorPosition ?? this.cursorPosition;
    }
    get #T() {
      return N(this.element);
    }
    get #C() {
      return !!this.opts.cursor && !this.#T;
    }
    get #y() {
      return (
        (e = this.element),
        N(e) ? c(e.value) : y(e, !0).filter((e) => !(e.childNodes.length > 0))
      );
      var e;
    }
  };
});
