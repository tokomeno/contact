let userInput = "";
let inputNumber = $(".input__numbers");
let fullResult = [];

$(".number_btn").click(function() {
    if (userInput.length >= 9) {
        alert("number has to be less than 9 digits");
        return;
    }
    userInput += $(this).data("num");
    updateInputValue();
    if (userInput.length >= 2) {
        getNewContacts();
    }
});

$(".delete__btn").click(function() {
    userInput = userInput.substring(0, userInput.length - 1);
    updateInputValue();
    if (userInput.length >= 2) {
        getNewContacts();
    } else {
        $("#matchesNumber").text(0);
        setContactInfo({ name: "", phone: "" });
    }
});

$(".matches").click(fillFullResultHtml);

const getNewContacts = () => {
    axios
        .get("/api/contacts", {
            params: {
                userInput: userInput
            }
        })
        .then(res => {
            console.log(res);
            fullResult = res.data.contacts;
            let total = fullResult.length;
            if (total > 0) {
                setContactInfo({
                    name: fullResult[0].full_name,
                    phone: fullResult[0].phone
                });
            } else {
                setContactInfo({ name: "", phone: "" });
            }

            $("#matchesNumber").text(total);
        });
};

function updateInputValue() {
    inputNumber.html(userInput);
}

function fillFullResultHtml() {
    if (fullResult.length == 0) {
        $("#full_result").html("<h4>ჩანაწერები ვერ მოიძებნა</h4>");
    } else {
        let list = [];
        fullResult.forEach(i => {
            list.push(
                `<li class="list-group-item">${i.full_name}:${i.phone}</li>`
            );
        });
        $("#full_result").html(list);
    }
}

function setContactInfo(info) {
    $("#name").text(info.name);
    $("#phone").text(info.phone);
}
