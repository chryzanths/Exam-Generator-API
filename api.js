// api.js

// Function to generate quiz questions using the OpenAI API
function generateQuizAPI(text) {
    // Replace 'YOUR_API_KEY' with your actual OpenAI API key
    let apiKey = 'API-KEY';

    // Make a POST request to the OpenAI API
    fetch('https://api.openai.com/v1/completions', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + apiKey,
        },
        body: JSON.stringify({
            prompt: text,
            max_tokens: 50,
            temperature: 0.7,
            top_p: 1,
            frequency_penalty: 0,
            presence_penalty: 0,
            stop: ['\n']
        }),
    })
    .then(response => response.json())
    .then(data => {
        // Handle the generated quiz data
        console.log(data);
        // You can further process the generated quiz data here
        // For example, display the quiz questions on the webpage
    })
    .catch(error => console.error('Error:', error));
}
