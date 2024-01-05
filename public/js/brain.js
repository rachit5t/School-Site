Images = document.querySelectorAll(".photoContainer > img")



Images.forEach(image => {
  image.addEventListener("click", () => {
    if (image.style.maxWidth == '100%') {
      image.style.maxWidth = '33%';
    } else {
      image.style.maxWidth = '100%';
    }

  });
});

DelBtn = document.querySelectorAll(".delBtn")

DelBtn.forEach(item => {
  item.addEventListener("click", () => {
    console.log("Was clicked")
    path = "/addSlider/" + item.getAttribute('data-id')
    DeleteForm = document.getElementById('deleteForm')
    DeleteForm.setAttribute("action", path)
  })
})

NoticeDel = document.querySelectorAll(".noticeDel")

NoticeDel.forEach(item => {
  item.addEventListener("click", () => {
    console.log("Was clicked")
    path = "/addNotice/" + item.getAttribute('data-id')
    noticeForm.setAttribute("action", path)
  })
})

DelService = document.querySelectorAll(".delService")

DelService.forEach(item => {
  item.addEventListener("click", () => {
    console.log("Was clicked")
    path = "/addServices/" + item.getAttribute('data-id')
    fdService.setAttribute("action", path)
  })
})

DeleteUser = document.querySelectorAll(".deleteUser")
DeleteUser.forEach(item => {
  item.addEventListener("click", () => {
    console.log("Was clicked")
    path = "/addUser/" + item.getAttribute('data-id')
    deleteUserF.setAttribute("action", path)
  })
})
fd = document.getElementById('fdteacher')
DelTeacher = document.querySelectorAll(".delTeacher")
DelTeacher.forEach(item => {
  item.addEventListener("click", () => {
    console.log("Was clicked")
    path = "/addTeacher/" + item.getAttribute('data-id')
    fd.setAttribute("action", path)
  })
})

DelPosition = document.querySelectorAll(".delPosition")
DelPosition.forEach(item => {
  item.addEventListener("click", () => {
    console.log("Was clicked")
    path = "/addPosition/" + item.getAttribute('data-id')
    fd.setAttribute("action", path)
  })
})
fd = document.getElementById('fdSchedule');
DelSchedule = document.querySelectorAll(".delSchedule")
DelSchedule.forEach(item => {
  item.addEventListener("click", () => {
    console.log("Was clicked")
    path = "/addSchedule/" + item.getAttribute('data-id')
    fd.setAttribute("action", path)
  })
})


add = document.getElementById('add');
add.addEventListener('click', () => {
  console.log("i was clicked");
  let tableBody = document.getElementById('tableBody');
  tr = document.createElement('tr');
  th = document.createElement('th');
  thInput = document.createElement('input');
  thInput.type="text";
  thInput.classList.add('tableInput');
  thInput.classList.add('heading');
  thInput.value="१-२";
  th.appendChild(thInput);
  tr.appendChild(th);
  const td = [document.createElement('td'), document.createElement('td'), document.createElement('td'), document.createElement('td'), document.createElement('td'), document.createElement('td')];
  
  const input = [document.createElement('input'), document.createElement('input'), document.createElement('input'), document.createElement('input'), document.createElement('input'), document.createElement('input')];
  
  td.forEach((element, index) => {
    input[index].type="text";
    input[index].classList.add('tableInput');
    input[index].value="सामाजिक";
    element.appendChild(input[index]);
    tr.appendChild(element); 
    tr.classList.add('tableRow');
    tableBody.appendChild(tr); 
  });
});

remove = document.getElementById('remove');
remove.addEventListener('click', () => {
  let listOfRows = document.querySelectorAll('.tableRow');
  listOfRows[listOfRows.length-1].remove();
});

submitEdit = document.getElementById('submitEdit');
if (submitEdit != null){
  submitEdit.addEventListener('click', () => {
    console.log("Edit was clicked");
    let listOfRows = document.querySelectorAll('.tableRow');
    let tableHead = document.getElementById('tableHead').value;
    let classId = document.getElementById('clas_id');
    let allRowData = {};
    for(i = 0; i < listOfRows.length; i++){
      let elementValue = listOfRows[i].querySelectorAll('.tableInput');
      allRowData[i] = {};
      allRowData[i].class = tableHead;
      allRowData[i].class_id = classId.value;
      allRowData[i].row_id = elementValue[0].getAttribute('data-id');
      allRowData[i].time = elementValue[0].value;
      allRowData[i].sunday = elementValue[1].value;
      allRowData[i].monday = elementValue[2].value;
      allRowData[i].tuesday = elementValue[3].value;
      allRowData[i].wednesday = elementValue[4].value;
      allRowData[i].thusday = elementValue[5].value;
      allRowData[i].friday = elementValue[6].value;
    }
    fetch('/addSchedule/editForm', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify(allRowData)
    });
    console.log(JSON.stringify(allRowData))
    //window.location.href = '/scheduleManager';
  });  
}


submitTable = document.getElementById('submitTable');
if (submitTable != null){
submitTable.addEventListener('click', () => {
  let listOfRows = document.querySelectorAll('.tableRow');
  let tableHead = document.getElementById('tableHead').value;
  let allRowData = {};
  for(i = 0; i < listOfRows.length; i++){
    let elementValue = listOfRows[i].querySelectorAll('.tableInput');
    allRowData[i] = {};
    allRowData[i].class = tableHead;
    allRowData[i].time = elementValue[0].value;
    allRowData[i].sunday = elementValue[1].value;
    allRowData[i].monday = elementValue[2].value;
    allRowData[i].tuesday = elementValue[3].value;
    allRowData[i].wednesday = elementValue[4].value;
    allRowData[i].thusday = elementValue[5].value;
    allRowData[i].friday = elementValue[6].value;
  }
  fetch('/addSchedule', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify(allRowData)
  });
  console.log(JSON.stringify(allRowData))
  //window.location.href = '/scheduleManager';
});
}

