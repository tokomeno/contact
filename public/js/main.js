let userInput = "";
let inputNumber = $(".input__numbers");
let fullResult = [];

$(".number_btn").click(function() {
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
        clearContactInfo();
    }
});

$(".matches").click(function() {
    fillFullResultHtml();
});
const getNewContacts = () => {
    axios
        .get("/api/contacts", {
            params: {
                userInput: userInput
            }
        })
        .then(res => {
            let total = res.data.length;
            fullResult = res.data;
            if (total > 0) {
                $("#name").text(fullResult[0].full_name);
                $("#phone").text(fullResult[0].phone);
            } else {
                clearContactInfo();
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

function clearContactInfo() {
    $("#name").text("");
    $("#phone").text("");
}
