(función (global, fábrica) {
    tipo de exportaciones === 'objeto' && tipo de módulo! == 'indefinido'? fábrica (exportaciones):
    typeof define === 'función' && define.amd? define (['exportaciones'], fábrica):
    (global = typeof globalThis! == 'undefined'? globalThis: global || self, factory (global.Spin = {}));
} (esto, (función (exportaciones) {'usar estricto';

    var __assign = (indefinido && indefinido .__ asignar) || function () {
        __assign = Object.assign || función (t) {
            para (var s, i = 1, n = argumentos.length; i <n; i ++) {
                s = argumentos [i];
                para (var p en s) if (Object.prototype.hasOwnProperty.call (s, p))
                    t [p] = s [p];
            }
            return t;
        };
        return __assign.apply (esto, argumentos);
    };
    var por defecto = {
        líneas: 12,
        longitud: 7,
        ancho: 5,
        radio: 10,
        escala: 1.0,
        esquinas: 1,
        color: '# 000',
        fadeColor: 'transparente',
        animación: 'spinner-line-fade-default',
        rotar: 0,
        dirección: 1,
        velocidad: 1,
        zIndex: 2e9,
        className: 'spinner',
        arriba: '50% ',
        izquierda: '50% ',
        sombra: '0 0 1px transparente',
        posición: 'absoluta',
    };
    var Spinner = / ** @class * / (function () {
        función Spinner (opta) {
            if (opts === void 0) {opts = {}; }
            this.opts = __assign (__ assign ({}, valores predeterminados), opts);
        }
        / **
         * Agrega la ruleta al elemento de destino dado. Si esta instancia ya es
         * girando, se elimina automáticamente de su objetivo anterior llamando
         * detener () internamente.
         * /
        Spinner.prototype.spin = function (target) {
            this.stop ();
            this.el = document.createElement ('div');
            this.el.className = this.opts.className;
            this.el.setAttribute ('rol', 'barra de progreso');
            css (this.el, {
                position: this.opts.position,
                ancho: 0,
                zIndex: this.opts.zIndex,
                left: this.opts.left,
                arriba: this.opts.top,
                transformar: "escala (" + this.opts.scale + ")",
            });
            si (objetivo) {
                target.insertBefore (this.el, target.firstChild || nulo);
            }
            drawLines (this.el, this.opts);
            devuelve esto;
        };
        / **
         * Detiene y quita el Spinner.
         * Los hilanderos detenidos se pueden reutilizar llamando de nuevo a spin ().
         * /
        Spinner.prototype.stop = function () {
            si (this.el) {
                if (typeof requestAnimationFrame! == 'undefined') {
                    cancelAnimationFrame (this.animateId);
                }
                else {
                    clearTimeout (this.animateId);
                }
                if (this.el.parentNode) {
                    this.el.parentNode.removeChild (this.el);
                }
                this.el = indefinido;
            }
            devuelve esto;
        };
        return Spinner;
    } ());
    / **
     * Establece múltiples propiedades de estilo a la vez.
     * /
    function css (el, props) {
        for (var prop en props) {
            el.style [prop] = props [prop];
        }
        return el;
    }
    / **
     * Devuelve el color de la línea de la cadena o matriz dada.
     * /
    function getColor (color, idx) {
        return typeof color == 'cadena'? color: color [idx% color.length];
    }
    / **
     * Método interno que dibuja las líneas individuales.
     * /
    function drawLines (el, opts) {
        var borderRadius = (Math.round (opts.corners * opts.width * 500) / 1000) + 'px';
        var shadow = 'ninguno';
        if (opts.shadow === true) {
            sombra = '0 2px 4px # 000'; // sombra predeterminada
        }
        else if (typeof opts.shadow === 'string') {
            shadow = opts.shadow;
        }
        var sombras = parseBoxShadow (sombra);
        para (var i = 0; i <opts.lines; i ++) {
            var grados = ~~ (360 / opts.lines * i + opts.rotate);
            var backgroundLine = css (document.createElement ('div'), {
                posición: 'absoluta',
                arriba: -opts.width / 2 + "px",
                ancho: (opts.length + opts.width) + 'px',
                altura: opts.width + 'px',
                fondo: getColor (opts.fadeColor, i),
                borderRadius: borderRadius,
                transformOrigin: 'izquierda',
                transform: "rotar (" + grados + "deg) translateX (" + opts.radius + "px)",
            });
            var delay = i * opts.direction / opts.lines / opts.speed;
            retraso - = 1 / opts.speed; // entonces el estado de animación inicial incluirá el rastro
            var line = css (document.createElement ('div'), {
                ancho: '100%',
                altura: '100%',
                fondo: getColor (opts.color, i),
                borderRadius: borderRadius,
                boxShadow: normalizeShadow (sombras, grados),
                animación: 1 / opts.speed + "s linear" + delay + "s infinite" + opts.animation,
            });
            backgroundLine.appendChild (línea);
            el.appendChild (backgroundLine);
        }
    }
    function parseBoxShadow (boxShadow) {
        var regex = / ^ \ s * ([a-zA-Z] + \ s +)? (-? \ d + (\. \ d +)?) ([a-zA-Z] *) \ s + (-? \ d + (\. \ d +)?) ([a-zA-Z] *) (. *) $ /;
        var sombras = [];
        para (var _i = 0, _a = boxShadow.split (','); _i <_a.length; _i ++) {
            var shadow = _a [_i];
            var coincide con shadow.match (regex);
            si (coincide con === nulo) {
                Seguir; // sintaxis inválida
            }
            var x = + coincide con [2];
            var y = + coincide con [5];
            var xUnits = coincide con [4];
            var yUnits = coincide con [7];
            if (x === 0 &&! xUnits) {
                xUnits = yUnits;
            }
            if (y === 0 &&! yUnits) {
                yUnidades = xUnidades;
            }
            if (xUnidades! == yUnidades) {
                Seguir; // las unidades deben coincidir para usarlas como coordenadas
            }
            shadows.push ({
                prefijo: coincide con [1] || '',
                x: x,
                y: y,
                xUnidades: xUnidades,
                yUnidades: yUnits,
                final: coincide con [8],
            });
        }
        devolver sombras;
    }
    / **
     * Modificar las compensaciones x / y de la sombra de caja para contrarrestar la rotación
     * /
    function normalizeShadow (sombras, grados) {
        var normalizado = [];
        para (var _i = 0, shadows_1 = shadows; _i <shadows_1.length; _i ++) {
            var shadow = shadows_1 [_i];
            var xy = convertOffset (sombra.x, sombra.y, grados);
            normalized.push (shadow.prefix + xy [0] + shadow.xUnits + '' + xy [1] + shadow.yUnits + shadow.end);
        }
        return normalized.join (',');
    }
    función convertOffset (x, y, grados) {
        var radianes = grados * Math.PI / 180;
        var sin = Math.sin (radianes);
        var cos = Math.cos (radianes);
        regreso [
            Math.round ((x * cos + y * sin) * 1000) / 1000,
            Math.round ((- x * sin + y * cos) * 1000) / 1000,
        ];
    }

    exportaciones.Spinner = Spinner;

    Object.defineProperty (exportaciones, '__esModule', {valor: verdadero});

});