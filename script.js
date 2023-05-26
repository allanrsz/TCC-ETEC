const form = document.getElementById('quiz-form');
const result = document.getElementById('result');

form.addEventListener('submit', function(event) {
	event.preventDefault();

	const answers = [
		form.q1.value,
		form.q2.value,
		form.q3.value,
		form.q4.value,
		form.q5.value,
		form.q6.value,
		form.q7.value,
		form.q8.value,
		form.q9.value,
		form.q10.value,
	];

	const correctAnswers = [
		'c',
		'b',
		'd',
		'c',
		'b',
		'a',
		'c',
		'a',
		'd',
		'b',
	];

	let score = 0;

	for (let i = 0; i < answers.length; i++) {
		if (answers[i] === correctAnswers[i]) {
			score++;
		}
	}

	let resultText = '';

	if (score < 5) {
		resultText = 'Você se dá melhor com Back End!';
	} else {
		resultText = 'Você se dá melhor com Front End!';
	}

	alert(resultText); // exibe o resultado em uma caixa de diálogo

	result.textContent = resultText;
});
