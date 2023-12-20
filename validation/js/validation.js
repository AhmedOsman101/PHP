const validation = new JustValidate("#form");
validation
	.addField("#username", [
		{
			rule: "required",
		},
	])
	.addField("#email", [
		{
			rule: "required",
		},
		{
			rule: "email",
		},
	])
	.addField("#password", [
		{
			rule: "required",
		},
		{
			rule: "password",
		},
	])
	.addField("#mainAddress", [
		{
			rule: "required",
		},
	])
	.addField("#", [
		{
			rule: "required",
		},
	])
	.addField("#age", [
		{
			rule: "required",
		},
		{
			validator: (value) => {
				const n = Math.floor(Number(value));
				return n !== Infinity && String(n) === value && n > 0;
			},
			errorMessage: "Age cannot have a Negative nor decimal value",
		},
	]).onSuccess;
