
let currentQuestionIndex = 0; 
let score = 0; 

function highlightActivePage() {
    const path = window.location.pathname;

    if (path.includes('home')) {
        document.getElementById('input-3').checked = true;
    } else if (path.includes('listings')) {
        document.getElementById('input-2').checked = true;
    } else if (path.includes('skills')) {
        document.getElementById('input-1').checked = true;
    } else if (path.includes('chat')) {
        document.getElementById('input-4').checked = true;
    } else if (path.includes('profile')) {
        document.getElementById('input-5').checked = true;
    }
}

window.onload = highlightActivePage;

let c, py, js, c_button1, c_button2, c_button3, main_div, c_beginner, c_intermediate, c_advanced, c_div;


document.addEventListener("DOMContentLoaded", () => {
    c = document.getElementById("c");
    py = document.getElementById("py");
    js = document.getElementById("js");
    c_button1 = document.getElementById("c-button1");
    c_button2 = document.getElementById("c-button2");
    c_button3 = document.getElementById("c-button3");
    p_button1 = document.getElementById("p-button1");
    p_button2 = document.getElementById("p-button2");
    p_button3 = document.getElementById("p-button3");
    j_button1 = document.getElementById("j-button1");
    j_button2 = document.getElementById("j-button2");
    j_button3 = document.getElementById("j-button3");
    main_div = document.querySelector(".choose-skills");
    c_beginner = document.querySelector(".c-beginner");
    c_intermediate = document.querySelector(".c-intermediate");
    c_advanced = document.querySelector(".c-advanced");
    p_beginner = document.querySelector(".p-beginner");
    p_intermediate = document.querySelector(".p-intermediate");
    p_advanced = document.querySelector(".p-advanced");
    j_beginner = document.querySelector(".j-beginner");
    j_intermediate = document.querySelector(".j-intermediate");
    j_advanced = document.querySelector(".j-advanced");
    c_div = document.querySelector(".c-div");
    p_div = document.querySelector(".p-div");
    j_div = document.querySelector(".j-div");
    





    c.addEventListener("click", () => {
        main_div.style.display = "none";
        c_div.style.display = "block";
        // document.body.style.backgroundImage = "url('./assets/images/ruby1.jpg')";
        // document.body.style.backgroundSize = "cover";
        // document.body.style.backgroundPosition = "center";
    });
    c_button1.addEventListener("click", () => {
        c_div.style.display = "none";
        c_beginner.style.display = "block";
        startCBeginnerQuiz(); 
    });
    c_button2.addEventListener("click", () => {
        c_div.style.display = "none";
        c_intermediate.style.display = "block";
        startCIntermediateQuiz(); 
    });
    c_button3.addEventListener("click", () => {
        c_div.style.display = "none";
        c_advanced.style.display = "block";
        startCAdvancedQuiz();
    });




    py.addEventListener("click", () => {
        main_div.style.display = "none";
        p_div.style.display = "block";
    });
    p_button1.addEventListener("click", () => {
        p_div.style.display = "none";
        p_beginner.style.display = "block";
        startPBeginnerQuiz(); 
    });
    p_button2.addEventListener("click", () => {
        p_div.style.display = "none";
        p_intermediate.style.display = "block";
        startPIntermediateQuiz(); 
    });
    p_button3.addEventListener("click", () => {
        p_div.style.display = "none";
        p_advanced.style.display = "block";
        startPAdvancedQuiz();
    });




    js.addEventListener("click", () => {
        main_div.style.display = "none";
        j_div.style.display = "block";
    });
    j_button1.addEventListener("click", () => {
        j_div.style.display = "none";
        j_beginner.style.display = "block";
        startJBeginnerQuiz(); 
    });
    j_button2.addEventListener("click", () => {
        j_div.style.display = "none";
        j_intermediate.style.display = "block";
        startJIntermediateQuiz(); 
    });
    j_button3.addEventListener("click", () => {
        j_div.style.display = "none";
        j_advanced.style.display = "block";
        startJAdvancedQuiz();
    });
});

//BEGINNER-C QUIZ
const questions = [
    {
        question: "What will be the output of the following code?<br>int x = 5;<br>int y = 10;<br>std::cout << x + y;",
        answers: [
            { text: "15", correct: true },
            { text: "10", correct: false },
            { text: "5", correct: false },
            { text: "50", correct: false },
        ]
    },
    {
        question: "Which keyword is used to declare an integer in C++?",
        answers: [
            { text: "let", correct: false },
            { text: "int", correct: true },
            { text: "var", correct: false },
            { text: "function", correct: false },
        ]
    },
    {
        question: "What symbol is used to end a statement in C++?",
        answers: [
            { text: ".", correct: false },
            { text: ":", correct: false },
            { text: ";", correct: true },
            { text: ",", correct: false },
        ]
    },
    {
        question: "What will be the output of this code?<br>std::cout << \"Hello World\";",
        answers: [
            { text: "Hello World", correct: true },
            { text: "\"Hello World\"", correct: false },
            { text: "Error", correct: false },
            { text: "Hello", correct: false },
        ]
    },
    {
        question: "Which of the following is used for single-line comments in C++?",
        answers: [
            { text: "//", correct: true },
            { text: "/*", correct: false },
            { text: "*/", correct: false },
            { text: "#", correct: false },
        ]
    },
    {
        question: "What will be the output of this code?<br>int a = 8;<br>int b = 3;<br>std::cout << a - b;",
        answers: [
            { text: "5", correct: true },
            { text: "11", correct: false },
            { text: "3", correct: false },
            { text: "8", correct: false },
        ]
    },
    {
        question: "Which of the following is NOT a valid C++ data type?",
        answers: [
            { text: "float", correct: false },
            { text: "double", correct: false },
            { text: "int", correct: false },
            { text: "stringify", correct: true },
        ]
    },
    {
        question: "What will be the output of this code?<br>int x = 4;<br>x += 5;<br>std::cout << x;",
        answers: [
            { text: "9", correct: true },
            { text: "4", correct: false },
            { text: "5", correct: false },
            { text: "10", correct: false },
        ]
    },
    {
        question: "Which header file is required to use the std::cout function?",
        answers: [
            { text: "iostream", correct: true },
            { text: "string", correct: false },
            { text: "cstdlib", correct: false },
            { text: "vector", correct: false },
        ]
    },
    {
        question: "What will be the output of the following code?<br>int x = 2 * 3 + 5;<br>std::cout << x;",
        answers: [
            { text: "11", correct: true },
            { text: "16", correct: false },
            { text: "10", correct: false },
            { text: "12", correct: false },
        ]
    },
];



