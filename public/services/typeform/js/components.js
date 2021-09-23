/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue":
/*!**********************************************************************************************************************************************************!*\
  !*** /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue ***!
  \**********************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VError_vue_vue_type_template_id_77363ab7_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VError.vue?vue&type=template&id=77363ab7&scoped=true& */ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue?vue&type=template&id=77363ab7&scoped=true&");
/* harmony import */ var _VError_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./VError.vue?vue&type=script&lang=js& */ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../repos/bristol-su/typeform-service/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _VError_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _VError_vue_vue_type_template_id_77363ab7_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _VError_vue_vue_type_template_id_77363ab7_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "77363ab7",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************!*\
  !*** /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VError_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../repos/bristol-su/typeform-service/node_modules/vue-loader/lib??vue-loader-options!./VError.vue?vue&type=script&lang=js& */ "./node_modules/vue-loader/lib/index.js?!../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VError_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue?vue&type=template&id=77363ab7&scoped=true&":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue?vue&type=template&id=77363ab7&scoped=true& ***!
  \*****************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VError_vue_vue_type_template_id_77363ab7_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../repos/bristol-su/typeform-service/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../repos/bristol-su/typeform-service/node_modules/vue-loader/lib??vue-loader-options!./VError.vue?vue&type=template&id=77363ab7&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue?vue&type=template&id=77363ab7&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VError_vue_vue_type_template_id_77363ab7_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VError_vue_vue_type_template_id_77363ab7_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue":
/*!**************************************************************************************************************************************************************!*\
  !*** /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue ***!
  \**************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VFormLabel_vue_vue_type_template_id_ed4c4482_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VFormLabel.vue?vue&type=template&id=ed4c4482&scoped=true& */ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue?vue&type=template&id=ed4c4482&scoped=true&");
/* harmony import */ var _VFormLabel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./VFormLabel.vue?vue&type=script&lang=js& */ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../repos/bristol-su/typeform-service/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _VFormLabel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _VFormLabel_vue_vue_type_template_id_ed4c4482_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _VFormLabel_vue_vue_type_template_id_ed4c4482_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "ed4c4482",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************!*\
  !*** /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VFormLabel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../repos/bristol-su/typeform-service/node_modules/vue-loader/lib??vue-loader-options!./VFormLabel.vue?vue&type=script&lang=js& */ "./node_modules/vue-loader/lib/index.js?!../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VFormLabel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue?vue&type=template&id=ed4c4482&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue?vue&type=template&id=ed4c4482&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VFormLabel_vue_vue_type_template_id_ed4c4482_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../repos/bristol-su/typeform-service/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../repos/bristol-su/typeform-service/node_modules/vue-loader/lib??vue-loader-options!./VFormLabel.vue?vue&type=template&id=ed4c4482&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue?vue&type=template&id=ed4c4482&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VFormLabel_vue_vue_type_template_id_ed4c4482_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VFormLabel_vue_vue_type_template_id_ed4c4482_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue":
/*!*************************************************************************************************************************************************************!*\
  !*** /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue ***!
  \*************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VHelpText_vue_vue_type_template_id_6616362f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VHelpText.vue?vue&type=template&id=6616362f& */ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue?vue&type=template&id=6616362f&");
/* harmony import */ var _VHelpText_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./VHelpText.vue?vue&type=script&lang=js& */ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../repos/bristol-su/typeform-service/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _VHelpText_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _VHelpText_vue_vue_type_template_id_6616362f___WEBPACK_IMPORTED_MODULE_0__["render"],
  _VHelpText_vue_vue_type_template_id_6616362f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************!*\
  !*** /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VHelpText_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../repos/bristol-su/typeform-service/node_modules/vue-loader/lib??vue-loader-options!./VHelpText.vue?vue&type=script&lang=js& */ "./node_modules/vue-loader/lib/index.js?!../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VHelpText_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue?vue&type=template&id=6616362f&":
