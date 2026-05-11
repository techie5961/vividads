

function SpaLoader(element){
    // spa loader to be updated nased on script
    let loader=` <div class="spa-loader">
 <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="4" cy="12" r="3"><animate id="spinner_qFRN" begin="0;spinner_OcgL.end+0.25s" attributeName="cy" calcMode="spline" dur="0.6s" values="12;6;12" keySplines=".33,.66,.66,1;.33,0,.66,.33"/></circle><circle cx="12" cy="12" r="3"><animate begin="spinner_qFRN.begin+0.1s" attributeName="cy" calcMode="spline" dur="0.6s" values="12;6;12" keySplines=".33,.66,.66,1;.33,0,.66,.33"/></circle><circle cx="20" cy="12" r="3"><animate id="spinner_OcgL" begin="spinner_qFRN.begin+0.2s" attributeName="cy" calcMode="spline" dur="0.6s" values="12;6;12" keySplines=".33,.66,.66,1;.33,0,.66,.33"/></circle></svg>
      </div>
`;
    element.innerHTML=loader;
}
//  btn loader
function BtnLoader(element){
    // button loaders on submission to be updated based on script
    let loader=` <!--By Sam Herbert (@sherb), for everyone. More @ http://goo.gl/7AJzbL--><!--Todo: add easing--><svg viewBox="0 0 57 60" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><g fill="none" fill-rule="evenodd"><g transform="translate(1 1)" stroke-width="3"><circle cx="5" cy="50" r="5"><animate attributeName="cy" begin="0s" dur="2.2s" values="50;5;50;50" calcMode="linear" repeatCount="indefinite"/><animate attributeName="cx" begin="0s" dur="2.2s" values="5;27;49;5" calcMode="linear" repeatCount="indefinite"/></circle><circle cx="27" cy="5" r="5"><animate attributeName="cy" begin="0s" dur="2.2s" from="5" to="5" values="5;50;50;5" calcMode="linear" repeatCount="indefinite"/><animate attributeName="cx" begin="0s" dur="2.2s" from="27" to="27" values="27;49;5;27" calcMode="linear" repeatCount="indefinite"/></circle><circle cx="49" cy="50" r="5"><animate attributeName="cy" begin="0s" dur="2.2s" values="50;50;5;50" calcMode="linear" repeatCount="indefinite"/><animate attributeName="cx" from="49" to="49" begin="0s" dur="2.2s" values="49;5;27;49" calcMode="linear" repeatCount="indefinite"/></circle></g></g></svg>
     `;
 
    if(!element.classList.contains('active')){
        element.classList.add('active');
    }
    let svg_loader=element.querySelector('.svg-loader');
    if(!svg_loader){
      let div=document.createElement('div');
      div.classList.add('svg-loader');
      div.classList.add('row');
      div.classList.add('align-center');
      div.classList.add('g-10');
      div.innerHTML=loader;  
      
      element.appendChild(div);
    
    }
}
// action loader
function ActionLoader(){
    document.querySelector('.action-loader').classList.remove('display-none');
    document.body.classList.add('overflow-hidden');

}
    // action loader