const questionElement = document.getElementById("c-beginner-question");
const answerButton = document.getElementById("c-beginner-answer-buttons");
const nextButton = document.getElementById("c-beginner-next-btn");
const backButton=document.getElementById("c-beginner-back-btn");

function startCBeginnerQuiz() {
    currentQuestionIndex = 0; 
    score = 0; 
    nextButton.innerHTML = "Next"; 
    backButton.innerHTML="Return";
    showQuestion(); 
}

function showQuestion() {
    resetState(); 
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        button.addEventListener("click", () => selectAnswer(answer));
        answerButton.appendChild(button);
    });
}

function resetState() {
    backButton.style.display = "none";
    nextButton.style.display = "none"; 
    answerButton.innerHTML = ""; 
}

function selectAnswer(answer) {
   
    if (answer.correct) {
        score++;
    }

    
    nextButton.style.display = "block";
}


nextButton.addEventListener("click", () => {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestion();
    } else {
        
        let message;
        if (score < 3) {
            message = "weh weh weh";
        } else if (score >= 3 && score <= 7) {
            message = "hmm crazy";
        } else {
            message = "good.";
        }

       
        questionElement.innerHTML = "<br>You scored " + score + " out of " + questions.length + "!" + "<br>" + message;
        answerButton.innerHTML = ""; 
        nextButton.style.display = "none"; 
        backButton.style.display="block";
    }
});
backButton.addEventListener("click", ()=>{
    console.log("back");
    c_beginner.style.display="none";
    main_div.style.display="block";
});


//INTERMEDIATE-C QUIZ
const questions1 = [
    {
        question1: "What is the return type of a function that does not return a value?",
        answers1: [
            { text1: "void", correct: true },
            { text1: "int", correct: false },
            { text1: "char", correct: false },
            { text1: "none", correct: false },
        ]
    },
    {
        question1: "What is a function pointer?",
        answers1: [
            { text1: "Pointer to a function", correct: true },
            { text1: "Function that returns a pointer", correct: false },
            { text1: "Array of functions", correct: false },
            { text1: "Function that takes a pointer", correct: false },
        ]
    },
    {
        question1: "What is the purpose of 'const' in function parameters?",
        answers1: [
            { text1: "To prevent modification", correct: true },
            { text1: "To define a constant", correct: false },
            { text1: "To create a pointer", correct: false },
            { text1: "To specify type", correct: false },
        ]
    },
    {
        question1: "What is a lambda function in C++?",
        answers1: [
            { text1: "A function without a name", correct: true },
            { text1: "A type of variable", correct: false },
            { text1: "A function with parameters", correct: false },
            { text1: "A global function", correct: false },
        ]
    },
    {
        question1: "How can you pass an array to a function?",
        answers1: [
            { text1: "By using its name", correct: true },
            { text1: "By value only", correct: false },
            { text1: "By reference only", correct: false },
            { text1: "By size", correct: false },
        ]
    },
    {
        question1: "What does the keyword 'inline' do?",
        answers1: [
            { text1: "Suggests compiler to inline code", correct: true },
            { text1: "Defines a constant", correct: false },
            { text1: "Marks a function as virtual", correct: false },
            { text1: "Creates a template", correct: false },
        ]
    },
    {
        question1: "What is function overloading?",
        answers1: [
            { text1: "Same name, different parameters", correct: true },
            { text1: "Same name, same parameters", correct: false },
            { text1: "Same return type", correct: false },
            { text1: "Different names, same parameters", correct: false },
        ]
    },
    {
        question1: "What is the use of 'default' parameters?",
        answers1: [
            { text1: "Provide default values", correct: true },
            { text1: "Indicate const values", correct: false },
            { text1: "Specify types", correct: false },
            { text1: "Define templates", correct: false },
        ]
    },
    {
        question1: "What is the purpose of 'return' statement?",
        answers1: [
            { text1: "To return a value from a function", correct: true },
            { text1: "To exit a function", correct: false },
            { text1: "To declare variables", correct: false },
            { text1: "To print output", correct: false },
        ]
    },
    {
        question1: "How do you handle exceptions in C++?",
        answers1: [
            { text1: "Using try, catch blocks", correct: true },
            { text1: "Using if statements", correct: false },
            { text1: "Using switch cases", correct: false },
            { text1: "Using error codes", correct: false },
        ]
    },
];