/*!********************************************************************************************************************************************************************************************!*\
  !*** /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue?vue&type=template&id=6616362f& ***!
  \********************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VHelpText_vue_vue_type_template_id_6616362f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../repos/bristol-su/typeform-service/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../repos/bristol-su/typeform-service/node_modules/vue-loader/lib??vue-loader-options!./VHelpText.vue?vue&type=template&id=6616362f& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue?vue&type=template&id=6616362f&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VHelpText_vue_vue_type_template_id_6616362f___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _repos_bristol_su_typeform_service_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_repos_bristol_su_typeform_service_node_modules_vue_loader_lib_index_js_vue_loader_options_VHelpText_vue_vue_type_template_id_6616362f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/dynamic-form/FormInputMixin.js":
/*!******************************************************************************************************************************************************************************!*\
  !*** /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/dynamic-form/FormInputMixin.js ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VFormLabel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../VFormLabel */ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue");


/* harmony default export */ __webpack_exports__["default"] = ({
    props: {
        id: {type: String, required: true},
        label: {validator: (val) => val === null || typeof val === 'string', required: false},
        required: {type: Boolean, required: false},
        visible: {type: Boolean, required: false},
        hint: {validator: (val) => val === null || typeof val === 'string', required: false},
        tooltip: {validator: (val) => val === null || typeof val === 'string', required: false},
        value: {required: false, default: null}
    },
    components: {
        VFormLabel: _VFormLabel__WEBPACK_IMPORTED_MODULE_0__["default"]
    },
    methods: {
        setValue(value) {
            this.$emit('input', value);
        }
    },
    computed: {
        name() {
            return this.id;
        },
        title() {
            return this.label
        },
        hasTooltip() {
            return this.tooltip !== null;
        },
        hasHint() {
            return this.hint !== null;
        },
        help() {
            return this.hint;
        },
        dynamicValue: {
            get() {
                return this.value;
            },
            set(updatedValue) {
                this.setValue(updatedValue);
            }
        },
        labelProps() {
            let props = {
                title: this.title,
                required: this.required,
                help: this.help,
                tooltip: this.tooltip
            }

            return Object.fromEntries(Object.entries(props).filter(([_, v]) => v !== null)); // Only return non-empty values
        }
    }
});


