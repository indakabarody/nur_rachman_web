(()=>{"use strict";function t(t,i,e){return i in t?Object.defineProperty(t,i,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[i]=e,t}var i={init:function(){!function(){var i,e=[];function a(){for(e.length>0&&(e=e.slice(1));e.length<250;){var t=(e.length>0?e[e.length-1]:50)+10*Math.random()-5;t<0&&(t=0),t>100&&(t=100),e.push(t)}for(var i=[],a=0;a<e.length;++a)i.push([a,e[a]]);return i}var r=(t(i={colors:[KTUtil.getCssVariableValue("--bs-active-danger"),KTUtil.getCssVariableValue("--bs-active-primary")],series:{shadowSize:1},lines:{show:!0,lineWidth:.5,fill:!0,fillColor:{colors:[{opacity:.1},{opacity:1}]}},yaxis:{min:0,max:100,tickColor:KTUtil.getCssVariableValue("--bs-light-dark"),tickFormatter:function(t){return t+"%"}},xaxis:{show:!1}},"colors",[KTUtil.getCssVariableValue("--bs-active-primary")]),t(i,"grid",{tickColor:KTUtil.getCssVariableValue("--bs-light-dark"),borderWidth:0}),i),l=$.plot($("#kt_docs_flot_dynamic"),[a()],r);!function t(){l.setData([a()]),l.draw(),setTimeout(t,30)}()}()}};KTUtil.onDOMContentLoaded((function(){i.init()}))})();