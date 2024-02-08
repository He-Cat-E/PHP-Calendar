
let tempdata = [
    {
        id: "1",
        time: "3:30",
        date: "2024-02-09"
    },
    {
        id: "2",
        time: "4:30",
        date: "2024-02-08"
    },
    {
        id: "3",
        time: "3:30",
        date: "2024-02-10"
    },
    {
        id: "4",
        time: "3:30",
        date: "2024-02-10"
    },
    {
        id: "5",
        time: "3:30",
        date: "2024-02-10"
    },
    {
        id: "6",
        time: "3:30",
        date: "2024-02-10"
    },
    {
        id: "7",
        time: "3:30",
        date: "2024-02-10"
    },
    {
        id: "8",
        time: "6:30",
        date: "2024-02-11"
    },
    {
        id: "9",
        time: "5:30",
        date: "2024-02-10"
    },
    {
        id: "8",
        time: "6:30",
        date: "2024-02-11"
    },
    {
        id: "9",
        time: "5:30",
        date: "2024-02-10"
    },
    {
        id: "8",
        time: "6:30",
        date: "2024-02-11"
    },
    {
        id: "9",
        time: "5:30",
        date: "2024-02-10"
    },
    {
        id: "8",
        time: "6:30",
        date: "2024-02-21"
    },
    {
        id: "9",
        time: "5:30",
        date: "2024-02-18"
    },
    {
        id: "8",
        time: "6:30",
        date: "2024-02-15"
    },
    {
        id: "9",
        time: "5:30",
        date: "2024-02-21"
    },
    {
        id: "8",
        time: "6:30",
        date: "2024-02-19"
    },
    {
        id: "9",
        time: "5:30",
        date: "2024-02-26"
    }
]

let today = new Date();
let max = 0;
let currentdate = { year: today.getFullYear(), month: today.getMonth(), day: today.getDate() };
let weeks = ['Sun', 'Mon', 'Tue', 'Wed', "Thu", "Fri", "Sat"];
let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
let showState = false;
function myFunction() {
    initShowDetail();
    showState = false;
    let html = "";
    for (let i = 0; i < 6; i++) {
        let customdate = new Date(currentdate.year, currentdate.month, currentdate.day + i);
        html += `<div class = 'day_name div_${i}' onmouseover = 'hoverEvent(true, ${i})' onmouseout = 'hoverEvent(false, ${i})' >`
            + `${i == 0 || i == 5 ? `<button onClick = "${i == 0 ? "clickButton(-1)" : "clickButton(1)"}" class = "btn btn-default ${i == 0 ? "prev-week" : "next-week"}" ><i class = "${i == 0 ? "fas fa-chevron-left" : "fas fa-chevron-right"}"></i></button>` : ""}`
            + `${weeks[customdate.getDay()]} </br>`
            + `${customdate.getDate()} ${months[customdate.getMonth()]}`
            + "</div>"
    }
    GridTime(html);
}

function GridTime(html) {
    let html_c = "";
    tempdata.sort(function (a, b) { return new Date(a.date) - new Date(b.date) });
    max = 0;
    tempdata.map(item => {
        if (item != {}) {
            let data = tempdata.filter(function (a) { return a.date == item.date });
            if (data.length > max) {
                if (new Date(currentdate.year, currentdate.month, currentdate.day).getTime() <= new Date(data[0].date).getTime() && new Date(data[0].date).getTime() <= new Date(currentdate.year, currentdate.month, currentdate.day + 6).getTime()) {
                    max = data.length;
                }
            }
        }
    })
    if (max <= 3) {
        max = 3;
    }
    for (let i = 0; i < max * 6; i++) {
        let customdate = new Date(currentdate.year, currentdate.month, currentdate.day + i % 6 + 1);
        let data = tempdata.filter((item) => { return customdate.toISOString().slice(0, 10) == item.date });

        let temp = data.length != 0 ? data.length >= (parseInt(i / 6) + 1) ? data[parseInt(i / 6)].time : "" : "";
        html_c += `<div onmouseover = 'hoverEvent(true, ${i % 6})' onmouseout = 'hoverEvent(false, ${i % 6})' class = 'day_num  ${temp != "" ? `selected div_${i % 6}` : "ignore"}'>`
            + `${data.length != 0 ? data.length >= (parseInt(i / 6) + 1) ? data[parseInt(i / 6)].time : "" : ""}`
            + "</div>"
    }
    let seemorehtml = "";
    if (max > 3) {
        document.getElementById('calendar-content').style.height = "170px";
        document.getElementById('calendar-content').style.overflow = "hidden";
        for (let i = 0; i < 6; i++) {
            seemorehtml += "<div onclick = 'showDetails()' class = 'see_more'><a href = '#'>see more</a></div>";
        }
    }
    document.getElementById("calendar-header").innerHTML = html;
    document.getElementById("calendar-content").innerHTML = html_c;
    document.getElementById("seemore").innerHTML = seemorehtml;
}

showDetails = () => {
    showState = !showState;
    let seemorehtml = "";
    if (showState) {
        let height = 0;
        console.log(max)
        if(max < 6){
            console.log("sdfsdfsdf")
            height = 55*max;
        }
        else{
            height = 335;
        }
        document.getElementById("calendar-content").style.height = `${height}px`;
        document.getElementById("calendar-content").style.overflowY = "scroll";
        document.getElementById("calendar-header").style.overflowY = "scroll";
        for (let i = 0; i < 6; i++) {
            seemorehtml += "<div onclick = 'showDetails()' class = 'see_more'><a href = '#'>hide</a></div>";
        }
        document.getElementById("seemore").innerHTML = "";
        document.getElementById("seemore").innerHTML = seemorehtml;
    }
    else {
        lessDetail();
    }
}

function lessDetail() {
    let html = "";
    document.getElementById('calendar-content').style.height = "170px";
    document.getElementById('calendar-content').style.overflowY = "hidden";
    document.getElementById('calendar-header').style.overflowY = "hidden";
    document.getElementById('calendar-content').style.transition = "1s";
    document.getElementById('seemore').style.overflowY = "hidden";
    for (let i = 0; i < 6; i++) {
        html += "<div onclick = 'showDetails()' class = 'see_more'><a href = '#'>see more</a></div>";
    }
    document.getElementById("seemore").innerHTML = html;
}

function initShowDetail() {
    document.getElementById('calendar-content').style.height = "170px";
    document.getElementById('calendar-content').style.overflowY = "hidden";
    document.getElementById('calendar-header').style.overflowY = "hidden";
    document.getElementById('calendar-content').style.transition = "1s";
    document.getElementById("seemore").innerHTML = "";
}

function hoverEvent(type, num) {
    let elems = document.getElementsByClassName(`div_${num}`);
    let border = "";
    if (type) {
        border = "2px solid #009bde";
    }
    else {
        border = ""
    }
    for (var i = 0; i < elems.length; i++) {
        elems[i].style.border = border;
    }
}

function clickButton(type) {
    // document.getElementById("seemore").innerHTML = "";
    // document.getElementById("heart_animation").style.display = "block";
    // document.getElementById('calendar-content').style.display = "none";
    // let heart_animation = setTimeout(() => {
    //   document.getElementById("heart_animation").style.display = "none";
    //   document.getElementById('calendar-content').style.display = "flex";
    if (type == -1) {
        currentdate.day = currentdate.day - 6;
    }
    else {
        currentdate.day = currentdate.day + 6;
    }
    myFunction();
    // }, 1500);
}