/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/OAuthLogin.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/OAuthLogin.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _bristol_su_portal_ui_kit_src_components_atomic_dynamic_form_FormInputMixin__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @bristol-su/portal-ui-kit/src/components/atomic/dynamic-form/FormInputMixin */ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/dynamic-form/FormInputMixin.js");
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "OAuthLogin",
  mixins: [_bristol_su_portal_ui_kit_src_components_atomic_dynamic_form_FormInputMixin__WEBPACK_IMPORTED_MODULE_0__["default"]],
  data: function data() {
    return {
      clientId: '',
      scope: 'offline+accounts:read+responses:read+webhooks:read+webhooks:write+forms:read',
      state: '12345',
      redirect_uri: '/_connector/typeform/redirect',
      authTokens: [],
      loadingCodes: false,
      intervalId: null
    };
  },
  created: function created() {
    this.clientId = this.$tools.utils.WindowAccessor.get('typeform_client_id');
    this.loadCodes();
  },
  mounted: function mounted() {
    var _this = this;

    this.intervalId = window.setInterval(function () {
      _this.loadCodes();
    }, 2500);
  },
  methods: {
    loadCodes: function loadCodes() {
      var _this2 = this;

      if (this.loadingCodes === false) {
        this.loadingCodes = true;
        return this.$httpBasic.get('_connector/typeform/code').then(function (response) {
          var newLogin = _this2.isNewLogin(response.data);

          _this2.authTokens = response.data;

          if (newLogin !== false) {
            _this2.setValue(newLogin.id);
          }
        })["catch"](function (error) {
          return _this2.$notify.alert('Could not load logins');
        }).then(function () {
          return _this2.loadingCodes = false;
        });
      }
    },
    isNewLogin: function isNewLogin(newValue) {
      var currentIds = this.authTokens.map(function (token) {
        return token.id;
      });

      if (Array.isArray(newValue)) {
        var _iterator = _createForOfIteratorHelper(newValue),
            _step;

        try {
          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            var val = _step.value;

            if (val.hasOwnProperty('id')) {
              if (currentIds.indexOf(val.id) === -1) {
                return val;
              }
            }
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }
      }

      return false;
    }
  },
  computed: {
    oauthUrl: function oauthUrl() {
      return "https://api.typeform.com/oauth/authorize?client_id=" + this.clientId + "&scope=" + this.scope + "&redirect_uri=" + this.$tools.routes.basic.baseWebUrl() + this.redirect_uri + "&state=" + this.state;
    },
    loginsForSelect: function loginsForSelect() {
      return this.authTokens.map(function (t) {
        return {
          id: t.id,
          value: t.created_at
        };
      });
    }
  },
  destroyed: function destroyed() {
    window.clearInterval(this.intervalId);
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/OAuthLogin.vue?vue&type=style&index=0&id=54b07a9d&scoped=true&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/OAuthLogin.vue?vue&type=style&index=0&id=54b07a9d&scoped=true&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.tf-login-button[data-v-54b07a9d] {\n    text-decoration: none;\n    background-color: #262627;\n    border: 0;\n    border-radius: 2px;\n    color: #fff;\n    display: inline-block;\n    font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\n    line-height: 24px;\n    padding: 8px 16px;\n    transition: 0.2s;\n    white-space: nowrap;\n    --webkit-font-smoothing: antialiased;\n}\n.tf-login-button > a[data-v-54b07a9d]:hover {\n    opacity: .8;\n}\n.tf-login-button > a[data-v-54b07a9d]:visited {\n    color: #fff;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/lib/css-base.js":
/*!*************************************************!*\
  !*** ./node_modules/css-loader/lib/css-base.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/OAuthLogin.vue?vue&type=style&index=0&id=54b07a9d&scoped=true&lang=css&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/OAuthLogin.vue?vue&type=style&index=0&id=54b07a9d&scoped=true&lang=css& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../node_modules/css-loader??ref--5-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--5-2!../../../node_modules/vue-loader/lib??vue-loader-options!./OAuthLogin.vue?vue&type=style&index=0&id=54b07a9d&scoped=true&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/OAuthLogin.vue?vue&type=style&index=0&id=54b07a9d&scoped=true&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/style-loader/lib/addStyles.js":
/*!****************************************************!*\
  !*** ./node_modules/style-loader/lib/addStyles.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/

var stylesInDom = {};

var	memoize = function (fn) {
	var memo;

	return function () {
		if (typeof memo === "undefined") memo = fn.apply(this, arguments);
		return memo;
	};
};

var isOldIE = memoize(function () {
	// Test for IE <= 9 as proposed by Browserhacks
	// @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
	// Tests for existence of standard globals is to allow style-loader
	// to operate correctly into non-standard environments
	// @see https://github.com/webpack-contrib/style-loader/issues/177
	return window && document && document.all && !window.atob;
});

var getTarget = function (target, parent) {
  if (parent){
    return parent.querySelector(target);
  }
  return document.querySelector(target);
};

var getElement = (function (fn) {
	var memo = {};

	return function(target, parent) {
                // If passing function in options, then use it for resolve "head" element.
                // Useful for Shadow Root style i.e
                // {
                //   insertInto: function () { return document.querySelector("#foo").shadowRoot }
                // }
                if (typeof target === 'function') {
                        return target();
                }
                if (typeof memo[target] === "undefined") {
			var styleTarget = getTarget.call(this, target, parent);
			// Special case to return head of iframe instead of iframe itself
			if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
				try {
					// This will throw an exception if access to iframe is blocked
					// due to cross-origin restrictions
					styleTarget = styleTarget.contentDocument.head;
				} catch(e) {
					styleTarget = null;
				}
			}
			memo[target] = styleTarget;
		}
		return memo[target]
	};
})();

var singleton = null;
var	singletonCounter = 0;
var	stylesInsertedAtTop = [];

var	fixUrls = __webpack_require__(/*! ./urls */ "./node_modules/style-loader/lib/urls.js");

module.exports = function(list, options) {
	if (typeof DEBUG !== "undefined" && DEBUG) {
		if (typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
	}

	options = options || {};

	options.attrs = typeof options.attrs === "object" ? options.attrs : {};

	// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
	// tags it will allow on a page
	if (!options.singleton && typeof options.singleton !== "boolean") options.singleton = isOldIE();

	// By default, add <style> tags to the <head> element
        if (!options.insertInto) options.insertInto = "head";

	// By default, add <style> tags to the bottom of the target
	if (!options.insertAt) options.insertAt = "bottom";

	var styles = listToStyles(list, options);

	addStylesToDom(styles, options);

	return function update (newList) {
		var mayRemove = [];

		for (var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];

			domStyle.refs--;
			mayRemove.push(domStyle);
		}

		if(newList) {
			var newStyles = listToStyles(newList, options);
			addStylesToDom(newStyles, options);
		}

		for (var i = 0; i < mayRemove.length; i++) {
			var domStyle = mayRemove[i];

			if(domStyle.refs === 0) {
				for (var j = 0; j < domStyle.parts.length; j++) domStyle.parts[j]();

				delete stylesInDom[domStyle.id];
			}
		}
	};
};

function addStylesToDom (styles, options) {
	for (var i = 0; i < styles.length; i++) {
		var item = styles[i];
		var domStyle = stylesInDom[item.id];

		if(domStyle) {
			domStyle.refs++;

			for(var j = 0; j < domStyle.parts.length; j++) {
				domStyle.parts[j](item.parts[j]);
			}

			for(; j < item.parts.length; j++) {
				domStyle.parts.push(addStyle(item.parts[j], options));
			}
		} else {
			var parts = [];

			for(var j = 0; j < item.parts.length; j++) {
				parts.push(addStyle(item.parts[j], options));
			}

			stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
		}
	}
}

function listToStyles (list, options) {
	var styles = [];
	var newStyles = {};

	for (var i = 0; i < list.length; i++) {
		var item = list[i];
		var id = options.base ? item[0] + options.base : item[0];
		var css = item[1];
		var media = item[2];
		var sourceMap = item[3];
		var part = {css: css, media: media, sourceMap: sourceMap};

		if(!newStyles[id]) styles.push(newStyles[id] = {id: id, parts: [part]});
		else newStyles[id].parts.push(part);
	}

	return styles;
}

function insertStyleElement (options, style) {
	var target = getElement(options.insertInto)

	if (!target) {
		throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
	}

	var lastStyleElementInsertedAtTop = stylesInsertedAtTop[stylesInsertedAtTop.length - 1];

	if (options.insertAt === "top") {
		if (!lastStyleElementInsertedAtTop) {
			target.insertBefore(style, target.firstChild);
		} else if (lastStyleElementInsertedAtTop.nextSibling) {
			target.insertBefore(style, lastStyleElementInsertedAtTop.nextSibling);
		} else {
			target.appendChild(style);
		}
		stylesInsertedAtTop.push(style);
	} else if (options.insertAt === "bottom") {
		target.appendChild(style);
	} else if (typeof options.insertAt === "object" && options.insertAt.before) {
		var nextSibling = getElement(options.insertAt.before, target);
		target.insertBefore(style, nextSibling);
	} else {
		throw new Error("[Style Loader]\n\n Invalid value for parameter 'insertAt' ('options.insertAt') found.\n Must be 'top', 'bottom', or Object.\n (https://github.com/webpack-contrib/style-loader#insertat)\n");
	}
}

function removeStyleElement (style) {
	if (style.parentNode === null) return false;
	style.parentNode.removeChild(style);

	var idx = stylesInsertedAtTop.indexOf(style);
	if(idx >= 0) {
		stylesInsertedAtTop.splice(idx, 1);
	}
}

function createStyleElement (options) {
	var style = document.createElement("style");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}

	if(options.attrs.nonce === undefined) {
		var nonce = getNonce();
		if (nonce) {
			options.attrs.nonce = nonce;
		}
	}

	addAttrs(style, options.attrs);
	insertStyleElement(options, style);

	return style;
}

