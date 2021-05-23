function updateValue(val){
    var str1 = "Priority: ";
    var str2;
    switch (parseInt(val)){
        case 1:
            str2 = "1 (Lowest)";
            break;
        case 3:
            str2 = "3 (Medium)";
            break;
        case 5:
            str2 = "5 (Highest)";
            break;
        default:
            str2 = val.toString();
            break;        
    }

    var text = document.getElementById('priority-text');
    var innerHTML = str1.concat(str2);
    text.innerHTML = innerHTML;
}