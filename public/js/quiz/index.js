const start_btn = document.querySelector('.start_btn button')
const info_box = document.querySelector('.info_box')
const exit_btn = info_box.querySelector('.buttons .quit')
const continue_btn = info_box.querySelector('.buttons .restart')
const quiz_box = document.querySelector('.quiz_box')
const result_box = document.querySelector('.result_box')
const option_list = document.querySelector('.option_list')
const time_line = document.querySelector('header .time_line')
const timeText = document.querySelector('.timer .time_left_txt')
const timeCount = document.querySelector('.timer .timer_sec')


start_btn.onclick = () => {
    info_box.classList.add('activeInfo')
}
exit_btn.onclick = () => {
    info_box.classList.remove('activeInfo')
}



continue_btn.onclick = () => {
    info_box.classList.remove('activeInfo')
    quiz_box.classList.add('activeQuiz')
    showQuestions(0)
    queCounter(1)
    startTimer(15)
    startTimerLine(0)
}

let timeValue = 15
let que_count = 0
let que_numb = 1
let userScore = 0
let counter
let counterLine
let widthVlue = 0

const restart_quiz = result_box.querySelector('.buttons .restart')
const quit_quiz = result_box.querySelector('.buttons .quit')

restart_quiz.onclick = () =>{
    quiz_box.classList.add('activeQuiz')
    result_box.classList.remove('activeResult')
    timeValue = 15
    que_count = 0
    que_numb = 1
    userScore = 0
    widthVlue = 0
    showQuestions(que_count)
    queCounter(que_numb)
    clearInterval(counter)
    clearInterval(counterLine)
    startTimer(timeValue)
    startTimerLine(widthVlue)
    timeText.textContent = 'زمان باقی مانده'
    next_btn.classList.remove('show')
}

quit_quiz.onclick = ()=>{
    window.location.reload()
}

const next_btn = document.querySelector('footer .next_btn')
const bottom_ques_counter = document.querySelector('footer .total_que')

next_btn.onclick = ()=>{
    if(
        que_count < questions.length - 1){
            que_count++
            que_numb++
            showQuestions(que_count)
            queCounter(que_numb)
            clearInterval(counter)
            clearInterval(counterLine)
            startTimer(timeValue)
            startTimerLine(widthVlue)
            timeText.textContent = 'زمان باقی مانده'
            next_btn.classList.remove('show')
        }else{
            clearInterval(counter)
            clearInterval(counterLine)
            showResult()
        }
}

function showQuestions(index){
    const que_text = document.querySelector('.que_text')

    let que_tag = '<span>'+ questions[index].numb + ". " + questions[index].question + '</span>'
    let option_tag = '<div class="option"><span>'+ questions[index].options[0]+ '</span></div>'
    + '<div class="option"><span>'+ questions[index].options[1]+ '</span></div>'
    + '<div class="option"><span>'+ questions[index].options[2]+ '</span></div>'
    + '<div class="option"><span>'+ questions[index].options[3]+ '</span></div>'
    que_text.innerHTML = que_tag
    option_list.innerHTML = option_tag

    const option =  option_list.querySelectorAll('.option')

    for(i=0; i < option.length; i++){
        option[i].setAttribute('onclick','optionSelected(this)')
    }
}

let tickIconTag = '<div class="icon tick"><i class="bi bi-check-lg"></i></div>'
let crossIconTag = '<div class="icon cross"><i class="bi bi-x-lg"></i></div>'

function optionSelected(answer){
    clearInterval(counter)
    clearInterval(counterLine)
    let userAns = answer.textContent
    let correcAns = questions[que_count].answer
    const allOption = option_list.children.length

    if(userAns == correcAns){
        userScore += 1
        answer.classList.add('correct')
        answer.insertAdjacentHTML('beforeend', tickIconTag)

    }else{
        answer.classList.add('incorrect')
        answer.insertAdjacentHTML('beforeend', crossIconTag)

        //for(i=0; i < allOption; i++){
        //    if(option_list.children[i].textContent == correcAns){
        //        option_list.children[i].setAttribute('class', 'option correct')
        //        option_list.children[i].insertAdjacentHTML('beforeend', tickIconTag)

          //  }
       // }
    }
    for(i=0; i < allOption; i++){
        option_list.children[i].classList.add('disabled')
    }
    next_btn.classList.add('show')
}


function showResult(){
    info_box.classList.remove('activeInfo')
    quiz_box.classList.remove('activeQuiz')
    result_box.classList.add('activeResult')
    const scoreText = result_box.querySelector('.score_text')

    if(userScore > 3){
        let scroeTag = '<span> تبریک! 🎉، شما <p>'+ userScore + '</p>  از <p> '+ questions.length + '</p> دریافت کردید</span>'
        scoreText.innerHTML = scroeTag
    }else if(userScore > 1){
        let scroeTag = '<span> خوب 😉، شما <p>'+ userScore + '</p>  از <p> '+ questions.length + '</p>دریافت کردید</span>'
        scoreText.innerHTML = scroeTag
    }else{
        let scroeTag = '<span> متاسفم 🫤، شما <p>'+ userScore + '</p>  از <p> '+ questions.length + '</p>دریافت کردید</span>'
        scoreText.innerHTML = scroeTag
    }
//==================================
   /* let correctAnswersTag = '<div class="correct_answers"><h3>پاسخ‌های صحیح:</h3>';
    for (let i = 0; i < questions.length; i++) {
        correctAnswersTag += '<div class="each_answer"><span>'+ questions[i].numb + ". " + questions[i].question + '</span><span>'+ questions[i].answer + '</span></div>';
    }
    correctAnswersTag += '</div>';

    scoreText.insertAdjacentHTML('beforeend', correctAnswersTag);*/
//==================================
}

function startTimer(time){
    counter = setInterval(timer, 1000)
    function timer(){
        timeCount.textContent = time
        time--
        if(time < 9){
            let addZero = timeCount.textContent
            timeCount.textContent = '0' + addZero
        }
        if(time < 0){
            clearInterval(counter)
            timeText.textContent = 'پایان زمان'
            const allOption = option_list.children.length
            let correcAns = questions[que_count].answer
           /* for(i=0; i < allOption; i++){
                if(option_list.children[i].textContent ==correcAns){
                    option_list.children[i].setAttribute('class', 'option correct')
                    option_list.children[i].insertAdjacentHTML('beforeend', tickIconTag)

                }
            }*/
            for(i=0; i < allOption; i++){
                option_list.children[i].classList.add('disabled')
            }
            next_btn.classList.add('show')
        }
    }
}
        function startTimerLine(time){
            counterLine = setInterval(timer, 29)
            function timer(){
                time += 1
                time_line.style.width = time + "px"
                if(time > 549){
                    clearInterval(counterLine)
                }
            }
        }

        function queCounter(index){
            let totalQueCounTag = '<span>سوال <p>' + index  + '</p>.  از  <p>' + questions.length + '</p></span>'
            bottom_ques_counter.innerHTML = totalQueCounTag
        }
