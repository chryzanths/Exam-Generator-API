
let questionNumber = 1;
let questionIndex = 0;
let score = 0;
let noOfQuestions;
const file = 'QandA/des/sample_des.json';
const header = document.getElementById("header")
const qElement = document.getElementById("question");
const aElement = document.getElementById("answerContainer");
const cElement = document.getElementById("correctAnswer");
const submitButton = document.getElementById("submit-button");
const nextButton = document.getElementById("next-button");
let answer;
let selectedAnswer = false;

displayQuestion = () => {
    fetch(file)
        .then(response => response.json())
        .then(data => {
            qElement.innerHTML = data.qna[questionIndex].question;
            answer = data.qna[questionIndex].answer;
            answer = answer.toLowerCase();
        })
        .catch(error => {
            console.error("error", error);
        });
}

getNumberOfQuestions = () => {
    fetch(file)
        .then(response => response.json())
        .then(data => {
            noOfQuestions = data.qna.length;
            header.innerHTML = "Question " + questionNumber + " out of " + noOfQuestions;
        })
        .catch(error => {
            console.error("error", error);
        });
}

submitAnswer = () => {

    aElement.readOnly = true;
    aElement.style.color = "#000000";
    selectedAnswer = aElement.value.toLowerCase();
    score++;

    if(selectedAnswer == answer) {
        aElement.classList.add("correct");
        aElement.style.background = "#C1E1C1";
    } else {
        score--;
        aElement.classList.add("wrong");
        aElement.style.background = "#FAA0A0";
        cElement.innerHTML = `
        <div id="correctAnswerContainer" class="text-center col-md-4 col-md-offset-4 selected">
            <p><strong>Answer: </strong>${answer}</p>
        </div>
        `;
        cElement.style.display = "block";
    }

    console.log(score);
    submitButton.disabled = true;
    nextButton.disabled = false;

    if (questionNumber == noOfQuestions) {
        document.getElementById("viewScore").disabled = false;
        document.getElementById("scoreInput").value = score;
    }

}

clearClass = () => {   
    aElement.style.border = "";
    aElement.style.background = "";
    aElement.className = "form-control";
    aElement.value = "";
    aElement.readOnly = false;
    cElement.style.display = "none";
}

nextQuestion = () => {
    clearClass();
    selectedAnswer = false;
    questionNumber++;
    questionIndex++;
    displayQuestion();
    header.innerHTML = "Question " + questionNumber + " out of " + noOfQuestions;
    submitButton.disabled = false;
    nextButton.disabled = true;

    if(questionNumber == noOfQuestions) {
        let passedScore = score;
        console.log("Passed Score" + passedScore);
        document.getElementById("button-container").innerHTML = `
        <form action="quiz-score.php" method="POST">
            <input id="scoreInput" type="hidden" name="score">
            <input type="hidden" name="noOfQuestions" value="${noOfQuestions}">
            <div class="col-md-2 col-md-offset-2">
                <button id="viewScore" type="submit" class="btn btn-block" disabled >View Score</button>
            </div>";
        </form>
    `;}
}


displayQuestion();
getNumberOfQuestions();

submitButton.addEventListener("click", function() {
    if(aElement.value) {
        submitAnswer();
    } else {
        alert("Please select an answer.");
    }
})