function HideActionLoader(){
    document.querySelector('.action-loader').classList.add('display-none');
    document.body.classList.remove('overflow-hidden');

}
// wrap button raw text
function WrapBtnText(element) {
  // Go through all child nodes
  element.childNodes.forEach(node => {
    // Only target raw text nodes
    if (node.nodeType === Node.TEXT_NODE) {
      let text = node.textContent.trim();
      if (text.length > 0) {
        // Replace the text node with a span wrapping it
        let span = document.createElement('span');
        span.textContent = text;
        node.replaceWith(span);
      }
    }
  });
}
//  show ball loading
function BallLoad(){
    document.body.classList.add('loading');
}
//  hide ball loading
function HideBallLoad(){
   document.body.classList.remove('loading');
}
function IsJSONABLE(data){
    try{
      JSON.parse(data);
      return true;
    }catch{
        return false;
    }
}
// post request
async function PostRequest(event,element,callback=null,btn_text=null){
  try{
      event.preventDefault();
 let inputs=element.querySelectorAll('.inp.required');
 
 
 let isEmpty = false;

 if(inputs){
    
    
    inputs.forEach((input)=>{
         let cont=input.closest('.cont');
        //  FIRST REMOVE EMPTY STATE
         if(cont){
         
        
            cont.classList.remove('empty');
           
           }else{
          
             input.classList.remove('empty');
            
           }
        //    CHECK FOR EMPTY INPUTS THAT ARE REQUIRED

        if(input.value.trim() == ''){
            isEmpty=true;
          
           
        if(cont){
            cont.classList.add('empty');
            
        }else{
              input.classList.add('empty');
        }
        }

    });
 }
 
 if(!isEmpty){
    // loading state
   let post_btn=element.querySelector('button.post');
   if(post_btn){
    let data_text=post_btn.dataset.text;
    if(!data_text){
        post_btn.dataset.text=post_btn.innerHTML;
    }
     post_btn.classList.toggle('disabled');
     post_btn.innerHTML=btn_text ?? 'Processing...';
   }


    let inps=element.querySelectorAll('.input');
    let form=new FormData();
   
    inps.forEach((inp)=>{
       form.append(inp.name,inp.value);
    });
    // check for photos
    let files=element.querySelectorAll('input[type=file]');
    if(files){
        files.forEach((inp)=>{
            let file=inp.files[0];
            if(file){
                form.append(inp.name,file);
            }
        })
    }

    
    let response=await fetch(element.action,{
        method : 'POST',
        body : form
     });
     
     if(response.ok){
        let data=await response.text();
        
        if(IsJSONABLE(data)){
            let json=JSON.parse(data);
            CreateNotify(json.status,json.message);
        }else{
            CreateNotify('error',data);
        }
        if(callback !== null){
            callback(data,event);
        }
       if(post_btn){
         post_btn.innerHTML=post_btn.dataset.text;
        post_btn.classList.toggle('disabled');
       }
     }else{
        if(post_btn){
         post_btn.innerHTML=post_btn.dataset.text;
        post_btn.classList.toggle('disabled');
       }
        CreateNotify('error','Internal Error: ' + response.status + ' Error');
        
     }
     
 }
  }catch(error){
   HideActionLoader();
    CreateNotify('error',error.stack);
    element.querySelector('button').classList.remove('active');
  }
}

//  hide prompt
function HidePrompt(){
    let conts=document.querySelectorAll('.cont.required');
  if(conts){
      conts.forEach((cont)=>{
        let inp=cont.querySelector('.input');
        inp.addEventListener('focus',()=>{
            conts.forEach((required)=>{
                required.querySelector('.prompt').style.display="none";
            })
        })
    })
  }
}

