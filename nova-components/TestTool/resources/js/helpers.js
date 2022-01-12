function encoder(objy){
    let collect =[]
    for (const key in objy) {
        collect.push({"class":key,"value":objy[key]})
    }
    let encoded = btoa(JSON.stringify(collect));
    console.log(JSON.stringify(collect))
    console.log(encoded)
    return encoded;
}

function tableArray(array){
    let organised = [];
    array.forEach(element => {
        const fields = element["fields"];
        let temp_obj = {};
        fields.forEach(ele => {
            temp_obj[ele["attribute"]] = ele["value"];
        });
        organised.push(temp_obj);
    });
    return organised;
}

module.exports.encoder = encoder;
module.exports.tableArray = tableArray;

[{"class":"","value":"0"},{"class":"","value":""}]