function createLinkElement (options) {
	var link = document.createElement("link");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}
	options.attrs.rel = "stylesheet";

	addAttrs(link, options.attrs);
	insertStyleElement(options, link);

	return link;
}

function addAttrs (el, attrs) {
	Object.keys(attrs).forEach(function (key) {
		el.setAttribute(key, attrs[key]);
	});
}

function getNonce() {
	if (false) {}

	return __webpack_require__.nc;
}

function addStyle (obj, options) {
	var style, update, remove, result;

	// If a transform function was defined, run it on the css
	if (options.transform && obj.css) {
	    result = typeof options.transform === 'function'
		 ? options.transform(obj.css) 
		 : options.transform.default(obj.css);

	    if (result) {
	    	// If transform returns a value, use that instead of the original css.
	    	// This allows running runtime transformations on the css.
	    	obj.css = result;
	    } else {
	    	// If the transform function returns a falsy value, don't add this css.
	    	// This allows conditional loading of css
	    	return function() {
	    		// noop
	    	};
	    }
	}

	if (options.singleton) {
		var styleIndex = singletonCounter++;

		style = singleton || (singleton = createStyleElement(options));

		update = applyToSingletonTag.bind(null, style, styleIndex, false);
		remove = applyToSingletonTag.bind(null, style, styleIndex, true);

	} else if (
		obj.sourceMap &&
		typeof URL === "function" &&
		typeof URL.createObjectURL === "function" &&
		typeof URL.revokeObjectURL === "function" &&
		typeof Blob === "function" &&
		typeof btoa === "function"
	) {
		style = createLinkElement(options);
		update = updateLink.bind(null, style, options);
		remove = function () {
			removeStyleElement(style);

			if(style.href) URL.revokeObjectURL(style.href);
		};
	} else {
		style = createStyleElement(options);
		update = applyToTag.bind(null, style);
		remove = function () {
			removeStyleElement(style);
		};
	}

	update(obj);

	return function updateStyle (newObj) {
		if (newObj) {
			if (
				newObj.css === obj.css &&
				newObj.media === obj.media &&
				newObj.sourceMap === obj.sourceMap
			) {
				return;
			}

			update(obj = newObj);
		} else {
			remove();
		}
	};
}