const questionElement1 = document.getElementById("c-intermediate-question");
const answerButton1 = document.getElementById("c-intermediate-answer-buttons");
const nextButton1 = document.getElementById("c-intermediate-next-btn");
const backButton1=document.getElementById("c-intermediate-back-btn");

function startCIntermediateQuiz() {
    currentQuestionIndex = 0; 
    score = 0; 
    backButton1.innerHTML="Return";
    nextButton1.innerHTML = "Next"; 
    showQuestion1(); 
}

function showQuestion1() {
    resetState1(); 
    let currentQuestion = questions1[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement1.innerHTML = questionNo + ". " + currentQuestion.question1;

    currentQuestion.answers1.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text1;
        button.classList.add("btn");
        button.addEventListener("click", () => selectAnswer1(answer));
        answerButton1.appendChild(button);
    });
}

function resetState1() {
    backButton1.style.display = "none";
    nextButton1.style.display = "none"; 
    answerButton1.innerHTML = ""; 
}

function selectAnswer1(answer) {
    if (answer.correct) {
        score++;
    }
    nextButton1.style.display = "block";
}

nextButton1.addEventListener("click", () => {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions1.length) {
        showQuestion1();
    } else {
        let message;
        if (score < 3) {
            message = "weh weh weh";
        } else if (score >= 3 && score <= 7) {
            message = "hmm crazy";
        } else {
            message = "good.";
        }
        questionElement1.innerHTML ="<br>You scored " + score + " out of " + questions1.length + "!" + "<br>" + message;
        answerButton1.innerHTML = ""; 
        nextButton1.style.display = "none"; 
        backButton1.style.display="block";
    }
});
backButton1.addEventListener("click", ()=>{
    console.log("back");
    c_intermediate.style.display="none";
    main_div.style.display="block";
});


//ADVANCED-C QUIZ

const questions2 = [
    {
        question: "What is encapsulation in C++?",
        answers: [
            { text: "Hiding data within classes", correct: true },
            { text: "Creating new classes", correct: false },
            { text: "Using multiple inheritance", correct: false },
            { text: "Overloading operators", correct: false },
        ]
    },
    {
        question: "What is a pure virtual function?",
        answers: [
            { text: "Makes a class abstract", correct: true },
            { text: "Implements functionality", correct: false },
            { text: "Can be defined", correct: false },
            { text: "Is a normal function", correct: false },
        ]
    },
    {
        question: "What is inheritance in C++?",
    answers: [
        { text: "Reusing code from another class", correct: true },
        { text: "Hiding class members", correct: false },
        { text: "Using templates", correct: false },
        { text: "Creating multiple instances", correct: false },
    ]
    },
    {
        question: "What is abstraction in C++?",
        answers: [
            { text: "Hiding complex implementation details", correct: true },
            { text: "Using multiple inheritance", correct: false },
            { text: "Creating base classes only", correct: false },
            { text: "Defining all member functions", correct: false },
        ]
    },
    {
        question: "How do you declare a class in C++?",
        answers: [
            { text: "class ClassName { };", correct: true },
            { text: "Class ClassName { };", correct: false },
            { text: "define ClassName { };", correct: false },
            { text: "struct ClassName { };", correct: false },
        ]
    },
    {
        question: "What keyword is used to inherit a class?",
        answers: [
            { text: "inherits", correct: false },
            { text: "extends", correct: false },
            { text: "class", correct: false },
            { text: "public", correct: true },
        ]
    },
    {
        question: "What is a destructor?",
        answers: [
            { text: "Called when an object is deleted", correct: true },
            { text: "Creates new instances", correct: false },
            { text: "Initializes class members", correct: false },
            { text: "Defines class behavior", correct: false },
        ]
    },
    {
        question: "What is a constructor?",
        answers: [
            { text: "Initializes an object", correct: true },
            { text: "Deletes an object", correct: false },
            { text: "Calls base class functions", correct: false },
            { text: "Creates a new class", correct: false },
        ]
    },
    {
        question: "Can a class be abstract without pure virtual functions?",
        answers: [
            { text: "No, it needs at least one", correct: true },
            { text: "Yes, with virtual functions", correct: false },
            { text: "Yes, with regular functions", correct: false },
            { text: "No, must be concrete", correct: false },
        ]
    },
    {
        question: "What is the main benefit of polymorphism?",
        answers: [
            { text: "Code flexibility and reuse", correct: true },
            { text: "Faster execution", correct: false },
            { text: "Less memory usage", correct: false },
            { text: "Simpler syntax", correct: false },
        ]
    },
];


const questionElement2 = document.getElementById("c-advanced-question");
const answerButton2 = document.getElementById("c-advanced-answer-buttons");
const nextButton2 = document.getElementById("c-advanced-next-btn");
const backButton2 = document.getElementById("c-advanced-back-btn");

function startCAdvancedQuiz() {
    currentQuestionIndex = 0; 
    score = 0; 
    nextButton2.innerHTML = "Next"; 
    backButton2.innerHTML = "Return";
    showQuestion2(); 
}

function showQuestion2() {
    resetState2(); 
    let currentQuestion = questions2[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement2.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        button.addEventListener("click", () => selectAnswer2(answer));
        answerButton2.appendChild(button);
    });
}

function resetState2() {
    backButton2.style.display = "none";
    nextButton2.style.display = "none"; 
    answerButton2.innerHTML = ""; 
}

function selectAnswer2(answer) {
    if (answer.correct) {
        score++;
    }
    nextButton2.style.display = "block";
}

