(()=>{"use strict";function e(e,t,o){return t in e?Object.defineProperty(e,t,{value:o,enumerable:!0,configurable:!0,writable:!0}):e[t]=o,e}var t,o=(t=function(){document.querySelectorAll('[data-kt-ecommerce-catalog-add-product="product_option"]').forEach((function(e){$(e).hasClass("select2-hidden-accessible")||$(e).select2({minimumResultsForSearch:-1})}))},{init:function(){var o,a,n,d,r,c,s,i,l,u,m,_,p;["#kt_ecommerce_add_product_description","#kt_ecommerce_add_product_meta_description"].forEach((function(e){var t=document.querySelector(e);t&&(t=new Quill(e,{modules:{toolbar:[[{header:[1,2,!1]}],["bold","italic","underline"],["image","code-block"]]},placeholder:"Type your text here...",theme:"snow"}))})),["#kt_ecommerce_add_product_category","#kt_ecommerce_add_product_tags"].forEach((function(e){var t=document.querySelector(e);t&&new Tagify(t,{whitelist:["new","trending","sale","discounted","selling fast","last 10"],dropdown:{maxItems:20,classname:"tagify__inline__suggestions",enabled:0,closeOnSelect:!1}})})),o=document.querySelector("#kt_ecommerce_add_product_discount_slider"),a=document.querySelector("#kt_ecommerce_add_product_discount_label"),noUiSlider.create(o,{start:[10],connect:!0,range:{min:1,max:100}}),o.noUiSlider.on("update",(function(e,t){a.innerHTML=Math.round(e[t]),t&&(a.innerHTML=Math.round(e[t]))})),$("#kt_ecommerce_add_product_options").repeater({initEmpty:!1,defaultValues:{"text-input":"foo"},show:function(){$(this).slideDown(),t()},hide:function(e){$(this).slideUp(e)}}),new Dropzone("#kt_ecommerce_add_product_media",{url:"https://keenthemes.com/scripts/void.php",paramName:"file",maxFiles:10,maxFilesize:10,addRemoveLinks:!0,accept:function(e,t){"wow.jpg"==e.name?t("Naha, you don't."):t()}}),t(),function(){var e=document.getElementById("kt_ecommerce_add_product_status"),t=document.getElementById("kt_ecommerce_add_product_status_select"),o=["bg-success","bg-warning","bg-danger"];$(t).on("change",(function(t){switch(t.target.value){case"published":var a;(a=e.classList).remove.apply(a,o),e.classList.add("bg-success"),d();break;case"scheduled":var r;(r=e.classList).remove.apply(r,o),e.classList.add("bg-warning"),n();break;case"inactive":var c;(c=e.classList).remove.apply(c,o),e.classList.add("bg-danger"),d();break;case"draft":var s;(s=e.classList).remove.apply(s,o),e.classList.add("bg-primary"),d()}}));var a=document.getElementById("kt_ecommerce_add_product_status_datepicker");$("#kt_ecommerce_add_product_status_datepicker").flatpickr({enableTime:!0,dateFormat:"Y-m-d H:i"});var n=function(){a.parentNode.classList.remove("d-none")},d=function(){a.parentNode.classList.add("d-none")}}(),n=document.querySelectorAll('[name="method"][type="radio"]'),d=document.querySelector('[data-kt-ecommerce-catalog-add-category="auto-options"]'),n.forEach((function(e){e.addEventListener("change",(function(e){"1"===e.target.value?d.classList.remove("d-none"):d.classList.add("d-none")}))})),r=document.querySelectorAll('input[name="discount_option"]'),c=document.getElementById("kt_ecommerce_add_product_discount_percentage"),s=document.getElementById("kt_ecommerce_add_product_discount_fixed"),r.forEach((function(e){e.addEventListener("change",(function(e){switch(e.target.value){case"2":c.classList.remove("d-none"),s.classList.add("d-none");break;case"3":c.classList.add("d-none"),s.classList.remove("d-none");break;default:c.classList.add("d-none"),s.classList.add("d-none")}}))})),i=document.getElementById("kt_ecommerce_add_product_shipping_checkbox"),l=document.getElementById("kt_ecommerce_add_product_shipping"),i.addEventListener("change",(function(e){e.target.checked?l.classList.remove("d-none"):l.classList.add("d-none")})),_=document.getElementById("kt_ecommerce_add_product_form"),p=document.getElementById("kt_ecommerce_add_product_submit"),m=FormValidation.formValidation(_,{fields:(u={product_name:{validators:{notEmpty:{message:"Product name is required"}}},sku:{validators:{notEmpty:{message:"SKU is required"}}}},e(u,"sku",{validators:{notEmpty:{message:"Product barcode is required"}}}),e(u,"shelf",{validators:{notEmpty:{message:"Shelf quantity is required"}}}),e(u,"price",{validators:{notEmpty:{message:"Product base price is required"}}}),e(u,"tax",{validators:{notEmpty:{message:"Product tax class is required"}}}),u),plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}}),p.addEventListener("click",(function(e){e.preventDefault(),m&&m.validate().then((function(e){console.log("validated!"),"Valid"==e?(p.setAttribute("data-kt-indicator","on"),p.disabled=!0,setTimeout((function(){p.removeAttribute("data-kt-indicator"),Swal.fire({text:"Form has been successfully submitted!",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}}).then((function(e){e.isConfirmed&&(p.disabled=!1,window.location=_.getAttribute("data-kt-redirect"))}))}),2e3)):Swal.fire({html:"Sorry, looks like there are some errors detected, please try again. <br/><br/>Please note that there may be errors in the <strong>General</strong> or <strong>Advanced</strong> tabs",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}})}))}))}});KTUtil.onDOMContentLoaded((function(){o.init()}))})();