var replaceText = (function () {
	var textStore = [];

	return function (index, replacement) {
		textStore[index] = replacement;

		return textStore.filter(Boolean).join('\n');
	};
})();

function applyToSingletonTag (style, index, remove, obj) {
	var css = remove ? "" : obj.css;

	if (style.styleSheet) {
		style.styleSheet.cssText = replaceText(index, css);
	} else {
		var cssNode = document.createTextNode(css);
		var childNodes = style.childNodes;

		if (childNodes[index]) style.removeChild(childNodes[index]);

		if (childNodes.length) {
			style.insertBefore(cssNode, childNodes[index]);
		} else {
			style.appendChild(cssNode);
		}
	}
}

function applyToTag (style, obj) {
	var css = obj.css;
	var media = obj.media;

	if(media) {
		style.setAttribute("media", media)
	}

	if(style.styleSheet) {
		style.styleSheet.cssText = css;
	} else {
		while(style.firstChild) {
			style.removeChild(style.firstChild);
		}

		style.appendChild(document.createTextNode(css));
	}
}

function updateLink (link, options, obj) {
	var css = obj.css;
	var sourceMap = obj.sourceMap;

	/*
		If convertToAbsoluteUrls isn't defined, but sourcemaps are enabled
		and there is no publicPath defined then lets turn convertToAbsoluteUrls
		on by default.  Otherwise default to the convertToAbsoluteUrls option
		directly
	*/
	var autoFixUrls = options.convertToAbsoluteUrls === undefined && sourceMap;

	if (options.convertToAbsoluteUrls || autoFixUrls) {
		css = fixUrls(css);
	}

	if (sourceMap) {
		// http://stackoverflow.com/a/26603875
		css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
	}

	var blob = new Blob([css], { type: "text/css" });

	var oldSrc = link.href;

	link.href = URL.createObjectURL(blob);

	if(oldSrc) URL.revokeObjectURL(oldSrc);
}