nextButton2.addEventListener("click", () => {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions2.length) {
        showQuestion2();
    } else {
        let message;
        if (score < 3) {
            message = "Good effort, keep practicing!";
        } else if (score >= 3 && score <= 7) {
            message = "Nice work, you're getting there!";
        } else {
            message = "Excellent!";
        }
        questionElement2.innerHTML = "<br>You scored " + score + " out of " + questions2.length + "!" + "<br>" + message;
        answerButton2.innerHTML = ""; 
        nextButton2.style.display = "none"; 
        backButton2.style.display = "block";
    }
});

backButton2.addEventListener("click", () => {
    c_advanced.style.display = "none";
    main_div.style.display = "block";
});

// Beginner Python Quiz
const python1Questions = [
    {
        question: "What is the correct file extension for Python files?",
        answers: [
            { text: ".py", correct: true },
            { text: ".python", correct: false },
            { text: ".pyt", correct: false },
            { text: ".txt", correct: false },
        ]
    },
    {
        question: "Which of the following is a valid variable name in Python?",
        answers: [
            { text: "my_variable", correct: true },
            { text: "my-variable", correct: false },
            { text: "my variable", correct: false },
            { text: "2_variable", correct: false },
        ]
    },
    {
        question: "How do you insert comments in Python?",
        answers: [
            { text: "# This is a comment", correct: true },
            { text: "// This is a comment", correct: false },
            { text: "/* This is a comment */", correct: false },
            { text: "This is a comment", correct: false },
        ]
    },
    {
        question: "What is the output of print(2 ** 3)?",
        answers: [
            { text: "6", correct: false },
            { text: "8", correct: true },
            { text: "9", correct: false },
            { text: "5", correct: false },
        ]
    },
    {
        question: "Which of the following is used to start a comment in Python?",
        answers: [
            { text: "//", correct: false },
            { text: "#", correct: true },
            { text: "/*", correct: false },
            { text: "!--", correct: false },
        ]
    },
    {
        question: "What is the keyword used to handle exceptions in Python?",
        answers: [
            { text: "catch", correct: false },
            { text: "try", correct: true },
            { text: "except", correct: true },
            { text: "error", correct: false },
        ]
    },
    {
        question: "Which data type is used to store True or False?",
        answers: [
            { text: "string", correct: false },
            { text: "bool", correct: true },
            { text: "int", correct: false },
            { text: "float", correct: false },
        ]
    },
    {
        question: "How do you create a list in Python?",
        answers: [
            { text: "myList = [1, 2, 3]", correct: true },
            { text: "myList = (1, 2, 3)", correct: false },
            { text: "myList = {1, 2, 3}", correct: false },
            { text: "myList = <1, 2, 3>", correct: false },
        ]
    },
    {
        question: "What is the purpose of the 'self' keyword in Python?",
        answers: [
            { text: "Refers to the instance of the class", correct: true },
            { text: "Defines a variable", correct: false },
            { text: "Creates a function", correct: false },
            { text: "Indicates a global variable", correct: false },
        ]
    },
    {
        question: "What does the len() function do?",
        answers: [
            { text: "Returns the length of an object", correct: true },
            { text: "Returns the type of an object", correct: false },
            { text: "Returns the first element of an object", correct: false },
            { text: "Creates a new object", correct: false },
        ]
    },
];

const python1QuestionElement = document.getElementById("p-beginner-question");
const python1AnswerButton = document.getElementById("p-beginner-answer-buttons");
const python1NextButton = document.getElementById("p-beginner-next-btn");
const python1BackButton = document.getElementById("p-beginner-back-btn");

function startPBeginnerQuiz() {
    currentQuestionIndex = 0; 
    score = 0; 
    python1NextButton.innerHTML = "Next"; 
    python1BackButton.innerHTML = "Return";
    showPython1Question(); 
}

function showPython1Question() {
    resetPython1State(); 
    let currentQuestion = python1Questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    python1QuestionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        button.addEventListener("click", () => selectPython1Answer(answer));
        python1AnswerButton.appendChild(button);
    });
}

function resetPython1State() {
    python1BackButton.style.display = "none";
    python1NextButton.style.display = "none"; 
    python1AnswerButton.innerHTML = ""; 
}

function selectPython1Answer(answer) {
    if (answer.correct) {
        score++;
    }
    python1NextButton.style.display = "block";
}

python1NextButton.addEventListener("click", () => {
    currentQuestionIndex++;
    if (currentQuestionIndex < python1Questions.length) {
        showPython1Question();
    } else {
        let message;
        if (score < 3) {
            message = "Good effort, keep practicing!";
        } else if (score >= 3 && score <= 7) {
            message = "Nice work, you're getting there!";
        } else {
            message = "Excellent!";
        }
        python1QuestionElement.innerHTML = "<br>You scored " + score + " out of " + python1Questions.length + "!" + "<br>" + message;
        python1AnswerButton.innerHTML = ""; 
        python1NextButton.style.display = "none"; 
        python1BackButton.style.display = "block";
    }
});

python1BackButton.addEventListener("click", () => {
    p_beginner.style.display = "none"; 
    main_div.style.display = "block"; 
});

