/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/preview.js":
/*!*********************************!*\
  !*** ./resources/js/preview.js ***!
  \*********************************/
/***/ (() => {

eval("function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }\n\nfunction _nonIterableRest() { throw new TypeError(\"Invalid attempt to destructure non-iterable instance.\\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.\"); }\n\nfunction _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === \"string\") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === \"Object\" && o.constructor) n = o.constructor.name; if (n === \"Map\" || n === \"Set\") return Array.from(o); if (n === \"Arguments\" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }\n\nfunction _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }\n\nfunction _iterableToArrayLimit(arr, i) { var _i = arr == null ? null : typeof Symbol !== \"undefined\" && arr[Symbol.iterator] || arr[\"@@iterator\"]; if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i[\"return\"] != null) _i[\"return\"](); } finally { if (_d) throw _e; } } return _arr; }\n\nfunction _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }\n\nfunction main() {\n  var input = document.querySelector('#input');\n  var figure = document.querySelector('#figure');\n  var figureImage = document.querySelector('#figureImage');\n  input.addEventListener('change', function (event) {\n    // <1>\n    var _event$target$files = _slicedToArray(event.target.files, 1),\n        file = _event$target$files[0];\n\n    if (file) {\n      figureImage.setAttribute('src', URL.createObjectURL(file));\n      figure.style.display = 'block';\n    } else {\n      figure.style.display = 'none';\n    }\n  });\n}\n\nmain();//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJtYWluIiwiaW5wdXQiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJmaWd1cmUiLCJmaWd1cmVJbWFnZSIsImFkZEV2ZW50TGlzdGVuZXIiLCJldmVudCIsInRhcmdldCIsImZpbGVzIiwiZmlsZSIsInNldEF0dHJpYnV0ZSIsIlVSTCIsImNyZWF0ZU9iamVjdFVSTCIsInN0eWxlIiwiZGlzcGxheSJdLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcHJldmlldy5qcz9lZDZjIl0sInNvdXJjZXNDb250ZW50IjpbImZ1bmN0aW9uIG1haW4gKCkge1xuICAgIGNvbnN0IGlucHV0ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2lucHV0JylcbiAgICBjb25zdCBmaWd1cmUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjZmlndXJlJylcbiAgICBjb25zdCBmaWd1cmVJbWFnZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNmaWd1cmVJbWFnZScpXG4gIFxuICAgIGlucHV0LmFkZEV2ZW50TGlzdGVuZXIoJ2NoYW5nZScsIChldmVudCkgPT4geyAvLyA8MT5cbiAgICAgIGNvbnN0IFtmaWxlXSA9IGV2ZW50LnRhcmdldC5maWxlc1xuICBcbiAgICAgIGlmIChmaWxlKSB7XG4gICAgICAgIGZpZ3VyZUltYWdlLnNldEF0dHJpYnV0ZSgnc3JjJywgVVJMLmNyZWF0ZU9iamVjdFVSTChmaWxlKSlcbiAgICAgICAgZmlndXJlLnN0eWxlLmRpc3BsYXkgPSAnYmxvY2snXG4gICAgICB9IGVsc2Uge1xuICAgICAgICBmaWd1cmUuc3R5bGUuZGlzcGxheSA9ICdub25lJ1xuICAgICAgfVxuICAgIH0pXG59XG4gIFxubWFpbigpIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7QUFBQSxTQUFTQSxJQUFULEdBQWlCO0VBQ2IsSUFBTUMsS0FBSyxHQUFHQyxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsUUFBdkIsQ0FBZDtFQUNBLElBQU1DLE1BQU0sR0FBR0YsUUFBUSxDQUFDQyxhQUFULENBQXVCLFNBQXZCLENBQWY7RUFDQSxJQUFNRSxXQUFXLEdBQUdILFFBQVEsQ0FBQ0MsYUFBVCxDQUF1QixjQUF2QixDQUFwQjtFQUVBRixLQUFLLENBQUNLLGdCQUFOLENBQXVCLFFBQXZCLEVBQWlDLFVBQUNDLEtBQUQsRUFBVztJQUFFO0lBQzVDLHlDQUFlQSxLQUFLLENBQUNDLE1BQU4sQ0FBYUMsS0FBNUI7SUFBQSxJQUFPQyxJQUFQOztJQUVBLElBQUlBLElBQUosRUFBVTtNQUNSTCxXQUFXLENBQUNNLFlBQVosQ0FBeUIsS0FBekIsRUFBZ0NDLEdBQUcsQ0FBQ0MsZUFBSixDQUFvQkgsSUFBcEIsQ0FBaEM7TUFDQU4sTUFBTSxDQUFDVSxLQUFQLENBQWFDLE9BQWIsR0FBdUIsT0FBdkI7SUFDRCxDQUhELE1BR087TUFDTFgsTUFBTSxDQUFDVSxLQUFQLENBQWFDLE9BQWIsR0FBdUIsTUFBdkI7SUFDRDtFQUNGLENBVEQ7QUFVSDs7QUFFRGYsSUFBSSIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9wcmV2aWV3LmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/preview.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/preview.js"]();
/******/ 	
/******/ })()
;