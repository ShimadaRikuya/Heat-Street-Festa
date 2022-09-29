let targets = document.querySelectorAll(`input[type='checkbox'][name='form_public']`);

for (let target of targets) {
	target.addEventListener('change', function () {
			document.querySelector('#output').innerHTML = `<div>設定状態</div> : ${target.checked}`;
		});
}