// Intermediate Python Quiz
const python2Questions = [
    {
        question: "What does the 'append()' method do to a list?",
        answers: [
            { text: "Adds an item to the end", correct: true },
            { text: "Removes an item", correct: false },
            { text: "Reverses the list", correct: false },
            { text: "Sorts the list", correct: false },
        ]
    },
    {
        question: "How do you remove the first item from a list?",
        answers: [
            { text: "remove(0)", correct: false },
            { text: "del list[0]", correct: true },
            { text: "delete list[0]", correct: false },
            { text: "list.pop(0)", correct: true },
        ]
    },
    {
        question: "What is the output of 'print(3 // 2)'?",
        answers: [
            { text: "1", correct: true },
            { text: "1.5", correct: false },
            { text: "2", correct: false },
            { text: "0", correct: false },
        ]
    },
    {
        question: "How do you create a set in Python?",
        answers: [
            { text: "set = {1, 2, 3}", correct: true },
            { text: "set = [1, 2, 3]", correct: false },
            { text: "set = (1, 2, 3)", correct: false },
            { text: "set = <1, 2, 3>", correct: false },
        ]
    },
    {
        question: "What does the 'pop()' method return?",
        answers: [
            { text: "Removed item", correct: true },
            { text: "List length", correct: false },
            { text: "Nothing", correct: false },
            { text: "True or False", correct: false },
        ]
    },
    {
        question: "Which operator is used for exponentiation?",
        answers: [
            { text: "**", correct: true },
            { text: "^", correct: false },
            { text: "*", correct: false },
            { text: "//", correct: false },
        ]
    },
    {
        question: "What will 'my_dict.get('key', 'default')' return if 'key' is missing?",
        answers: [
            { text: "'default'", correct: true },
            { text: "None", correct: false },
            { text: "Error", correct: false },
            { text: "''", correct: false },
        ]
    },
    {
        question: "What does the 'upper()' method do?",
        answers: [
            { text: "Converts to uppercase", correct: true },
            { text: "Converts to lowercase", correct: false },
            { text: "Capitalizes first letter", correct: false },
            { text: "Removes spaces", correct: false },
        ]
    },
    {
        question: "What does the 'strip()' method do to a string?",
    answers: [
        { text: "Removes whitespace", correct: true },
        { text: "Replaces characters", correct: false },
        { text: "Converts to lowercase", correct: false },
        { text: "Splits string", correct: false },
    ]
    },
    {
        question: "Which function checks if all items in an iterable are True?",
        answers: [
            { text: "all()", correct: true },
            { text: "any()", correct: false },
            { text: "check()", correct: false },
            { text: "every()", correct: false },
        ]
    },
];

const python2QuestionElement = document.getElementById("p-intermediate-question");
const python2AnswerButton = document.getElementById("p-intermediate-answer-buttons");
const python2NextButton = document.getElementById("p-intermediate-next-btn");
const python2BackButton = document.getElementById("p-intermediate-back-btn");

function startPIntermediateQuiz() {
    currentQuestionIndex = 0; 
    score = 0; 
    python2NextButton.innerHTML = "Next"; 
    python2BackButton.innerHTML = "Return";
    showPython2Question(); 
}

function showPython2Question() {
    resetPython2State(); 
    let currentQuestion = python2Questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    python2QuestionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        button.addEventListener("click", () => selectPython2Answer(answer));
        python2AnswerButton.appendChild(button);
    });
}

function resetPython2State() {
    python2BackButton.style.display = "none";
    python2NextButton.style.display = "none"; 
    python2AnswerButton.innerHTML = ""; 
}

function selectPython2Answer(answer) {
    if (answer.correct) {
        score++;
    }
    python2NextButton.style.display = "block";
}

python2NextButton.addEventListener("click", () => {
    currentQuestionIndex++;
    if (currentQuestionIndex < python1Questions.length) {
        showPython2Question();
    } else {
        let message;
        if (score < 3) {
            message = "Good effort, keep practicing!";
        } else if (score >= 3 && score <= 7) {
            message = "Nice work, you're getting there!";
        } else {
            message = "Excellent!";
        }
        python2QuestionElement.innerHTML = "<br>You scored " + score + " out of " + python2Questions.length + "!" + "<br>" + message;
        python2AnswerButton.innerHTML = ""; 
        python2NextButton.style.display = "none"; 
        python2BackButton.style.display = "block";
    }
});

python2BackButton.addEventListener("click", () => {
    p_intermediate.style.display = "none"; 
    main_div.style.display = "block"; 
});

// Advanced Python Quiz
const python3Questions = [
    {
        question: "How do you merge two dictionaries in Python 3.9+?",
    answers: [
        { text: "|", correct: true },
        { text: "+", correct: false },
        { text: "merge", correct: false },
        { text: "combine", correct: false },
    ]
    },
    {
        question: "What does the 'yield' keyword do in a function?",
        answers: [
            { text: "Returns a generator", correct: true },
            { text: "Ends the function", correct: false },
            { text: "Defines a lambda", correct: false },
            { text: "Creates a list", correct: false },
        ]
    },
    {
        question: "What does 'map()' return in Python 3?",
        answers: [
            { text: "map object", correct: true },
            { text: "list", correct: false },
            { text: "set", correct: false },
            { text: "tuple", correct: false },
        ]
    },
    {
            question: "How to remove duplicates while keeping order?",
            answers: [
                { text: "dict", correct: true },
                { text: "set", correct: false },
                { text: "unique", correct: false },
                { text: "remove", correct: false },
            ]
    },
    {
        question: "What does 'zip(*list)' do?",
        answers: [
            { text: "Unzips a list of tuples", correct: true },
            { text: "Joins two lists", correct: false },
            { text: "Creates a zip file", correct: false },
            { text: "Combines dictionaries", correct: false },
        ]
    },
    {
        question: "How do you perform matrix multiplication in Python?",
        answers: [
            { text: "a @ b", correct: true },
            { text: "a * b", correct: false },
            { text: "a ** b", correct: false },
            { text: "a & b", correct: false },
        ]
    },
    {
        question: "Which module provides tools for working with iterators?",
answers: [
    { text: "itertools", correct: true },
    { text: "collections", correct: false },
    { text: "functools", correct: false },
    { text: "operator", correct: false },
]

    },
    {
        question: "Which module helps in deep copying an object?",
        answers: [
            { text: "copy", correct: true },
            { text: "sys", correct: false },
            { text: "os", correct: false },
            { text: "pickle", correct: false },
        ]
    },
    {
        question: "What does '__name__' hold when a module is run directly?",
        answers: [
            { text: "'__main__'", correct: true },
            { text: "Module name", correct: false },
            { text: "File name", correct: false },
            { text: "None", correct: false },
        ]
    },
    {
        question: "Which method in 'os' module changes current working directory?",
        answers: [
            { text: "chdir()", correct: true },
            { text: "cwd()", correct: false },
            { text: "getcwd()", correct: false },
            { text: "setcwd()", correct: false },
        ]
    },
];

