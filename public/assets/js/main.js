let humburger = document.querySelector('.menu-bar');
bindElement( humburger,'click',function(){
    let menu = document.querySelector('.nav');
    if(menu.style.display =='block'){
        menu.style.display='none';
    }else{
        menu.style.display='block';
    }
})

/*form validation */
let contactForm = document.querySelector('#contact-form');
bindElement(contactForm,'submit',function(event){
    event.preventDefault();
    let error = false;
    let inputs = document.querySelectorAll('input');
    let textArea = document.querySelector('textarea');
    inputs.forEach(function(e){

        if(e.value.length < 1){
            e.classList.add('border-danger')
            error =true;
        }else{
            e.classList.remove('border-danger')
            error =false;
        }
        if(e.type == 'email'){
        //    if(!e.value.match('$[a-9]@[a-Z].com')){
        //         e.classList.add('border-danger')
        //    }
        }
    });
    if(textArea.value < 5){
            error =true;
            textArea.classList.add('border-danger');
    }else{
            error =false;
            textArea.classList.remove('border-danger');
    }
    if(!error){
        this.submit();
    }
});
document.querySelectorAll('#contact-form input').forEach(function(el){
    el.addEventListener('keyup',function(){
       if(el.value <1){
           el.classList.add('border-danger');
       }else{
            el.classList.remove('border-danger');
       }
    })
})
/********login form********* */
let loginForm = document.getElementById('login-form');
bindElement(loginForm,'submit',function(e){
    e.preventDefault();
    var error = false
    var email = document.querySelector("input[type='text']")
    if((email.value.length < 1)|| !validate('email',email.value)){
        email.classList.add('border-danger');
        email.parentElement.children.item(2).style.display='block';
        error = true;
    }else{
        email.classList.remove('border-danger');
        email.parentElement.children.item(2).style.display='none';
        error = false;
    }
    if(!error){
        this.submit();
    }

})
/*****Registration form *********** */
let regForm = document.querySelector('#reg-form');
bindElement(regForm,'submit',function(e){
    e.preventDefault();
    var inputs = document.querySelectorAll('input');
    var error = 0
    inputs.forEach(function(el){
        if(el.name =='firstName' || el.name =="lastName"){
            if(!validate('string',el.value)){
                formError('add',el)
                error++
            }else{
                formError('remove',el)
            }
        }
        if(el.name == 'phone'){
            if(!validate('phone',el.value)){
                formError('add',el)
                error++
            }else{
                formError('remove',el)
            }
        }
        if(el.name == 'email'){
            if(!validate('email',el.value)){
                formError('add',el)
                error++
            }else{
                formError('remove',el)
            }
        }
        if(el.name=='password'){
        let confirmPassword = inputs.item(5);
            if(!validate('compare',el.value,confirmPassword.value) || !validate('string',el.value)){
                formError('add',el)
                formError('add',confirmPassword)
            }else{
                formError('remove',el)
                formError('remove',confirmPassword)
            }
        }

    })
    if(!error>0){
        this.submit();
    }
})
/**********Video upload form validation ************************ */
let videoForm = document.querySelector('#video-form');
let videoFormInputs = null;
if(videoForm){

    videoFormInputs = videoForm.querySelectorAll('input');

    videoFormInputs.forEach(function(e){
        e.addEventListener('keyup',function(){
            if(e.value.length>=5 && e.classList.contains('border-danger') ){
                e.classList.remove('border-danger');
            }
        })
    })
}
bindElement(videoForm,'submit',function(e){
    e.preventDefault();
    let btn = videoForm.querySelector('button');
    let btnCurrentText = btn.textContent;
    btn.textContent = 'Uploading in progress...'
    btn.disabled = true;
    let error = false;
    videoFormInputs.forEach(function(e){

        if(e.value.length <5 && e.type !='file' && e.type !='hidden'){
            e.classList.add('border-danger')
            error=true;
        }
        if(e.type =='file' && e.value ==''){
            e.classList.add('border-danger');
            error=true;

        }
    })
    if(!error){
        videoForm.submit();
    }else{
    btn.disabled = false;
    btn.textContent = btnCurrentText;
    }
})

