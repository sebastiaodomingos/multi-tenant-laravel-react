import{r as i,U as E,t as se}from"./app-DwyRhZ-T.js";var Te=Object.defineProperty,Oe=(e,t,n)=>t in e?Te(e,t,{enumerable:!0,configurable:!0,writable:!0,value:n}):e[t]=n,_=(e,t,n)=>(Oe(e,typeof t!="symbol"?t+"":t,n),n);let je=class{constructor(){_(this,"current",this.detect()),_(this,"handoffState","pending"),_(this,"currentId",0)}set(t){this.current!==t&&(this.handoffState="pending",this.currentId=0,this.current=t)}reset(){this.set(this.detect())}nextId(){return++this.currentId}get isServer(){return this.current==="server"}get isClient(){return this.current==="client"}detect(){return typeof window>"u"||typeof document>"u"?"server":"client"}handoff(){this.handoffState==="pending"&&(this.handoffState="complete")}get isHandoffComplete(){return this.handoffState==="complete"}},U=new je;function Pe(e){typeof queueMicrotask=="function"?queueMicrotask(e):Promise.resolve().then(e).catch(t=>setTimeout(()=>{throw t}))}function q(){let e=[],t={addEventListener(n,r,l,s){return n.addEventListener(r,l,s),t.add(()=>n.removeEventListener(r,l,s))},requestAnimationFrame(...n){let r=requestAnimationFrame(...n);return t.add(()=>cancelAnimationFrame(r))},nextFrame(...n){return t.requestAnimationFrame(()=>t.requestAnimationFrame(...n))},setTimeout(...n){let r=setTimeout(...n);return t.add(()=>clearTimeout(r))},microTask(...n){let r={current:!0};return Pe(()=>{r.current&&n[0]()}),t.add(()=>{r.current=!1})},style(n,r,l){let s=n.style.getPropertyValue(r);return Object.assign(n.style,{[r]:l}),this.add(()=>{Object.assign(n.style,{[r]:s})})},group(n){let r=q();return n(r),this.add(()=>r.dispose())},add(n){return e.includes(n)||e.push(n),()=>{let r=e.indexOf(n);if(r>=0)for(let l of e.splice(r,1))l()}},dispose(){for(let n of e.splice(0))n()}};return t}function oe(){let[e]=i.useState(q);return i.useEffect(()=>()=>e.dispose(),[e]),e}let O=(e,t)=>{U.isServer?i.useEffect(e,t):i.useLayoutEffect(e,t)};function ue(e){let t=i.useRef(e);return O(()=>{t.current=e},[e]),t}let $=function(e){let t=ue(e);return E.useCallback((...n)=>t.current(...n),[t])};function G(...e){return Array.from(new Set(e.flatMap(t=>typeof t=="string"?t.split(" "):[]))).filter(Boolean).join(" ")}function I(e,t,...n){if(e in t){let l=t[e];return typeof l=="function"?l(...n):l}let r=new Error(`Tried to handle "${e}" but there is no handler defined. Only defined handlers are: ${Object.keys(t).map(l=>`"${l}"`).join(", ")}.`);throw Error.captureStackTrace&&Error.captureStackTrace(r,I),r}var ce=(e=>(e[e.None=0]="None",e[e.RenderStrategy=1]="RenderStrategy",e[e.Static=2]="Static",e))(ce||{}),T=(e=>(e[e.Unmount=0]="Unmount",e[e.Hidden=1]="Hidden",e))(T||{});function fe({ourProps:e,theirProps:t,slot:n,defaultTag:r,features:l,visible:s=!0,name:f,mergeRefs:d}){d=d??Re;let a=de(t,e);if(s)return M(a,n,r,f,d);let m=l??0;if(m&2){let{static:u=!1,...p}=a;if(u)return M(p,n,r,f,d)}if(m&1){let{unmount:u=!0,...p}=a;return I(u?0:1,{0(){return null},1(){return M({...p,hidden:!0,style:{display:"none"}},n,r,f,d)}})}return M(a,n,r,f,d)}function M(e,t={},n,r,l){let{as:s=n,children:f,refName:d="ref",...a}=z(e,["unmount","static"]),m=e.ref!==void 0?{[d]:e.ref}:{},u=typeof f=="function"?f(t):f;"className"in a&&a.className&&typeof a.className=="function"&&(a.className=a.className(t)),a["aria-labelledby"]&&a["aria-labelledby"]===a.id&&(a["aria-labelledby"]=void 0);let p={};if(t){let g=!1,c=[];for(let[o,v]of Object.entries(t))typeof v=="boolean"&&(g=!0),v===!0&&c.push(o.replace(/([A-Z])/g,h=>`-${h.toLowerCase()}`));if(g){p["data-headlessui-state"]=c.join(" ");for(let o of c)p[`data-${o}`]=""}}if(s===i.Fragment&&(Object.keys(j(a)).length>0||Object.keys(j(p)).length>0))if(!i.isValidElement(u)||Array.isArray(u)&&u.length>1){if(Object.keys(j(a)).length>0)throw new Error(['Passing props on "Fragment"!',"",`The current component <${r} /> is rendering a "Fragment".`,"However we need to passthrough the following props:",Object.keys(j(a)).concat(Object.keys(j(p))).map(g=>`  - ${g}`).join(`
`),"","You can apply a few solutions:",['Add an `as="..."` prop, to ensure that we render an actual element instead of a "Fragment".',"Render a single element as the child so that we can forward the props onto that element."].map(g=>`  - ${g}`).join(`
`)].join(`
`))}else{let g=u.props,c=g==null?void 0:g.className,o=typeof c=="function"?(...C)=>G(c(...C),a.className):G(c,a.className),v=o?{className:o}:{},h=de(u.props,j(z(a,["ref"])));for(let C in p)C in h&&delete p[C];return i.cloneElement(u,Object.assign({},h,p,m,{ref:l(u.ref,m.ref)},v))}return i.createElement(s,Object.assign({},z(a,["ref"]),s!==i.Fragment&&m,s!==i.Fragment&&p),u)}function Re(...e){return e.every(t=>t==null)?void 0:t=>{for(let n of e)n!=null&&(typeof n=="function"?n(t):n.current=t)}}function de(...e){if(e.length===0)return{};if(e.length===1)return e[0];let t={},n={};for(let r of e)for(let l in r)l.startsWith("on")&&typeof r[l]=="function"?(n[l]!=null||(n[l]=[]),n[l].push(r[l])):t[l]=r[l];if(t.disabled||t["aria-disabled"])for(let r in n)/^(on(?:Click|Pointer|Mouse|Key)(?:Down|Up|Press)?)$/.test(r)&&(n[r]=[l=>{var s;return(s=l==null?void 0:l.preventDefault)==null?void 0:s.call(l)}]);for(let r in n)Object.assign(t,{[r](l,...s){let f=n[r];for(let d of f){if((l instanceof Event||(l==null?void 0:l.nativeEvent)instanceof Event)&&l.defaultPrevented)return;d(l,...s)}}});return t}function J(e){var t;return Object.assign(i.forwardRef(e),{displayName:(t=e.displayName)!=null?t:e.name})}function j(e){let t=Object.assign({},e);for(let n in t)t[n]===void 0&&delete t[n];return t}function z(e,t=[]){let n=Object.assign({},e);for(let r of t)r in n&&delete n[r];return n}let me=Symbol();function ze(e,t=!0){return Object.assign(e,{[me]:t})}function he(...e){let t=i.useRef(e);i.useEffect(()=>{t.current=e},[e]);let n=$(r=>{for(let l of t.current)l!=null&&(typeof l=="function"?l(r):l.current=r)});return e.every(r=>r==null||(r==null?void 0:r[me]))?void 0:n}function Ne(e=0){let[t,n]=i.useState(e),r=i.useCallback(a=>n(a),[t]),l=i.useCallback(a=>n(m=>m|a),[t]),s=i.useCallback(a=>(t&a)===a,[t]),f=i.useCallback(a=>n(m=>m&~a),[n]),d=i.useCallback(a=>n(m=>m^a),[n]);return{flags:t,setFlag:r,addFlag:l,hasFlag:s,removeFlag:f,toggleFlag:d}}var Ae=(e=>(e[e.None=0]="None",e[e.Closed=1]="Closed",e[e.Enter=2]="Enter",e[e.Leave=4]="Leave",e))(Ae||{});function ke(e){let t={};for(let n in e)e[n]===!0&&(t[`data-${n}`]="");return t}function xe(e,t,n,r){let[l,s]=i.useState(n),{hasFlag:f,addFlag:d,removeFlag:a}=Ne(e&&l?3:0),m=i.useRef(!1),u=i.useRef(!1),p=oe();return O(()=>{var g;if(e){if(n&&s(!0),!t){n&&d(3);return}return(g=r==null?void 0:r.start)==null||g.call(r,n),He(t,{inFlight:m,prepare(){u.current?u.current=!1:u.current=m.current,m.current=!0,!u.current&&(n?(d(3),a(4)):(d(4),a(2)))},run(){u.current?n?(a(3),d(4)):(a(4),d(3)):n?a(1):d(1)},done(){var c;u.current&&typeof t.getAnimations=="function"&&t.getAnimations().length>0||(m.current=!1,a(7),n||s(!1),(c=r==null?void 0:r.end)==null||c.call(r,n))}})}},[e,n,t,p]),e?[l,{closed:f(1),enter:f(2),leave:f(4),transition:f(2)||f(4)}]:[n,{closed:void 0,enter:void 0,leave:void 0,transition:void 0}]}function He(e,{prepare:t,run:n,done:r,inFlight:l}){let s=q();return Me(e,{prepare:t,inFlight:l}),s.nextFrame(()=>{n(),s.requestAnimationFrame(()=>{s.add(Le(e,r))})}),s.dispose}function Le(e,t){let n=q();if(!e)return n.dispose;let r=!1;n.add(()=>{r=!0});let l=e.getAnimations().filter(s=>s instanceof CSSTransition);return l.length===0?(t(),n.dispose):(Promise.allSettled(l.map(s=>s.finished)).then(()=>{r||t()}),n.dispose)}function Me(e,{inFlight:t,prepare:n}){if(t!=null&&t.current){n();return}let r=e.style.transition;e.style.transition="none",n(),e.offsetHeight,e.style.transition=r}let D=i.createContext(null);D.displayName="OpenClosedContext";var P=(e=>(e[e.Open=1]="Open",e[e.Closed=2]="Closed",e[e.Closing=4]="Closing",e[e.Opening=8]="Opening",e))(P||{});function pe(){return i.useContext(D)}function Ue({value:e,children:t}){return E.createElement(D.Provider,{value:e},t)}function Ge({children:e}){return E.createElement(D.Provider,{value:null},e)}function qe(){let e=typeof document>"u";return"useSyncExternalStore"in se?(t=>t.useSyncExternalStore)(se)(()=>()=>{},()=>!1,()=>!e):!1}function ve(){let e=qe(),[t,n]=i.useState(U.isHandoffComplete);return t&&U.isHandoffComplete===!1&&n(!1),i.useEffect(()=>{t!==!0&&n(!0)},[t]),i.useEffect(()=>U.handoff(),[]),e?!1:t}function Ie(){let e=i.useRef(!1);return O(()=>(e.current=!0,()=>{e.current=!1}),[]),e}function ge(e){var t;return!!(e.enter||e.enterFrom||e.enterTo||e.leave||e.leaveFrom||e.leaveTo)||((t=e.as)!=null?t:ye)!==i.Fragment||E.Children.count(e.children)===1}let V=i.createContext(null);V.displayName="TransitionContext";var De=(e=>(e.Visible="visible",e.Hidden="hidden",e))(De||{});function Ve(){let e=i.useContext(V);if(e===null)throw new Error("A <Transition.Child /> is used but it is missing a parent <Transition /> or <Transition.Root />.");return e}function We(){let e=i.useContext(W);if(e===null)throw new Error("A <Transition.Child /> is used but it is missing a parent <Transition /> or <Transition.Root />.");return e}let W=i.createContext(null);W.displayName="NestingContext";function X(e){return"children"in e?X(e.children):e.current.filter(({el:t})=>t.current!==null).filter(({state:t})=>t==="visible").length>0}function be(e,t){let n=ue(e),r=i.useRef([]),l=Ie(),s=oe(),f=$((c,o=T.Hidden)=>{let v=r.current.findIndex(({el:h})=>h===c);v!==-1&&(I(o,{[T.Unmount](){r.current.splice(v,1)},[T.Hidden](){r.current[v].state="hidden"}}),s.microTask(()=>{var h;!X(r)&&l.current&&((h=n.current)==null||h.call(n))}))}),d=$(c=>{let o=r.current.find(({el:v})=>v===c);return o?o.state!=="visible"&&(o.state="visible"):r.current.push({el:c,state:"visible"}),()=>f(c,T.Unmount)}),a=i.useRef([]),m=i.useRef(Promise.resolve()),u=i.useRef({enter:[],leave:[]}),p=$((c,o,v)=>{a.current.splice(0),t&&(t.chains.current[o]=t.chains.current[o].filter(([h])=>h!==c)),t==null||t.chains.current[o].push([c,new Promise(h=>{a.current.push(h)})]),t==null||t.chains.current[o].push([c,new Promise(h=>{Promise.all(u.current[o].map(([C,R])=>R)).then(()=>h())})]),o==="enter"?m.current=m.current.then(()=>t==null?void 0:t.wait.current).then(()=>v(o)):v(o)}),g=$((c,o,v)=>{Promise.all(u.current[o].splice(0).map(([h,C])=>C)).then(()=>{var h;(h=a.current.shift())==null||h()}).then(()=>v(o))});return i.useMemo(()=>({children:r,register:d,unregister:f,onStart:p,onStop:g,wait:m,chains:u}),[d,f,r,p,g,u,m])}let ye=i.Fragment,Ee=ce.RenderStrategy;function Xe(e,t){var n,r;let{transition:l=!0,beforeEnter:s,afterEnter:f,beforeLeave:d,afterLeave:a,enter:m,enterFrom:u,enterTo:p,entered:g,leave:c,leaveFrom:o,leaveTo:v,...h}=e,[C,R]=i.useState(null),b=i.useRef(null),F=ge(e),Fe=he(...F?[b,t,R]:t===null?[]:[t]),ee=(n=h.unmount)==null||n?T.Unmount:T.Hidden,{show:w,appear:te,initial:ne}=Ve(),[S,B]=i.useState(w?"visible":"hidden"),re=We(),{register:k,unregister:x}=re;O(()=>k(b),[k,b]),O(()=>{if(ee===T.Hidden&&b.current){if(w&&S!=="visible"){B("visible");return}return I(S,{hidden:()=>x(b),visible:()=>k(b)})}},[S,b,k,x,w,ee]);let K=ve();O(()=>{if(F&&K&&S==="visible"&&b.current===null)throw new Error("Did you forget to passthrough the `ref` to the actual DOM node?")},[b,S,K,F]);let we=ne&&!te,le=te&&w&&ne,Y=i.useRef(!1),H=be(()=>{Y.current||(B("hidden"),x(b))},re),ie=$(Z=>{Y.current=!0;let L=Z?"enter":"leave";H.onStart(b,L,A=>{A==="enter"?s==null||s():A==="leave"&&(d==null||d())})}),ae=$(Z=>{let L=Z?"enter":"leave";Y.current=!1,H.onStop(b,L,A=>{A==="enter"?f==null||f():A==="leave"&&(a==null||a())}),L==="leave"&&!X(H)&&(B("hidden"),x(b))});i.useEffect(()=>{F&&l||(ie(w),ae(w))},[w,F,l]);let $e=!(!l||!F||!K||we),[,y]=xe($e,C,w,{start:ie,end:ae}),Se=j({ref:Fe,className:((r=G(h.className,le&&m,le&&u,y.enter&&m,y.enter&&y.closed&&u,y.enter&&!y.closed&&p,y.leave&&c,y.leave&&!y.closed&&o,y.leave&&y.closed&&v,!y.transition&&w&&g))==null?void 0:r.trim())||void 0,...ke(y)}),N=0;return S==="visible"&&(N|=P.Open),S==="hidden"&&(N|=P.Closed),y.enter&&(N|=P.Opening),y.leave&&(N|=P.Closing),E.createElement(W.Provider,{value:H},E.createElement(Ue,{value:N},fe({ourProps:Se,theirProps:h,defaultTag:ye,features:Ee,visible:S==="visible",name:"Transition.Child"})))}function Be(e,t){let{show:n,appear:r=!1,unmount:l=!0,...s}=e,f=i.useRef(null),d=ge(e),a=he(...d?[f,t]:t===null?[]:[t]);ve();let m=pe();if(n===void 0&&m!==null&&(n=(m&P.Open)===P.Open),n===void 0)throw new Error("A <Transition /> is used but it is missing a `show={true | false}` prop.");let[u,p]=i.useState(n?"visible":"hidden"),g=be(()=>{n||p("hidden")}),[c,o]=i.useState(!0),v=i.useRef([n]);O(()=>{c!==!1&&v.current[v.current.length-1]!==n&&(v.current.push(n),o(!1))},[v,n]);let h=i.useMemo(()=>({show:n,appear:r,initial:c}),[n,r,c]);O(()=>{n?p("visible"):!X(g)&&f.current!==null&&p("hidden")},[n,g]);let C={unmount:l},R=$(()=>{var F;c&&o(!1),(F=e.beforeEnter)==null||F.call(e)}),b=$(()=>{var F;c&&o(!1),(F=e.beforeLeave)==null||F.call(e)});return E.createElement(W.Provider,{value:g},E.createElement(V.Provider,{value:h},fe({ourProps:{...C,as:i.Fragment,children:E.createElement(Ce,{ref:a,...C,...s,beforeEnter:R,beforeLeave:b})},theirProps:{},defaultTag:i.Fragment,features:Ee,visible:u==="visible",name:"Transition"})))}function Ke(e,t){let n=i.useContext(V)!==null,r=pe()!==null;return E.createElement(E.Fragment,null,!n&&r?E.createElement(Q,{ref:t,...e}):E.createElement(Ce,{ref:t,...e}))}let Q=J(Be),Ce=J(Xe),Ye=J(Ke),Qe=Object.assign(Q,{Child:Ye,Root:Q});export{fe as H,Ye as L,ce as M,ze as T,J as W,Qe as X,q as a,ue as b,pe as c,Ge as d,Ie as f,P as i,ve as l,O as n,$ as o,oe as p,U as s,Pe as t,I as u,he as y};