const python3QuestionElement = document.getElementById("p-advanced-question");
const python3AnswerButton = document.getElementById("p-advanced-answer-buttons");
const python3NextButton = document.getElementById("p-advanced-next-btn");
const python3BackButton = document.getElementById("p-advanced-back-btn");

function startPAdvancedQuiz() {
    currentQuestionIndex = 0; 
    score = 0; 
    python3NextButton.innerHTML = "Next"; 
    python3BackButton.innerHTML = "Return";
    showPython3Question(); 
}

function showPython3Question() {
    resetPython3State(); 
    let currentQuestion = python3Questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    python3QuestionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        button.addEventListener("click", () => selectPython3Answer(answer));
        python3AnswerButton.appendChild(button);
    });
}

function resetPython3State() {
    python3BackButton.style.display = "none";
    python3NextButton.style.display = "none"; 
    python3AnswerButton.innerHTML = ""; 
}

function selectPython3Answer(answer) {
    if (answer.correct) {
        score++;
    }
    python3NextButton.style.display = "block";
}

python3NextButton.addEventListener("click", () => {
    currentQuestionIndex++;
    if (currentQuestionIndex < python3Questions.length) {
        showPython3Question();
    } else {
        let message;
        if (score < 3) {
            message = "Good effort, keep practicing!";
        } else if (score >= 3 && score <= 7) {
            message = "Nice work, you're getting there!";
        } else {
            message = "Excellent!";
        }
        python3QuestionElement.innerHTML = "<br>You scored " + score + " out of " + python3Questions.length + "!" + "<br>" + message;
        python3AnswerButton.innerHTML = ""; 
        python3NextButton.style.display = "none"; 
        python3BackButton.style.display = "block";
    }
});

python3BackButton.addEventListener("click", () => {
    p_advanced.style.display = "none"; 
    main_div.style.display = "block"; 
});

// Beginner Javascript Quiz
const js1Questions = [
    {
        question: "How do you create a variable in JavaScript?",
        answers: [
            { text: "let x;", correct: true },
            { text: "var x:", correct: false },
            { text: "x := 5", correct: false },
            { text: "set x;", correct: false },
        ]
    },
    {
        question: "How do you write 'Hello World' in an alert?",
        answers: [
            { text: "alert('Hello World');", correct: true },
            { text: "msg('Hello World');", correct: false },
            { text: "echo 'Hello World'", correct: false },
            { text: "prompt('Hello World');", correct: false },
        ]
    },
    {
        question: "How do you add a comment in JavaScript?",
        answers: [
            { text: "// comment", correct: true },
            { text: " comment -->", correct: false },
            { text: "# comment", correct: false },
            { text: "/* comment */", correct: false },
        ]
    },
    {
        question: "Which operator is used for addition?",
        answers: [
            { text: "+", correct: true },
            { text: "-", correct: false },
            { text: "*", correct: false },
            { text: "/", correct: false },
        ]
    },
    {
        question: "What does '===' mean?",
        answers: [
            { text: "Strict equality", correct: true },
            { text: "Assignment", correct: false },
            { text: "Loose equality", correct: false },
            { text: "Addition", correct: false },
        ]
    },
    {
        question: "What does 'NaN' mean?",
        answers: [
            { text: "Not a Number", correct: true },
            { text: "Negative", correct: false },
            { text: "No Answer Needed", correct: false },
            { text: "Next", correct: false },
        ]
    },
    {
        question: "How do you start a for loop?",
        answers: [
            { text: "for ()", correct: true },
            { text: "loop ()", correct: false },
            { text: "while ()", correct: false },
            { text: "repeat ()", correct: false },
        ]
    },
    {
        question: "What does 'typeof' do?",
        answers: [
            { text: "Gets type", correct: true },
            { text: "Declares type", correct: false },
            { text: "Converts type", correct: false },
            { text: "Deletes type", correct: false },
        ]
    },
    {
        question: "Which is a Boolean value?",
        answers: [
            { text: "true", correct: true },
            { text: "1", correct: false },
            { text: "none", correct: false },
            { text: "void", correct: false },
        ]
    },
    {
        question: "What is a string?",
        answers: [
            { text: "Text data", correct: true },
            { text: "A number", correct: false },
            { text: "Boolean", correct: false },
            { text: "Loop", correct: false },
        ]
    },
];