/***/ }),

/***/ "./node_modules/style-loader/lib/urls.js":
/*!***********************************************!*\
  !*** ./node_modules/style-loader/lib/urls.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {


/**
 * When source maps are enabled, `style-loader` uses a link element with a data-uri to
 * embed the css on the page. This breaks all relative urls because now they are relative to a
 * bundle instead of the current page.
 *
 * One solution is to only use full urls, but that may be impossible.
 *
 * Instead, this function "fixes" the relative urls to be absolute according to the current page location.
 *
 * A rudimentary test suite is located at `test/fixUrls.js` and can be run via the `npm test` command.
 *
 */

module.exports = function (css) {
  // get current location
  var location = typeof window !== "undefined" && window.location;

  if (!location) {
    throw new Error("fixUrls requires window.location");
  }

	// blank or null?
	if (!css || typeof css !== "string") {
	  return css;
  }

  var baseUrl = location.protocol + "//" + location.host;
  var currentDir = baseUrl + location.pathname.replace(/\/[^\/]*$/, "/");

	// convert each url(...)
	/*
	This regular expression is just a way to recursively match brackets within
	a string.

	 /url\s*\(  = Match on the word "url" with any whitespace after it and then a parens
	   (  = Start a capturing group
	     (?:  = Start a non-capturing group
	         [^)(]  = Match anything that isn't a parentheses
	         |  = OR
	         \(  = Match a start parentheses
	             (?:  = Start another non-capturing groups
	                 [^)(]+  = Match anything that isn't a parentheses
	                 |  = OR
	                 \(  = Match a start parentheses
	                     [^)(]*  = Match anything that isn't a parentheses
	                 \)  = Match a end parentheses
	             )  = End Group
              *\) = Match anything and then a close parens
          )  = Close non-capturing group
          *  = Match anything
       )  = Close capturing group
	 \)  = Match a close parens

	 /gi  = Get all matches, not the first.  Be case insensitive.
	 */
	var fixedCss = css.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function(fullMatch, origUrl) {
		// strip quotes (if they exist)
		var unquotedOrigUrl = origUrl
			.trim()
			.replace(/^"(.*)"$/, function(o, $1){ return $1; })
			.replace(/^'(.*)'$/, function(o, $1){ return $1; });

		// already a full url? no change
		if (/^(#|data:|http:\/\/|https:\/\/|file:\/\/\/|\s*$)/i.test(unquotedOrigUrl)) {
		  return fullMatch;
		}

		// convert the url to a full url
		var newUrl;

		if (unquotedOrigUrl.indexOf("//") === 0) {
		  	//TODO: should we add protocol?
			newUrl = unquotedOrigUrl;
		} else if (unquotedOrigUrl.indexOf("/") === 0) {
			// path should be relative to the base url
			newUrl = baseUrl + unquotedOrigUrl; // already starts with '/'
		} else {
			// path should be relative to current directory
			newUrl = currentDir + unquotedOrigUrl.replace(/^\.\//, ""); // Strip leading './'
		}

		// send back the fixed url(...)
		return "url(" + JSON.stringify(newUrl) + ")";
	});

	// send back the fixed css
	return fixedCss;
};


/***/ }),

/***/ "./node_modules/vue-loader/lib/index.js?!../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib??vue-loader-options!/mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    name: "VError",
    props: {
        error: {type: String, required: true}
    }
});


/***/ }),

