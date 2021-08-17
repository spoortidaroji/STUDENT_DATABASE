
let id = $("input[name*='STUDENTID']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);
    s

    let STUDENTNAME = $("input[name*='STUDENTNAME']");
    let USN = $("input[name*='USN']");
    let DEPT = $("input[name*='DEPT']");
    let CITY = $("input[name*='CITY']");

    id.val(textvalues[0]);
    STUDENTNAME.val(textvalues[1]);
    USN.val(textvalues[2]);
    DEPT.val(textvalues[3]);
    CITY.val(textvalues[4].replace("$", ""));
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
            textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}