const js1QuestionElement = document.getElementById("j-beginner-question");
const js1AnswerButton = document.getElementById("j-beginner-answer-buttons");
const js1NextButton = document.getElementById("j-beginner-next-btn");
const js1BackButton = document.getElementById("j-beginner-back-btn");

function startJBeginnerQuiz() {
    currentQuestionIndex = 0; 
    score = 0; 
    js1NextButton.innerHTML = "Next"; 
    js1BackButton.innerHTML = "Return";
    showJS1Question(); 
}

function showJS1Question() {
    resetJS1State(); 
    let currentQuestion = js1Questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    js1QuestionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        button.addEventListener("click", () => selectJS1Answer(answer));
        js1AnswerButton.appendChild(button);
    });
}

function resetJS1State() {
    js1BackButton.style.display = "none";
    js1NextButton.style.display = "none"; 
    js1AnswerButton.innerHTML = ""; 
}

function selectJS1Answer(answer) {
    if (answer.correct) {
        score++;
    }
    js1NextButton.style.display = "block";
}

js1NextButton.addEventListener("click", () => {
    currentQuestionIndex++;
    if (currentQuestionIndex < js1Questions.length) {
        showJS1Question();
    } else {
        let message;
        if (score < 3) {
            message = "Good effort, keep practicing!";
        } else if (score >= 3 && score <= 7) {
            message = "Nice work, you're getting there!";
        } else {
            message = "Excellent!";
        }
        js1QuestionElement.innerHTML = "<br>You scored " + score + " out of " + js1Questions.length + "!" + "<br>" + message;
        js1AnswerButton.innerHTML = ""; 
        js1NextButton.style.display = "none"; 
        js1BackButton.style.display = "block";
    }
});

js1BackButton.addEventListener("click", () => {
    j_beginner.style.display = "none"; 
    main_div.style.display = "block"; 
});


// Intermediate Javascript Quiz
const js2Questions = [
    {
        question: "What does a higher-order function do?",
        answers: [
            { text: "Takes/returns functions", correct: true },
            { text: "Runs globally", correct: false },
            { text: "Declares constants", correct: false },
            { text: "Loops over arrays", correct: false },
        ]
    },
    {
        question: "How do you write an async function?",
        answers: [
            { text: "async function()", correct: true },
            { text: "function async()", correct: false },
            { text: "await function()", correct: false },
            { text: "function: async()", correct: false },
        ]
    },
    {
        question: "What does Array.map() return?",
        answers: [
            { text: "New array", correct: true },
            { text: "Modified array", correct: false },
            { text: "Boolean", correct: false },
            { text: "Original array", correct: false },
        ]
    },
    {
        question: "Which method checks if an array includes a value?",
        answers: [
            { text: ".includes()", correct: true },
            { text: ".contains()", correct: false },
            { text: ".has()", correct: false },
            { text: ".in()", correct: false },
        ]
    },
    {
        question: "What does 'bind' do in JavaScript?",
        answers: [
            { text: "Sets 'this' context", correct: true },
            { text: "Creates closure", correct: false },
            { text: "Makes global", correct: false },
            { text: "Limits scope", correct: false },
        ]
    },
    {
        question: "What is a closure?",
        answers: [
            { text: "Function + its scope", correct: true },
            { text: "Scoped variable", correct: false },
            { text: "An isolated function", correct: false },
            { text: "A global function", correct: false },
        ]
    },
    {
        question: "How do you delay code in JavaScript?",
        answers: [
            { text: "setTimeout()", correct: true },
            { text: "setInterval()", correct: false },
            { text: "clearTimeout()", correct: false },
            { text: "wait()", correct: false },
        ]
    },
    {
        question: "Which function runs async code in order?",
        answers: [
            { text: "async/await", correct: true },
            { text: "forEach", correct: false },
            { text: "then/catch", correct: false },
            { text: "setTimeout", correct: false },
        ]
    },
    {
        question: "What does Array.filter() do?",
        answers: [
            { text: "Filters array values", correct: true },
            { text: "Sorts array", correct: false },
            { text: "Combines arrays", correct: false },
            { text: "Modifies each element", correct: false },
        ]
    },
    {
        question: "How do you return a function in JavaScript?",
        answers: [
            { text: "function() { return anotherFunc; }", correct: true },
            { text: "return function() {}", correct: false },
            { text: "return()", correct: false },
            { text: "function return() {}", correct: false },
        ]
    }
];


const js2QuestionElement = document.getElementById("j-intermediate-question");
const js2AnswerButton = document.getElementById("j-intermediate-answer-buttons");
const js2NextButton = document.getElementById("j-intermediate-next-btn");
const js2BackButton = document.getElementById("j-intermediate-back-btn");

function startJIntermediateQuiz() {
    currentQuestionIndex = 0; 
    score = 0; 
    js2NextButton.innerHTML = "Next"; 
    js2BackButton.innerHTML = "Return";
    showJS2Question(); 
}

function showJS2Question() {
    resetJS2State(); 
    let currentQuestion = js2Questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    js2QuestionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        button.addEventListener("click", () => selectJS2Answer(answer));
        js2AnswerButton.appendChild(button);
    });
}

function resetJS2State() {
    js2BackButton.style.display = "none";
    js2NextButton.style.display = "none"; 
    js2AnswerButton.innerHTML = ""; 
}

function selectJS2Answer(answer) {
    if (answer.correct) {
        score++;
    }
    js2NextButton.style.display = "block";
}

