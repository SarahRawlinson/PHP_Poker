document.addEventListener("DOMContentLoaded", function() {
    const synth = window.speechSynthesis;
    const text_to_speech_div = $('#text-to-speech');
    const speak = (text) => {
        const utterance = new SpeechSynthesisUtterance(text);
        synth.speak(utterance);
    }

    const createInput = () => {
        const input = document.createElement("input");
        input.type = "text";
        input.id = "text-input";
        text_to_speech_div.append(input);
    }

    const createButton = () => {
        const button = document.createElement("button");
        button.innerHTML = "Speak";
        button.id = "speak-button";
        button.addEventListener("click", () => {
            const textInput = document.querySelector("#text-input");
            speak(textInput.value);
        });
        text_to_speech_div.append(button);
    }

    createInput();
    createButton();
});