/*****************event registration ***************/
let eventForm = document.querySelector('#event-form');
let eventFormInputs = null;
if(eventForm){

    eventFormInputs = eventForm.querySelectorAll('input');
    let image = eventForm.querySelector('#image');
    image.addEventListener('change',function(e){
        let imgTypes = ['image/png','image/jpg','image/jpeg'];
        let img = eventForm.querySelector('.image img');
        img.style.width = '100px';
        img.style.height = '100px';
        let fr = new  FileReader();
        fr.onloadend = function(){
            img.src = fr.result;
        };
        let file = e.target.files[0];
        if(file){
            if(!imgTypes.includes(file.type)){
                alert('invalid image');
                image.classList.add('border-danger');
                img.src = ''
                return
            }else{
                image.classList.remove('border-danger');

            }
            fr.readAsDataURL(e.target.files[0]);
        }else{
            img.src = '';
        }
    });

}
bindElement(eventForm,'submit',function(e){
    e.preventDefault();
    let error= false;
    let btn = eventForm.querySelector('button');
    let oldtext = btn.textContent;
    btn.disabled = true;
    btn.textContent = 'Processing...'
    eventFormInputs.forEach(function(e){
        if(e.value.length <3 && e.type !='file' && e.type !='hidden'){
            e.classList.add('border-danger')
            error=true;
        }
        if(e.type =='file' && e.value ==''){
            e.classList.add('border-danger');
            error=true;

        }
    })
    if(!error){
        payWithPaystack(eventForm);
    }else{

        btn.disabled = false;
        btn.textContent = oldtext;
    }

})
/**
 * Support us form
 */
let supportUs = document.querySelector('#support-us');
if(supportUs!=null){
let supportform = supportUs.querySelector('form');
bindElement(supportform,'submit',function(e){
    e.preventDefault();
    let inputs = supportform.querySelectorAll('input');
    let error = false
    let btn = eventForm.querySelector('button');
    let oldtext = btn.textContent;
    btn.disabled = true;
    btn.textContent = 'Processing...'
    inputs.forEach(function(e){
        if(e.value.trim() == '') {
            e.classList.add('border-danger');
            error = true;
        }else{
            error = false
        }

    })
    if(!error){
        payWithPaystack(supportform);
    }else{
        btn.disabled = false;
        btn.textContent = oldtext;
    }
})
}

/*************add clicks on executives card */
let executives = document.querySelectorAll('.executive-card img');

bindElement(executives,'click',function(){
            executives.forEach(function(e){
                var target  =e.parentElement.querySelector('.executive-card-body')
                target.classList.remove('show');

            })
            var target  =this.parentElement.querySelector('.executive-card-body')

            if(target.classList.contains('show')){
            target.classList.remove('show');
            }else{
                target.classList.add('show');
            }
})

/*************video cards */
let videoCards = document.querySelectorAll('.video-card .card-title');
bindElement(videoCards,'click',function(){
        this.parentElement.classList.add('showfull')
})
/***close */
let close = document.querySelectorAll('.video-card .close');
bindElement(close,'click',function() {
        this.parentElement.classList.toggle('showfull')
        // let els  = document.querySelectorAll('.video-card');
        // els.forEach(function(e){
        //     e.classList.remove('showfull')
        // })
})
let closes = document.querySelectorAll('.executives .close');
bindElement(closes,'click',function() {
        this.parentElement.classList.toggle('show')
        // let els  = document.querySelectorAll('.video-card');
        // els.forEach(function(e){
        //     e.classList.remove('showfull')
        // })
})
function formError(act,el){
    if(act=='add'){
        el.classList.add('border-danger')
    }else{
        el.classList.remove('border-danger')

    }
}

function validate(type,value,compare = null){
    value.trim()
    if(type ==='email'){
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return re.test(value.toLowerCase());
    }
    if(type==='string'){
        return value.length >3;
    }
    if(type ==='compare'){
        return value === compare;
    }
    if(type==='phone'){
        return value.length ==11;
    }
}

function bindElement (el,event,callback){
    if(el !=null ){
        if(el instanceof NodeList){
            el.forEach(function(e){
                e.addEventListener(event,callback)
            })
        }else{

        el.addEventListener(event,callback);
        }
    }
}