// create notify
function CreateNotify(status,message){
    let notifies=document.querySelectorAll('.notify');
    if(notifies){
        notifies.forEach((notify)=>{
            notify.remove();
        })
    }
  let section=document.createElement('section');
  section.classList.add('notify');
  section.classList.add(status);

  section.innerHTML=` <div class="row g-5 w-full p-5 body space-between align-center">
           
             <div class="column m-right-auto g-5">
              <strong style="text-transform:capitalize;" class="desc">
            ${status}
        </strong>
            <div class="message">
            ${message}
        </div>
             </div>
        <div onclick="HideNotify()" class="pc-pointer m-bottom-auto no-select" style="font-size:2rem">&times;</div>
        </div>`;
       
       
       
       
        document.body.appendChild(section);
        let RemoveNotify=setTimeout(()=>{
            section.remove();
        },5000);
    
}
function HideNotify(){
  let notify= document.querySelector('.notify');
    if(notify){
     notify.remove();
    }
}
// create notify 2
function CreateNotify2(status,message,data=null){
    let notify2=document.createElement('div');
    notify2.classList.add('notify2');
    let icon;
    let btn_text;
    let btn_function;
    if(data == null){
      btn_text='Understood';
      btn_function=function(){
        notify2.remove();
      }
    }else{
        btn_text = data.btn_text;
        btn_function=data.btn_function;
    }

    if(status == 'success'){
        icon=`<div class="c-green h-70 w-70 bg-green-transparent column justify-center circle">
        <svg width="50" height="50" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z" fill="CurrentColor"></path>
</svg>

    </div>`;
    }else{
        icon=` <div class="c-red h-70 w-70 bg-red-transparent column justify-center circle">
        <svg width="50" height="50" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.96963 8.96965C9.26252 8.67676 9.73739 8.67676 10.0303 8.96965L12 10.9393L13.9696 8.96967C14.2625 8.67678 14.7374 8.67678 15.0303 8.96967C15.3232 9.26256 15.3232 9.73744 15.0303 10.0303L13.0606 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0303 15.0303C9.73742 15.3232 9.26254 15.3232 8.96965 15.0303C8.67676 14.7374 8.67676 14.2625 8.96965 13.9697L10.9393 12L8.96963 10.0303C8.67673 9.73742 8.67673 9.26254 8.96963 8.96965Z" fill="CurrentColor"></path>
</svg>


    </div>`;
    }
    notify2.innerHTML=`
    <section  style="z-index:90000" class="notify2 column p-10 bg-black-transparent justify-center pos-fixed top-0 left-0 bottom-0 right-0 z-index-9000">
<div class="w-full child align-center max-w-500 column br-10 p-10 g-10 bg-light">
    ${icon}
    <strong class="desc">${status}</strong>
    <span>${message}</span>
    <span></span>
<div class="w-full action-btn no-shrink br-10 clip-10 pointer no-select bg-primary primary-text p-10 h-50 row justify-center">${btn_text}</div>

</div>
</section>
    `;
    notify2.querySelector('.action-btn').onclick=function(){
        btn_function();
    }
     document.body.classList.add('overflow-hidden');
    document.body.appendChild(notify2);
}
// hide notify 2
function HideNotify2(){
    document.querySelector('.notify-2').remove();
    document.body.classList.remove('overflow-hidden');
}
// get request
async function GetRequest(event,url,element=null,callback=null){
    try{
        event.preventDefault();
        if(element !== null){
            // WrapBtnText(element);
            // element.classList.add('active');
            // BtnLoader(element);
            ActionLoader();
        }
        let response=await fetch(url);
        if(response.ok){
           
            if(element !== null){
            // element.classList.remove('active');
        }
             if(callback !== null){
                callback(await response.text(),event);
            }
            HideActionLoader();
        } else{
            CreateNotify('error',response.status + ' Error');
           if(element !== null){
            // element.classList.remove('active');
        }
        }
    }catch(error){
        HideActionLoader();
        CreateNotify('error',error.stack);
       if(element !== null){
            // element.classList.remove('active');
        }
    }
}
// search request
async function SearchRequest(event,element,url,result){
    event.preventDefault();
    if(element.value == ''){
        result.classList.add('display-none');
    }else{

       
        let response=await fetch(url);
        if(response.ok){
           
            result.innerHTML=await response.text();
             result.classList.remove('display-none');
        }else{
             result.classList.remove('display-none');
            result.innerHTML=` <a class="row no-u text-dim clip-10 align-center g-5 space-between p-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM80,108a12,12,0,1,1,12,12A12,12,0,0,1,80,108Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,176,108Zm-1.08,64a8,8,0,1,1-13.84,8c-7.47-12.91-19.21-20-33.08-20s-25.61,7.1-33.08,20a8,8,0,1,1-13.84-8c10.29-17.79,27.39-28,46.92-28S164.63,154.2,174.92,172Z"></path></svg>
                 <span class="m-right-auto">${response.status} Error</span>
                   </a>`
        }
    }
    
}
// copy
async function copy(data) {
    // Helper function for fallback copy (works on older iOS)
    function fallbackCopy(text) {
        const textarea = document.createElement('textarea');
        textarea.value = text;
        textarea.style.position = 'fixed';
        textarea.style.top = '-9999px';
        textarea.style.left = '-9999px';
        textarea.style.opacity = '0';
        document.body.appendChild(textarea);
        
        textarea.select();
        textarea.setSelectionRange(0, text.length);
        
        let success = false;
        
            success = document.execCommand('copy');
        
        
        document.body.removeChild(textarea);
        return success;
    }
    
   
        // Try modern Clipboard API first (newer iPhones iOS 13.4+)
        if (navigator.clipboard && window.isSecureContext && navigator.clipboard.writeText) {
            await navigator.clipboard.writeText(data);
            CreateNotify('success', 'Copied successfully');
        } 
        // Fallback for older iPhones (iOS 9-13.3)
        else {
            const success = fallbackCopy(data);
            if (success) {
                CreateNotify('success', 'Copied successfully');
            }
        }
    
}
// show popup
function PopUp(data=null){
    if(data !== null){
        document.querySelector('.popup .child').innerHTML=data;
    }
    document.querySelector('.popup').classList.add('active');
    document.body.classList.add('overflow-hidden');
    document.body.style.overflow="hidden";
}
// hide popup
function HidePopUp(callback=null){
   try{
     document.querySelector('.popup').classList.remove('active');
    document.body.classList.remove('overflow-hidden');
    document.body.style.overflow="auto";
    callback?.();
   }catch(error){
    CreateNotify('error',error.stack);
   }
}
// slideup
function SlideUp(content=null){
    if(content !== null){
        document.querySelector('.slideup .child').innerHTML=content;
    }
    document.querySelector('.slideup').classList.add('active');
    document.body.classList.add('overflow-hidden');
}
//  hide side up
function HideSlideUp(){
      document.querySelector('.slideup').classList.remove('active');
   document.body.classList.remove('overflow-hidden');
}
// stop propagation
function StopPropagation(event){
    event.stopPropagation();
}
// Infinite lloading
function InfiniteLoading(){
  
  let observer=new IntersectionObserver((entries)=>{
    entries.forEach(async (entry)=>{
        if(entry.isIntersecting){
          //  observer.unobserve(entry.target);
            let url=entry.target.dataset.url;
           
           
           let response=await fetch(url);
           if(response.ok){
            let data=await response.text();
         entry.target.outerHTML=data;
        
           //entry.target.remove();
        InfiniteLoading();
           }
        }
    })
  })
//   observe
let element=document.querySelector('.infinite-loading');
if(element){
    observer.observe(element);
}
}
// preview photo
function PreviewPhoto(element,label){
    let file=element.files[0];
    
    if(file){
        label.children[0].style.display='none';
        label.style.backgroundImage=`url('${URL.createObjectURL(file)}')`;
        label.classList.remove('bg');

    }else{
        label.style.backgroundImage='';
        label.children[0].style.display='flex';
         label.classList.add('bg');
    }

}
// hide loading
function HideLoading(){
    let loading=document.querySelector(".loading-state");
    if(loading){
        
        loading.remove()
        
    }
        
   

}
// set vh
function SetWindowHeight(){
    let height=window.innerHeight;
    document.body.style.minHeight=height + 'px';
}
// remove empty class from inputs and conts

