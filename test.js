async function UPLOAD_IMAGES(){
    var fn = "";
    try {
        var ck = document.cookie.split(';').map(cookie => cookie.split('=')).reduce((accumulator, [key, value]) => ({ ...accumulator, [key.trim()]: decodeURIComponent(value) }), {});
        var uid = ck.owner_id;
        var fileInput = document.getElementById('img').files;
        document.getElementById('images').value = uid + "/" + ck.prop_id;
        //alert(fileInput.length);
        for (var i = 0; i < fileInput.length; i++) {
            var file = fileInput[i];
            //alert(file.name)
            var str = uid + "/" + ck.prop_id + "/" + file.name;
            var storageRef = firebase.storage().ref(str);
            await storageRef.put(file);
            await storageRef.getDownloadURL().then((url) => {
                fn = fn + url + ",";
            });
        }
        var n = fn.lastIndexOf(",");
        var final = fn.slice(0,n);
        document.getElementById('images1').value = final;
        return 1;
    } catch (error) {
        //console.log("ERR ===", error);
        //alert("Image uploading failed!");
        return -1;
    }
}
