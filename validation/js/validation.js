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
                const n = Number(value);
                return Number.isInteger(n) && n > 0 && n < 150;
            },
            errorMessage: "Age must be a positive integer and less than 150",
        },
    ])
    .onSuccess(() => {
        // Submit the form here
        document.querySelector("#form").submit();
    });