function UnEmpty(){
    let inps=document.querySelectorAll('.inp.required');
 //   alert(10)
    if(inps){
        inps.forEach((inp)=>{
           inp.addEventListener('focus',()=>{
             let cont=inp.closest('.cont');
            if(cont){
                cont.classList.remove('empty');
            }else{
                inp.classList.remove('empty');
            }
           })
        })
    }
}


// Store cleanup functions for body-related items only
window._bodyCleanupFunctions = [];

// Register body-specific cleanup
function registerBodyCleanup(cleanupFn) {
    window._bodyCleanupFunctions.push(cleanupFn);
}

// Clean only body-related items before navigation
function cleanupBodyBeforeNavigate() {
    window._bodyCleanupFunctions.forEach(fn => {
        try {
            fn();
        } catch(e) {
            console.error('Body cleanup error:', e);
        }
    });
    window._bodyCleanupFunctions = [];
}

/**
 * SPA ENGINE WITH AUTOMATIC LIFECYCLE CLEANUP
 * -------------------------------------------
 * This script patches global browser functions to track and 
 * automatically remove listeners and timers between page loads.
 */

// 1. REGISTRY: Tracks all active page-level background processes
window.spaRegistry = {
    intervals: new Set(),
    timeouts: new Set(),
    listeners: [],

    // The "Nuke" function to wipe the slate clean
    cleanup() {
        // Clear all tracked intervals
        this.intervals.forEach(id => clearInterval(id));
        this.intervals.clear();

        // Clear all tracked timeouts
        this.timeouts.forEach(id => clearTimeout(id));
        this.timeouts.clear();

        // Remove all tracked event listeners
        this.listeners.forEach(({ target, type, fn, options }) => {
            target.removeEventListener(type, fn, options);
        });
        this.listeners = [];
        
        console.log("SPA: Cleanup complete. Intervals, timeouts, and listeners cleared.");
    }
};

