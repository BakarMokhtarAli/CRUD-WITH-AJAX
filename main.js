
loadData();
// this button is check either the form will be inserte or update
let btnAction = 'insert';

$("#btnAdd").on("click",function(){
    $("#studentModal").modal("show");
});

// When the form is submitted
$("#studentForm").submit(function(event){
    event.preventDefault();
    let form_data = new FormData($("#studentForm")[0]);
    if(btnAction === 'insert'){
        form_data.append("action","registerStudent");
    }else{
        form_data.append("action","updateStudent");
    }


    $.ajax({
        method: "POST",
        dataType: "JSON",
        url: "api.php",
        data: form_data,
        processData: false,
        contentType: false,
        success: function(data){
            let message = data.data;
            alert(message);
            $("#studentForm")[0].reset();
            $("#studentForm").modal("hide");
            btnAction = 'insert';
            loadData();
            $("#studentModal").modal("hide");
        },
        error: function(data){
            console.log(data)
        }
    })
});

// read single student Info
function readStudentInfo(id){
    let sendingData = {
        "action":"readStudentInfo",
        "id": id
    };

    $.ajax({
        method: "POST",
        dataType: "JSON",
        url: "api.php",
        data: sendingData,
        success: function(data){
            let response = data.data;
            $("#id").val(response[0].id)
            $("#name").val(response[0].name)
            $("#class").val(response[0].class)
            // ardayga id-giisa walso helay buttonAction ka valugug-iisa update ka dhig si loo update gareeyo
            btnAction = "update";
            $("#studentModal").modal("show");
        },
        error: function(data){
            console.log(data);
        }
    })
}

// read all students from database
function loadData(){
    $("#studentsTable tbody").html("");
    let sendingData = {
        "action": "readAll"
    };

    let html = "";
    let tr = "";

    $.ajax({
        method: "POST",
        dataType: "JSON",
        url: "api.php",
        data: sendingData,
        success: function(data){
            let response = data.data;
            response.forEach(item =>{
                tr += "<tr>"
                for(let i in item){
                    tr += `<td>${item[i]}</td>`
                }
                tr += `<td>
                <a class="btn btn-warning update_info" update_id = ${item['id']}><i class="fas fa-pencil"></i></a>
                <a class="btn btn-danger delete_info" delete_id=${item['id']}><i class="fas fa-trash"></i></a>
                </td>`
                tr += '</tr>'
            })
            $("#studentsTable tbody").append(tr);
        },
        error: function(data){
            console.log(data)
        }
    })
};

// delete student
function deleteStudent(id){
    let sendingData = {
        "action": "deleteStudent",
        "id": id
    };
    $.ajax({
        method: "POST",
        dataType: "JSON",
        url: "api.php",
        data: sendingData,
        success: function(data){
            let message = data.data;
            alert(message);
            $("#studentModal").modal("hide");
            loadData();
        },
        error: function(data){
            console.log(data)
        }
    })
}

// when update button hit pressed
$("#studentsTable").on("click","a.update_info",function(){
    let id = $(this).attr("update_id");
    readStudentInfo(id);
});
// when delete button hit pressed
$("#studentsTable").on("click","a.delete_info",function(){
    let id = $(this).attr("delete_id");
    if(confirm("Are You sure to delete")){
        deleteStudent(id);
    }
})