js2NextButton.addEventListener("click", () => {
    currentQuestionIndex++;
    if (currentQuestionIndex < js2Questions.length) {
        showJS2Question();
    } else {
        let message;
        if (score < 3) {
            message = "Good effort, keep practicing!";
        } else if (score >= 3 && score <= 7) {
            message = "Nice work, you're getting there!";
        } else {
            message = "Excellent!";
        }
        js2QuestionElement.innerHTML = "<br>You scored " + score + " out of " + js2Questions.length + "!" + "<br>" + message;
        js2AnswerButton.innerHTML = ""; 
        js2NextButton.style.display = "none"; 
        js2BackButton.style.display = "block";
    }
});

js2BackButton.addEventListener("click", () => {
    j_intermediate.style.display = "none"; 
    main_div.style.display = "block"; 
});




// Advanced Javascript Quiz
const js3Questions = [
    {
            question: "What does 'DOM' stand for?",
            answers: [
                { text: "Document Object Model", correct: true },
                { text: "Data Object Model", correct: false },
                { text: "Dynamic Object Method", correct: false },
                { text: "Document Output Method", correct: false },
            ]
    },
    {
        question: "Which method adds a new element to the end of a parent element?",
        answers: [
            { text: "appendChild()", correct: true },
            { text: "addChild()", correct: false },
            { text: "insertAfter()", correct: false },
            { text: "createChild()", correct: false },
        ]
    },
    {
        question: "What method is used to remove an element from the DOM?",
        answers: [
            { text: "remove()", correct: true },
            { text: "delete()", correct: false },
            { text: "discard()", correct: false },
            { text: "detach()", correct: false },
        ]
    },
    {
            question: "What method adds an event listener?",
            answers: [
                { text: "addEvent()", correct: false },
                { text: "onEvent()", correct: false },
                { text: "addListener()", correct: false },
                { text: "addEventListener()", correct: true },
            ]
    },
    {
        question: "Which event is fired when a user clicks on an element?",
        answers: [
            { text: "click", correct: true },
            { text: "mouseover", correct: false },
            { text: "focus", correct: false },
            { text: "change", correct: false },
        ]
    },
    {
        question: "What does the event.preventDefault() method do?",
        answers: [
            { text: "Stops default action of an event", correct: true },
            { text: "Prevents event bubbling", correct: false },
            { text: "Cancels all events", correct: false },
            { text: "Ignores errors", correct: false },
        ]
    },
    {
        
            question: "How to check if a value is an array?",
            answers: [
                { text: "Array.isArray(val)", correct: true },
                { text: "val.isArray()", correct: false },
                { text: "Array.check(val)", correct: false },
                { text: "val instanceof Array", correct: false },
            ]
        
        
    },
    {
        question: "Which method is used to add an event listener to an element?",
        answers: [
            { text: "addEventListener()", correct: true },
            { text: "onEvent()", correct: false },
            { text: "attachEvent()", correct: false },
            { text: "registerEvent()", correct: false },
        ]
    },
    {
        question: "What is the purpose of the 'DOMContentLoaded' event?",
        answers: [
            { text: "Fires when the DOM is fully loaded", correct: true },
            { text: "Triggers after all resources are loaded", correct: false },
            { text: "Occurs when the page is resized", correct: false },
            { text: "Happens on form submission", correct: false },
        ]
    },
    {
        question: "How can you create a new HTML element in JavaScript?",
        answers: [
            { text: "createElement('div')", correct: true },
            { text: "addElement('div')", correct: false },
            { text: "newElement('div')", correct: false },
            { text: "insertElement('div')", correct: false },
        ]
    },
];


const js3QuestionElement = document.getElementById("j-advanced-question");
const js3AnswerButton = document.getElementById("j-advanced-answer-buttons");
const js3NextButton = document.getElementById("j-advanced-next-btn");
const js3BackButton = document.getElementById("j-advanced-back-btn");

function startJAdvancedQuiz() {
    currentQuestionIndex = 0; 
    score = 0; 
    js3NextButton.innerHTML = "Next"; 
    js3BackButton.innerHTML = "Return";
    showJS3Question(); 
}

function showJS3Question() {
    resetJS3State(); 
    let currentQuestion = js3Questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    js3QuestionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        button.addEventListener("click", () => selectJS3Answer(answer));
        js3AnswerButton.appendChild(button);
    });
}

function resetJS3State() {
    js3BackButton.style.display = "none";
    js3NextButton.style.display = "none"; 
    js3AnswerButton.innerHTML = ""; 
}

function selectJS3Answer(answer) {
    if (answer.correct) {
        score++;
    }
    js3NextButton.style.display = "block";
}

js3NextButton.addEventListener("click", () => {
    currentQuestionIndex++;
    if (currentQuestionIndex < js3Questions.length) {
        showJS3Question();
    } else {
        let message;
        if (score < 3) {
            message = "Good effort, keep practicing!";
        } else if (score >= 3 && score <= 7) {
            message = "Nice work, you're getting there!";
        } else {
            message = "Excellent!";
        }
        js3QuestionElement.innerHTML = "<br>You scored " + score + " out of " + js3Questions.length + "!" + "<br>" + message;
        js3AnswerButton.innerHTML = ""; 
        js3NextButton.style.display = "none"; 
        js3BackButton.style.display = "block";
    }
});

js3BackButton.addEventListener("click", () => {
    j_advanced.style.display = "none"; 
    main_div.style.display = "block"; 
});