// 2. MONKEY PATCHING: Intercept globals to auto-register them
const nativeInterval = window.setInterval;
const nativeTimeout = window.setTimeout;
const nativeAddListener = window.addEventListener;

window.setInterval = (fn, delay) => {
    const id = nativeInterval(fn, delay);
    window.spaRegistry.intervals.add(id);
    return id;
};

window.setTimeout = (fn, delay) => {
    const id = nativeTimeout(fn, delay);
    window.spaRegistry.timeouts.add(id);
    return id;
};

window.addEventListener = function(type, fn, options) {
    // We track listeners on window and document as they cause the most "leaks"
    if (this === window || this === document) {
        window.spaRegistry.listeners.push({ target: this, type, fn, options });
    }
    nativeAddListener.call(this, type, fn, options);
};

// 3. THE SPA FUNCTION: Handles navigation and surgical DOM updates
async function spa(url) {
    // Start Loading UI
    let bar = document.createElement('div');
    bar.classList.add('loading-bar');
    document.body.appendChild(bar);

    try {
        // Fire Start Events
        document.dispatchEvent(new Event('vitecss:navigate'));

        // Fetch new content
        const response = await fetch(url);
        if (!response.ok) throw new Error('Network response failed');
        
        const data = await response.text();
        const parser = new DOMParser();
        const doc = parser.parseFromString(data, 'text/html');
        // if(doc.querySelector('head').innerHTML != document.querySelector('head').innerHTML){
        //     window.location.href=url;
        //     return;
        // }
        // --- THE CLEANUP PHASE ---
        window.spaRegistry.cleanup();

        // --- THE UPDATE PHASE ---
        
        // Update Title
        document.title = doc.title;

        // Update Styles (Remove old .css styles, inject new ones)
        document.querySelectorAll('head style.css').forEach(s => s.remove());
        doc.querySelectorAll('head style.css').forEach(style => {
            const newStyle = document.createElement('style');
            newStyle.className = 'css';
            newStyle.textContent = style.textContent;
            document.head.appendChild(newStyle);
        });

        // Update Body Content
        document.body.innerHTML = doc.body.innerHTML;

        // Push to History
        history.pushState({ url }, doc.title, url);

        // --- THE RE-ACTIVATION PHASE ---
        
        // Find and re-execute scripts in the new body
        // (Native innerHTML injection doesn't execute <script> tags)
        document.body.querySelectorAll('script').forEach(oldScript => {
            const newScript = document.createElement('script');
            
            // Copy all attributes (src, type, etc.)
            Array.from(oldScript.attributes).forEach(attr => {
                newScript.setAttribute(attr.name, attr.value);
            });
            
            // Copy script content
            newScript.textContent = oldScript.textContent;
            
            // Replace to trigger execution
            oldScript.parentNode.replaceChild(newScript, oldScript);
        });

        // Fire Success Event
        document.dispatchEvent(new Event('vitecss:navigated'));

    } catch (error) {
        console.error('SPA Error:', error);
        document.dispatchEvent(new Event('vitecss:navigate-error'));
    } finally {
        // Remove Loading UI
        if (bar.parentNode) bar.remove();
    }
}

// 4. BROWSER BACK/FORWARD SUPPORT
window.onpopstate = function(event) {
    if (event.state && event.state.url) {
        spa(event.state.url);
    }
};

// Vitecss
window.Vitecss = {
    navigate : (url)=>{
        spa(url)
    }
}
// toggle nav group
function ToggleNavGroup(element){
    let group=element.closest('.group');
    if(group.classList.contains('active')){
 group.classList.remove('active');
    }else{
         group.classList.add('active');
    }
   
}
// toggle nav
function ToggleNav(){
    document.querySelector('nav').classList.add('active');
}
// Hide nav
function HideNav(){
    document.querySelector('nav').classList.remove('active');
}
// auto fill
function AutoFill(val,input,element){
   // alert(10)
   input.value=val;
   if(element !== null){
    element.classList.add('active');
   }


}
// calling functions
function GeneralStyles(){
      document.querySelector('.loading-state').remove();
      
}

window.addEventListener('load',()=>{
    GeneralStyles();
    SetWindowHeight();
    UnEmpty();
    
});




 

