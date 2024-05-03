
let questionNumber = 1;
let questionIndex = 0;
let score = 0;
let noOfQuestions;
const file = 'QandA/tof/sample_tof.json';
const header = document.getElementById("header")
const qElement = document.getElementById("question");
const tElement = document.getElementById("true");
const fElement = document.getElementById("false");
const submitButton = document.getElementById("submit-button");
const nextButton = document.getElementById("next-button");
let answer;
let selectedAnswer = false;

displayQuestion = () => {
    fetch(file)
        .then(response => response.json())
        .then(data => {
            qElement.innerHTML = data.qna[questionIndex].question;
            answer = data.qna[questionIndex].answer == "true" ? "0" : "1";
            console.log(answer);
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

    console.log("submitted answer =" + selectedAnswer)

    score++;
    getButton(answer).classList.add("correct");

    if(selectedAnswer != answer) {
        getButton(selectedAnswer).classList.add("wrong");
        score--;
    }

    console.log(score);
    submitButton.disabled = true;
    nextButton.disabled = false;

    if (questionNumber == noOfQuestions) {
        document.getElementById("viewScore").disabled = false;
        document.getElementById("scoreInput").value = score;
    }

}

getButton = (number) => {
    switch(number){
        case "0": return tElement;
        case "1": return fElement;
    }
}

selectChoice = (choiceElement) => {
    if (selectedAnswer) {
        getButton(selectedAnswer).classList.remove('selected');
    }
    selectedAnswer = choiceElement.value;
    choiceElement.classList.add('selected');
}

clearClass = () => {
    tElement.className = "sm-box";
    fElement.className = "sm-box";
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
    if(selectedAnswer) {
        submitAnswer();
    } else {
        alert("Please select an answer.");
    }
})
