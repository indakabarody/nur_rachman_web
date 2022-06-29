(()=>{"use strict";var e,t,n,r,o,c,a,l,u=(o=document.getElementById("kt_table_users"),c=function(){o.querySelectorAll('[data-kt-users-table-filter="delete_row"]').forEach((function(t){t.addEventListener("click",(function(t){t.preventDefault();var n=t.target.closest("tr"),r=n.querySelectorAll("td")[1].querySelectorAll("a")[1].innerText;Swal.fire({text:"Are you sure you want to delete "+r+"?",icon:"warning",showCancelButton:!0,buttonsStyling:!1,confirmButtonText:"Yes, delete!",cancelButtonText:"No, cancel",customClass:{confirmButton:"btn fw-bold btn-danger",cancelButton:"btn fw-bold btn-active-light-primary"}}).then((function(t){t.value?Swal.fire({text:"You have deleted "+r+"!.",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn fw-bold btn-primary"}}).then((function(){e.row($(n)).remove().draw()})).then((function(){l()})):"cancel"===t.dismiss&&Swal.fire({text:customerName+" was not deleted.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn fw-bold btn-primary"}})}))}))}))},a=function c(){var a=o.querySelectorAll('[type="checkbox"]');t=document.querySelector('[data-kt-user-table-toolbar="base"]'),n=document.querySelector('[data-kt-user-table-toolbar="selected"]'),r=document.querySelector('[data-kt-user-table-select="selected_count"]');var u=document.querySelector('[data-kt-user-table-select="delete_selected"]');a.forEach((function(e){e.addEventListener("click",(function(){setTimeout((function(){l()}),50)}))})),u.addEventListener("click",(function(){Swal.fire({text:"Are you sure you want to delete selected customers?",icon:"warning",showCancelButton:!0,buttonsStyling:!1,confirmButtonText:"Yes, delete!",cancelButtonText:"No, cancel",customClass:{confirmButton:"btn fw-bold btn-danger",cancelButton:"btn fw-bold btn-active-light-primary"}}).then((function(t){t.value?Swal.fire({text:"You have deleted all selected customers!.",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn fw-bold btn-primary"}}).then((function(){a.forEach((function(t){t.checked&&e.row($(t.closest("tbody tr"))).remove().draw()})),o.querySelectorAll('[type="checkbox"]')[0].checked=!1})).then((function(){l(),c()})):"cancel"===t.dismiss&&Swal.fire({text:"Selected customers was not deleted.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn fw-bold btn-primary"}})}))}))},l=function(){var e=o.querySelectorAll('tbody [type="checkbox"]'),c=!1,a=0;e.forEach((function(e){e.checked&&(c=!0,a++)})),c?(r.innerHTML=a,t.classList.add("d-none"),n.classList.remove("d-none")):(t.classList.remove("d-none"),n.classList.add("d-none"))},{init:function(){var t,n,r;o&&(o.querySelectorAll("tbody tr").forEach((function(e){var t=e.querySelectorAll("td"),n=t[3].innerText.toLowerCase(),r=0,o="minutes";n.includes("yesterday")?(r=1,o="days"):n.includes("mins")?(r=parseInt(n.replace(/\D/g,"")),o="minutes"):n.includes("hours")?(r=parseInt(n.replace(/\D/g,"")),o="hours"):n.includes("days")?(r=parseInt(n.replace(/\D/g,"")),o="days"):n.includes("weeks")&&(r=parseInt(n.replace(/\D/g,"")),o="weeks");var c=moment().subtract(r,o).format();t[3].setAttribute("data-order",c);var a=moment(t[5].innerHTML,"DD MMM YYYY, LT").format();t[5].setAttribute("data-order",a)})),(e=$(o).DataTable({info:!1,order:[],pageLength:10,lengthChange:!1,columnDefs:[{orderable:!1,targets:0},{orderable:!1,targets:6}]})).on("draw",(function(){a(),c(),l()})),a(),document.querySelector('[data-kt-user-table-filter="search"]').addEventListener("keyup",(function(t){e.search(t.target.value).draw()})),document.querySelector('[data-kt-user-table-filter="reset"]').addEventListener("click",(function(){document.querySelector('[data-kt-user-table-filter="form"]').querySelectorAll("select").forEach((function(e){$(e).val("").trigger("change")})),e.search("").draw()})),c(),t=document.querySelector('[data-kt-user-table-filter="form"]'),n=t.querySelector('[data-kt-user-table-filter="filter"]'),r=t.querySelectorAll("select"),n.addEventListener("click",(function(){var t="";r.forEach((function(e,n){e.value&&""!==e.value&&(0!==n&&(t+=" "),t+=e.value)})),e.search(t).draw()})))}});KTUtil.onDOMContentLoaded((function(){u.init()}))})();