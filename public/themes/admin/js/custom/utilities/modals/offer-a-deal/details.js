(()=>{"use strict";var e={8941:e=>{var t,a,i,r,o,l={init:function(){r=KTModalOfferADeal.getForm(),o=KTModalOfferADeal.getStepperObj(),t=KTModalOfferADeal.getStepper().querySelector('[data-kt-element="details-next"]'),a=KTModalOfferADeal.getStepper().querySelector('[data-kt-element="details-previous"]'),$(r.querySelector('[name="details_activation_date"]')).flatpickr({enableTime:!0,dateFormat:"d, M Y, H:i"}),$(r.querySelector('[name="details_customer"]')).on("change",(function(){i.revalidateField("details_customer")})),i=FormValidation.formValidation(r,{fields:{details_customer:{validators:{notEmpty:{message:"Customer is required"}}},details_title:{validators:{notEmpty:{message:"Deal title is required"}}},details_activation_date:{validators:{notEmpty:{message:"Activation date is required"}}},"details_notifications[]":{validators:{notEmpty:{message:"Notifications are required"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}}),t.addEventListener("click",(function(e){e.preventDefault(),t.disabled=!0,i&&i.validate().then((function(e){console.log("validated!"),"Valid"==e?(t.setAttribute("data-kt-indicator","on"),setTimeout((function(){t.removeAttribute("data-kt-indicator"),t.disabled=!1,o.goNext()}),1500)):(t.disabled=!1,Swal.fire({text:"Sorry, looks like there are some errors detected, please try again.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}}))}))})),a.addEventListener("click",(function(){o.goPrevious()}))}};void 0!==e.exports&&(window.KTModalOfferADealDetails=e.exports=l)}},t={};(function a(i){var r=t[i];if(void 0!==r)return r.exports;var o=t[i]={exports:{}};return e[i](o,o.exports,a),o.exports})(8941)})();