/***/ "./node_modules/vue-loader/lib/index.js?!../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib??vue-loader-options!/mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VHelpText__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VHelpText */ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue");
/* harmony import */ var _VError__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./VError */ "../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ __webpack_exports__["default"] = ({ // Wrapper Component for Inputs which shows Tooltip and Help text, also will need to handle errors
    name: "VFormLabel",
    components: {
        VHelpText: _VHelpText__WEBPACK_IMPORTED_MODULE_0__["default"],
        VError: _VError__WEBPACK_IMPORTED_MODULE_1__["default"]
    },
    props: {
        title: {type: String, required: false},
        required: {type: Boolean, required: false, default: false},
        help: {type: String, required: false},
        tooltip: {type: String, required: false},
        errors: {type: String, required: false, default: ''}
    },
    computed: {
        hasHelp() {
            return !!this.help;
        }
    }
});


/***/ }),

/***/ "./node_modules/vue-loader/lib/index.js?!../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib??vue-loader-options!/mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "VHelpText",
  props: {
      help: {type: String, required: true}
  }
});


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue?vue&type=template&id=77363ab7&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!/mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VError.vue?vue&type=template&id=77363ab7&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("p", {
    staticClass: "text-red-500 text-xs italic",
    domProps: { textContent: _vm._s(_vm.error) }
  })
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue?vue&type=template&id=ed4c4482&scoped=true&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!/mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VFormLabel.vue?vue&type=template&id=ed4c4482&scoped=true& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "relative mt-4" },
    [
      _vm.title
        ? _c(
            "label",
            {
              directives: [
                {
                  name: "tippy",
                  rawName: "v-tippy",
                  value: {
                    arrow: true,
                    animation: "fade",
                    placement: "top-start",
                    arrow: true,
                    interactive: true
                  },
                  expression:
                    "{ arrow: true, animation: 'fade', placement: 'top-start', arrow: true, interactive: true }"
                }
              ],
              staticClass: "text-base leading-7 text-blueGray-500",
              attrs: { content: _vm.tooltip, for: _vm.title }
            },
            [
              _vm._v("\n        " + _vm._s(_vm.title) + " "),
              _vm.required
                ? _c("span", [
                    _vm._v("* "),
                    _c("span", { staticClass: "sr-only" }, [_vm._v("Required")])
                  ])
                : _vm._e()
            ]
          )
        : _vm._e(),
      _vm._v(" "),
      _vm._t("default"),
      _vm._v(" "),
      _vm.hasHelp ? _c("v-help-text", { attrs: { help: _vm.help } }) : _vm._e(),
      _vm._v(" "),
      _vm._l(_vm.errors, function(error) {
        return _vm.errors
          ? _c(
              "div",
              { key: error.id },
              [_c("v-error", { attrs: { error: error } })],
              1
            )
          : _vm._e()
      })
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../../../node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue?vue&type=template&id=6616362f&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!/mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/node_modules/@bristol-su/portal-ui-kit/src/components/atomic/VHelpText.vue?vue&type=template&id=6616362f& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("p", {
    staticClass: "mt-2 text-gray-600 text-xs italic",
    domProps: { textContent: _vm._s(_vm.help) }
  })
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/OAuthLogin.vue?vue&type=template&id=54b07a9d&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/OAuthLogin.vue?vue&type=template&id=54b07a9d&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("p-select", {
        attrs: {
          id: "oauth-login",
          "select-options": _vm.loginsForSelect,
          "null-label": "-- No Logins --"
        },
        model: {
          value: _vm.dynamicValue,
          callback: function($$v) {
            _vm.dynamicValue = $$v
          },
          expression: "dynamicValue"
        }
      }),
      _vm._v(" "),
      _c("div", { ref: "tfLoginButton" }, [
        _c(
          "a",
          {
            staticClass: "tf-login-button",
            attrs: { href: _vm.oauthUrl, target: "_blank" }
          },
          [_vm._v("Log in to Typeform")]
        )
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components.js":
/*!************************************!*\
  !*** ./resources/js/components.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_OAuthLogin__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/OAuthLogin */ "./resources/js/components/OAuthLogin.vue");
/* harmony import */ var _bristol_su_frontend_toolkit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @bristol-su/frontend-toolkit */ "@bristol-su/frontend-toolkit");
/* harmony import */ var _bristol_su_frontend_toolkit__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_bristol_su_frontend_toolkit__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue */ "vue");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_2__);



vue__WEBPACK_IMPORTED_MODULE_2___default.a.use(_bristol_su_frontend_toolkit__WEBPACK_IMPORTED_MODULE_1___default.a);
vue__WEBPACK_IMPORTED_MODULE_2___default.a.component('p-typeform-auth-code', _components_OAuthLogin__WEBPACK_IMPORTED_MODULE_0__["default"]);

/***/ }),

/***/ "./resources/js/components/OAuthLogin.vue":
/*!************************************************!*\
  !*** ./resources/js/components/OAuthLogin.vue ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _OAuthLogin_vue_vue_type_template_id_54b07a9d_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./OAuthLogin.vue?vue&type=template&id=54b07a9d&scoped=true& */ "./resources/js/components/OAuthLogin.vue?vue&type=template&id=54b07a9d&scoped=true&");
/* harmony import */ var _OAuthLogin_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./OAuthLogin.vue?vue&type=script&lang=js& */ "./resources/js/components/OAuthLogin.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _OAuthLogin_vue_vue_type_style_index_0_id_54b07a9d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./OAuthLogin.vue?vue&type=style&index=0&id=54b07a9d&scoped=true&lang=css& */ "./resources/js/components/OAuthLogin.vue?vue&type=style&index=0&id=54b07a9d&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _OAuthLogin_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _OAuthLogin_vue_vue_type_template_id_54b07a9d_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _OAuthLogin_vue_vue_type_template_id_54b07a9d_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "54b07a9d",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/OAuthLogin.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/OAuthLogin.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/components/OAuthLogin.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OAuthLogin_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./OAuthLogin.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/OAuthLogin.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OAuthLogin_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/OAuthLogin.vue?vue&type=style&index=0&id=54b07a9d&scoped=true&lang=css&":
/*!*********************************************************************************************************!*\
  !*** ./resources/js/components/OAuthLogin.vue?vue&type=style&index=0&id=54b07a9d&scoped=true&lang=css& ***!
  \*********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_OAuthLogin_vue_vue_type_style_index_0_id_54b07a9d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader!../../../node_modules/css-loader??ref--5-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--5-2!../../../node_modules/vue-loader/lib??vue-loader-options!./OAuthLogin.vue?vue&type=style&index=0&id=54b07a9d&scoped=true&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/OAuthLogin.vue?vue&type=style&index=0&id=54b07a9d&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_OAuthLogin_vue_vue_type_style_index_0_id_54b07a9d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_OAuthLogin_vue_vue_type_style_index_0_id_54b07a9d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_OAuthLogin_vue_vue_type_style_index_0_id_54b07a9d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_OAuthLogin_vue_vue_type_style_index_0_id_54b07a9d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/OAuthLogin.vue?vue&type=template&id=54b07a9d&scoped=true&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/OAuthLogin.vue?vue&type=template&id=54b07a9d&scoped=true& ***!
  \*******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OAuthLogin_vue_vue_type_template_id_54b07a9d_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./OAuthLogin.vue?vue&type=template&id=54b07a9d&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/OAuthLogin.vue?vue&type=template&id=54b07a9d&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OAuthLogin_vue_vue_type_template_id_54b07a9d_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OAuthLogin_vue_vue_type_template_id_54b07a9d_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ 0:
/*!******************************************!*\
  !*** multi ./resources/js/components.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/repos/bristol-su/typeform-service/resources/js/components.js */"./resources/js/components.js");


/***/ }),

/***/ "@bristol-su/frontend-toolkit":
/*!**************************!*\
  !*** external "Toolkit" ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = Toolkit;

/***/ }),

/***/ "vue":
/*!**********************!*\
  !*** external "Vue" ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = Vue;

/***/ })

/******/ });