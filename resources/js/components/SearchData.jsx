import React from 'react';
import { useEffect, useRef, useState } from "react";
import ReactDOM from 'react-dom/client';
import { createPortal } from 'react-dom';
import './style/modal.css'
import 'react-slideshow-image/dist/styles.css';
import { Fade, Zoom, Slide } from 'react-slideshow-image'
import Modal from './AdminSide/Modal';




const SearchData = () => {

    const [categoryData, setUserdata] = useState([]);
    const [records, setRecords] = useState([{}]);
    useEffect(() => {
        const getUserdata = async () => {
            const reqdata = await fetch('http://127.0.0.1:8000/category_image');
            const resdata = await reqdata.json();
            // console.log(resdata);
            setUserdata(resdata)
            setRecords(resdata)
        }
        getUserdata();
    }, []);
    // const Filter = (event) => {
    //     setRecords(userData.filter(f => f.name.toLowerCase().includes(event.target.value)))

    // }
    // const data = ["All", "single Room", "Deluxxe Room", "Family Room", "Cottage"]
    // const [category, setCategory] = useState([])

    const Filter = (events) => {
        if (events.target.value === "All") {
            setRecords(categoryData);

        }
        else {
            setRecords(categoryData.filter(f => f.category.includes(events.target.value)))
            // console.log(categoryData.filter(f => f.category.includes(event.target.value)));
        }
    }
    const category = [...new Set(categoryData.map((data) => data.category))]
    // counthead    
    const initialcount = 1
    const [Acount, setACount] = useState(initialcount);
    const [Ccount, setCCount] = useState(0);
    if (Acount < 0) {
        setACount(initialcount)
    }
    if (Ccount < 0) {
        setCCount(initialcount)
    }
    const [finalAcount, setfinalACount] = useState(1);
    const [finalCcount, setfinalCCount] = useState(0);

    const fCount = finalAcount + finalCcount;
    useEffect(() => {
        window.sessionStorage.setItem('personCount', JSON.stringify(fCount));
    });

    const setFinalcount = () => {
        setfinalACount(Acount)
        setfinalCCount(Ccount)

        setOpen(false)
    }

    const [open, setOpen] = useState(false)
    const refOne = useRef(null)
    useEffect(() => {
        // setCalendar(format(new Date(), 'MM/dd/yy'))
        document.addEventListener("keydown", hideOnEscape, true)
        document.addEventListener("click", hideOnClickOutside, true)

    }, [])

    const hideOnEscape = (e) => {
        if (e.key === "Enter") {
            setOpen(false)

        }
    }
    const hideOnClickOutside = (e) => {
        if (refOne.current && !refOne.current.contains(e.target)) {
            setOpen(false)

        }

    }

    // endcounthead



    const condition = ''
    const [result, setresult] = useState([{}]);
    const getItem = async (id, category, dayprice, nightprice, images, pax) => {
        setresult({ category, dayprice, nightprice, images, pax })
    }


    const [categoryPic, setCategoryPic] = useState([{}]);
    const [categoryid, setCategoryID] = useState({});
    const getID = (id, GetImage, catcat, total) => {
        setCategoryID(id)
        setCategoryPic(GetImage)
        window.localStorage.setItem(`catcat`, JSON.stringify(catcat));
        window.localStorage.setItem(`ttl-amount`, JSON.stringify(total));
        document.getElementById('spin').classList.remove('hidden');
    };
    useEffect(() => {
        window.localStorage.setItem(`catPic`, JSON.stringify(categoryPic));
    });

    const [dateRange, setDateRange] = useState([{
        startDate: '',
        endDate: '',
        key: 'selection'

    }]);

    useEffect(() => {
        const savedStartDate = window.sessionStorage.getItem('datestorage');
        setDateRange(JSON.parse(savedStartDate));
    }, []);
    const [totalRange, setTotalRange] = useState();
    useEffect(() => {
        const dateOne = new Date(dateRange[0].startDate);
        const dateTwo = new Date(dateRange[0].endDate);
        const time = Math.abs(dateTwo - dateOne);
        const days = Math.ceil(time / (1000 * 60 * 60 * 24));
        setTotalRange(days)
    }, []);


    const [radio, setRadio] = useState("Day Rate(8:00AM - 6:00PM)");
    const [totalRate, setTotalRate] = useState({});
    const [ID, setID] = useState({});
    const [RATE, setRATE] = useState("");
    const setDayRate = (id, rate, head, event) => {
        const radioDayVal = event.target.value;
        const Trate = rate * fCount;
        setID(id);
        setRATE(rate);
        setRadio(radioDayVal)
        setTotalRate(Trate)


    }

    useEffect(() => {
        window.sessionStorage.setItem(`choseRate`, JSON.stringify(radio));
        window.localStorage.setItem(`Rate`, JSON.stringify(RATE));
    });
    const setNightRate = (id, rate, head, event) => {
        window.sessionStorage.setItem(`choseRate`, JSON.stringify(event.target.value));
        window.localStorage.setItem(`Rate`, JSON.stringify(rate));
        const radioNightVal = event.target.value;
        const Trate = rate * fCount;
        setID(id);
        setRATE(rate);
        setRadio(radioNightVal)
        setTotalRate(Trate)

    }

    useEffect(() => {
        localStorage.setItem('DP', parseInt(RATE) * parseFloat(0.5));
        localStorage.setItem('EF', radio === "Day Rate(8:00AM - 6:00PM)" ? parseInt(300) : parseInt(350));
        localStorage.setItem('TA', radio === "Day Rate(8:00AM - 6:00PM)" ? parseInt(300) * parseInt(fCount) + parseInt(RATE) : parseInt(350) * parseInt(fCount) + parseInt(RATE));
    });

    // arrow button corousel
    const initialIndex = 0;
    const [Index, setIndex] = useState(initialIndex);
    useEffect(() => {
        if (Index < 0) {
            setIndex(initialIndex)
        }
    }, [Index]);

    const properties = {
        prevArrow: <button onClick={() => setIndex(Index - 1)} style={{ width: "50px", marginLeft: "10px", color: "white", borderRadius: "100px", background: ' rgba(0, 0, 0, 0.405)', border: '0px', display: "flex", justifyContent: "center", alignItems: "center", zIndex: "1" }}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="w-6 h-6"><path strokeLinecap="round" strokeLinejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" /></svg></button>,
        nextArrow: <button onClick={() => setIndex(Index + 1)} style={{ width: "50px", marginRight: "10px", color: "white", borderRadius: "100px", background: 'rgba(0, 0, 0, 0.405)', border: '0px', display: "flex", justifyContent: "center", alignItems: "center", zIndex: "1" }}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="w-6 h-6"><path strokeLinecap="round" strokeLinejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" /></svg></button>
    }
    // enddhere
    const [list, setList] = useState();
    const setRoomList = (category) => {
        setList(category)
    }
    const [roomrecords, setRoomRecords] = useState([]);
    useEffect(() => {
        const getUserdata = async () => {
            const reqdata = await fetch(`http://127.0.0.1:8000/roomjson`);
            const resdata = await reqdata.json();
            // console.log(resdata);
            setRoomRecords(resdata)
        }
        getUserdata();
    }, [list]);

    const [prefID, setPrefID] = useState(0);
    const [prefCat, setPrefCat] = useState("");
    const [prefNum, setPrefNum] = useState("");
    const setPrefRoom = (id, Cat, roomnum) => {
        setPrefID(id)
        setPrefCat(Cat)
        setPrefNum(roomnum)
        window.sessionStorage.setItem('roomstatus', JSON.stringify(id));
        window.sessionStorage.setItem('roomnum', JSON.stringify(roomnum));
    }


    const [isOpen, setIsOpen] = useState(false);


    const backgroundStyle = {
        backgroundImage: 'asset(../assets/image/logo.png)',
        backgroundSize: 'cover',
        backgroundPosition: 'center',

    };
    const [isOpenModalPrice, setIsOpenModalPrice] = useState(false);


    // const [rateRecords, setrateRecords] = useState([]);

    // const openRate = async (category, room) => {
    //     const reqdata = await fetch(`http://127.0.0.1:8000/ratejson/${category}/${room}`);
    //     const resdata = await reqdata.json();
    //     setrateRecords(resdata);

    //         if (resdata.time === "Night Rate(8:00PM - 6:00AM)") {
    //             document.getElementById('content-container').innerHTML = `
    //             <div class='mt-[5px] h-[100%]'>
    //                 <div>
    //                 <i onclick="()=>backRate()" class='bx bx-left-arrow-alt text-[30px]'></i>
    //                 </div>
    //                 <div class='flex mt-2 opacity-50 cursor-not-allowed'>
    //                     <input type="radio" disabled class='bg-transparent opacity-50 rounded-md absolute inline-flex w-[450px] h-[30%] content-none' />
    //                     <div class='relative flex p-[5px] h-[100%]'>
    //                         <svg class='h-[100%] text-center w-[100px] text-[30px] text-center pt-[5px] menu__name' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" width="20" height="20">
    //                             <path strokeLinecap="round" strokeLinejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
    //                         </svg>
    //                         <label class='menu__name cursor-pointer p-[10px] text-center text-[20px] select-none cursor-not-allowed'>Day Rate(8:00AM - 6:00PM):  </label>

    //                     </div>
    //                 </div>  
    //                 <div class='flex mt-[60px]'>
    //                     <input onclick="${(event) => setDayRate(resdata.id, 'Night Rate(8:00PM - 6:00AM)', resdata.personCount, event)}" type="radio" name="rate" id="night" class='bg-transparent rounded-md absolute inline-flex w-[450px] h-[30%] content-none' />
    //                     <div class='relative flex p-[5px]'>
    //                         <svg class='h-[100%] text-center w-[100px] text-[30px] text-center pt-[5px] menu__name' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" width="20" height="20" >
    //                             <path strokeLinecap="round" strokeLinejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
    //                         </svg>
    //                         <label for="night" class='menu__name p-[10px] text-center text-[20px] cursor-pointer text-[12px]'>Night Rate(8:00PM - 6:00AM): </label>
    //                     </div>
    //                 </div>

    //             </div>       
    // `;

    //         }
    //         else if (resdata.time === "Day Rate(8:00AM - 6:00PM)") {
    //             document.getElementById('content-container').innerHTML = `
    //                                         <div class='mt-[5px] h-[100%]'>
    //                                             <div>
    //                                             <i onclick="()=>backRate()" class='bx bx-left-arrow-alt text-[30px]'></i>
    //                                             </div>
    //                                             <div class='flex mt-2 opacity-50 cursor-not-allowed'>
    //                                                 <input type="radio" disabled class='bg-transparent opacity-50 rounded-md absolute inline-flex w-[450px] h-[30%] content-none' />
    //                                                 <div class='relative flex p-[5px] h-[100%]'>
    //                                                     <svg class='h-[100%] text-center w-[100px] text-[30px] text-center pt-[5px] menu__name' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" width="20" height="20">
    //                                                         <path strokeLinecap="round" strokeLinejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
    //                                                     </svg>
    //                                                     <label class='menu__name cursor-pointer p-[10px] text-center text-[20px] select-none cursor-not-allowed'>Day Rate(8:00AM - 6:00PM):  </label>

    //                                                 </div>

    //                                             </div>  
    //                                             <div class='flex mt-[60px]'>
    //                                                 <input onclick="${(event) => console.log(resdata.id)}" type="radio" name="rate" id="night" class='bg-transparent rounded-md absolute inline-flex w-[450px] h-[30%] content-none' />
    //                                                 <div class='relative flex p-[5px]'>
    //                                                     <svg class='h-[100%] text-center w-[100px] text-[30px] text-center pt-[5px] menu__name' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" width="20" height="20" >
    //                                                         <path strokeLinecap="round" strokeLinejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
    //                                                     </svg>
    //                                                     <label for="night" class='menu__name p-[10px] text-center text-[20px] cursor-pointer text-[12px]'>Night Rate(8:00PM - 6:00AM): </label>
    //                                                 </div>
    //                                             </div>

    //                                         </div>       
    //             `;

    //         }
    //         else {
    //             document.getElementById('content-container').innerHTML = `
    //                                         <div class='mt-[5px] h-[100%]'>
    //                                             <div>
    //                                             <i onclick="()=>backRate()" class='bx bx-left-arrow-alt text-[30px]'></i>
    //                                             </div>
    //                                             <div class='flex mt-2 opacity-50 cursor-not-allowed'>
    //                                                 <input type="radio" disabled class='bg-transparent opacity-50 rounded-md absolute inline-flex w-[450px] h-[30%] content-none' />
    //                                                 <div class='relative flex p-[5px] h-[100%]'>
    //                                                     <svg class='h-[100%] text-center w-[100px] text-[30px] text-center pt-[5px] menu__name' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" width="20" height="20">
    //                                                         <path strokeLinecap="round" strokeLinejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
    //                                                     </svg>
    //                                                     <label class='menu__name cursor-pointer p-[10px] text-center text-[20px] select-none cursor-not-allowed'>Day Rate(8:00AM - 6:00PM):  </label>

    //                                                 </div>
    //                                             </div>  
    //                                             <div class='flex mt-[60px]'>
    //                                                 <input onclick="${(event) => setDayRate(resdata.id, 'Night Rate(8:00PM - 6:00AM)', resdata.personCount, event)}" type="radio" name="rate" id="night" class='bg-transparent rounded-md absolute inline-flex w-[450px] h-[30%] content-none' />
    //                                                 <div class='relative flex p-[5px]'>
    //                                                     <svg class='h-[100%] text-center w-[100px] text-[30px] text-center pt-[5px] menu__name' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" width="20" height="20" >
    //                                                         <path strokeLinecap="round" strokeLinejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
    //                                                     </svg>
    //                                                     <label for="night" class='menu__name p-[10px] text-center text-[20px] cursor-pointer text-[12px]'>Night Rate(8:00PM - 6:00AM): </label>
    //                                                 </div>
    //                                             </div>

    //                                         </div>       

    //             `;

    //         }

    // };
    // const backRate = () => {

    // }


    return (
        <>
            <div className='searchdata'>

                <div style={{ display: "flex", height: "50%", gap: "10px", paddingLeft: "5px", marginTop: "1rem" }}>

                    <input type="text" value={"All"} readOnly
                        onClick={Filter}
                        className='bg-green-500 border-none text-center rounded-full cursor-pointer text-white h-full p-2 hover:bg-green-700  focus:bg-green-700 ' style={{ width: "100px" }} />
                    <input type="text" value={"Room"} readOnly
                        onClick={Filter}
                        className='bg-green-500 focus:bg-green-700 hover:bg-green-700  border-none text-center rounded-full cursor-pointer text-white h-full w-20 p-2' style={{ width: "100px" }} />
                    <input type="text" value={"Cottage"} readOnly
                        onClick={Filter}
                        className='bg-green-500 focus:bg-green-700 hover:bg-green-700  border-none text-center rounded-full cursor-pointer text-white h-full w-20 p-2' style={{ width: "100px" }} />

                </div>
                {/* ================== COUNT MODAL =============== */}

                <div id='bd-example-modal-sm' className="modal bd-example-modal-sm" tabIndex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div className="modal-dialog modal-sm" style={{ position: "absolute", top: "50%", left: "50%", transform: "translate(-50%,-50%)" }}>
                        <div className="modal-content-sm">
                            <div className="adult" style={{ height: "100%" }}>
                                <div className="leftside text-black">
                                    <h1>Adult</h1>
                                </div>
                                <div className="rightside text-black">
                                    {Acount <= 1 ? <h1 style={{ cursor: "not-allowed", opacity: "0.25" }} >-</h1> : <h1 onClick={() => setACount(Acount - 1)}>-</h1>}
                                    <input type="text" value={Acount} style={{ width: "40px" }} readOnly />
                                    {Acount == 20 ? <h1 style={{ cursor: "not-allowed", opacity: "0.25" }}>+</h1>
                                        : <h1 onClick={() => setACount(Acount + 1)} >+</h1>}
                                </div>

                            </div>
                            <div className="child" style={{ height: "100%", marginTop: "10px" }}>
                                <div className="leftside">
                                    <div className='text-black'>
                                        <h1>Children</h1>
                                        <p>Ages 5 and Above</p>
                                    </div>
                                </div>
                                <div className="rightside text-black">
                                    {Ccount <= 0 ? <h1 style={{ cursor: "not-allowed", opacity: "0.25" }} >-</h1> : <h1 onClick={() => setCCount(Ccount - 1)}>-</h1>}
                                    <input type="text" value={Ccount} style={{ width: "40px" }} readOnly />
                                    <h1 onClick={() => setCCount(Ccount + 1)}>+</h1>
                                </div>
                            </div>
                            <div className='h-50 w-full bg-white mt-8'>
                                <a onClick={() => setFinalcount()} data-bs-dismiss="modal" aria-label="Close" className='h-10 w-full bg-green-500 inline-flex text-decoration-none text-white float-right justify-center items-center cursor-pointer hover:bg-green-700'>Done</a>
                            </div>

                        </div>
                    </div>
                </div>

                {createPortal(
                    <div data-bs-toggle="modal" data-bs-target="#bd-example-modal-sm" onClick={() => setOpen(open => !open)} className="counthead" style={{ display: "flex", height: "60px", cursor: "pointer" }}>
                        <div style={{ width: "30%", lineHeight: "100%", display: "flex", justifyContent: "center", alignItems: "center" }}>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" className="bi bi-person-standing" viewBox="0 0 16 16">
                                <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M6 6.75v8.5a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2.75a.75.75 0 0 0 1.5 0v-2.5a.25.25 0 0 1 .5 0" />
                            </svg>

                        </div>
                        <div style={{ width: "80%", height: "100%", display: "flex" }} >
                            <div>
                                <h1 style={{ fontSize: "15px", color: "white" }} >Guests</h1>
                                <div className='flex gap-2 mt-2'>
                                    <div style={{ display: "flex" }}>
                                        <input type="text" value={finalAcount} style={{ width: "20px", padding: "0", backgroundColor: "transparent", border: "none", userSelect: "none", color: "white", fontWeight: "bold", cursor: "pointer" }} readOnly /><h2 className='text-white'>Adult,</h2>
                                    </div>
                                    <div style={{ display: "flex" }}>
                                        <input type="text" value={finalCcount} style={{ width: "20px", padding: "0", backgroundColor: "transparent", border: "none", userSelect: "none", color: "white", fontWeight: "bold", cursor: "pointer" }} readOnly /><h2 className='text-white'>Child</h2>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>,
                    document.getElementById('port'))}

                {
                    createPortal(
                        records.map((val, indexes) =>
                            val.pax >= fCount ?
                                <div className="card" style={{ width: "18rem", marginTop: "1rem", marginLeft: "1rem", display: "inline-flex" }}>
                                    <Slide autoplay={false} {...properties}>
                                        {
                                            val.product_images.map(data => (
                                                <img src={`${data.image}`} alt="" style={{ height: "210px", width: "400px" }} />
                                            ))
                                        }

                                    </Slide>
                                    <div className="card-body menu__content" style={{ borderRadius: "0%" }}>
                                        <h5 className="card-title menu__name">{val.category}</h5>
                                        <p className="card-text menu__name text-md">The joy of staying in our {val.category == 'Cottage' ? 'cottage' : 'room'}</p>
                                        <div>
                                            <ul style={{ listStyle: "none", marginBottom: "0" }}>
                                                <li className='menu__name' style={{ display: "inline-flex" }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80a80 80 0 1 1 160 0A80 80 0 1 1 480 80zM412.7 281.7l48.2-79C465 196.1 472.2 192 480 192s15 4.1 19.1 10.7l132 216.3c5.8 9.6 8.9 20.6 8.9 31.8c0 33.8-27.4 61.1-61.1 61.1H456.1h0H55.9C25 512 0 487 0 456.1c0-10.5 3-20.8 8.6-29.7L225.2 81c6.6-10.6 18.3-17 30.8-17s24.1 6.4 30.8 17l126 200.7zm28.5 45.4l62.2 99.2c5.6 8.9 8.6 19.2 8.6 29.7c0 2.7-.2 5.3-.6 7.9h67.4c7.2 0 13.1-5.9 13.1-13.1c0-2.4-.7-4.8-1.9-6.8L480 263.6l-38.8 63.6zM456.1 464c4.4 0 7.9-3.5 7.9-7.9c0-1.5-.4-2.9-1.2-4.2L256 122.3 49.2 451.9c-.8 1.3-1.2 2.7-1.2 4.2c0 4.4 3.5 7.9 7.9 7.9H456.1z" /></svg>
                                                    <p style={{ marginLeft: "10px", fontSize: "12px" }}>Nature view</p>
                                                </li>
                                                <li className='menu__name' style={{ display: "flex" }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 576 512"><path d="M377 52c11-13.8 8.8-33.9-5-45s-33.9-8.8-45 5L288 60.8 249 12c-11-13.8-31.2-16-45-5s-16 31.2-5 45l48 60L12.3 405.4C4.3 415.4 0 427.7 0 440.4V464c0 26.5 21.5 48 48 48H288 528c26.5 0 48-21.5 48-48V440.4c0-12.7-4.3-25.1-12.3-35L329 112l48-60zM288 448H168.5L288 291.7 407.5 448H288z" /></svg>
                                                    <p style={{ marginLeft: "10px", fontSize: "12px" }}>Camp site</p>
                                                </li>
                                                <li className='menu__name' style={{ display: "flex" }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-people-fill" viewBox="0 0 16 16">
                                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                                    </svg>
                                                    <p style={{ marginLeft: "10px", fontSize: "12px" }}>Sleeps / Pax&nbsp;{val.pax} </p>
                                                </li>
                                                <li className='menu__name' style={{ display: "flex" }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 448 512"><path d="M210.6 5.9L62 169.4c-3.9 4.2-6 9.8-6 15.5C56 197.7 66.3 208 79.1 208H104L30.6 281.4c-4.2 4.2-6.6 10-6.6 16C24 309.9 34.1 320 46.6 320H80L5.4 409.5C1.9 413.7 0 419 0 424.5c0 13 10.5 23.5 23.5 23.5H192v32c0 17.7 14.3 32 32 32s32-14.3 32-32V448H424.5c13 0 23.5-10.5 23.5-23.5c0-5.5-1.9-10.8-5.4-15L368 320h33.4c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16L344 208h24.9c12.7 0 23.1-10.3 23.1-23.1c0-5.7-2.1-11.3-6-15.5L237.4 5.9C234 2.1 229.1 0 224 0s-10 2.1-13.4 5.9z" /></svg>
                                                    <p style={{ marginLeft: "10px", fontSize: "12px" }}>Farm</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <a className='text-sm no-underline cursor-pointer font-bold hover:underline' style={{ color: "#3FA2F6" }} data-bs-toggle="modal" data-bs-target="#myModal" onClick={() => getItem(val.id, val.category, val.Day_Rate, val.Night_Rate, val.product_images, val.pax)} >
                                                More details

                                            </a>
                                        </div>
                                        <div className='mt-[5px]'>
                                            <div className='flex mt-2'>
                                                <input type="radio" name={`${val.category}`} id={`${val.id}`} className='bg-transparent rounded-md absolute inline-flex w-[85%] h-[10%] content-none' onClick={(event) => setDayRate(val.id, val.Day_Rate, val.pax, event)} value="Day Rate(8:00AM - 6:00PM)" defaultChecked />
                                                <div className='relative flex p-[5px]'>
                                                    <svg className='h-[100%] text-center w-[50px] menu__name' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" width="20" height="20">
                                                        <path strokeLinecap="round" strokeLinejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                                                    </svg>
                                                    <label htmlFor={`${val.id}`} className='menu__name p-1 cursor-pointer text-[12px]'>Day Rate(8:00AM - 6:00PM): P{val.Day_Rate}</label>
                                                </div>
                                            </div>
                                            <div className='flex mt-2'>
                                                <input type="radio" name={`${val.category}`} id={`${val.category}`} className='bg-transparent absolute inline-flex w-[85%] h-[10%] rounded-md content-none' onClick={(event) => setNightRate(val.id, val.Night_Rate, val.pax, event)} value="Night Rate(8:00PM - 6:00AM)" />
                                                <div className='relative flex p-[5px]'>
                                                    <svg className=' menu__name h-[100%] text-center w-[50px]' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" width="20" height="20" >
                                                        <path strokeLinecap="round" strokeLinejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                                                    </svg>
                                                    <label htmlFor={`${val.category}`} className='menu__name p-1 cursor-pointer text-[12px]'>Night Rate(8:00PM - 6:00AM): P{val.Night_Rate}</label>
                                                </div>
                                            </div>
                                            <a className='flex text-sm no-underline cursor-pointer font-bold hover:underline' style={{ color: "#3FA2F6", marginTop: "10px" }} data-bs-toggle="modal" data-bs-target="#myRoomNumber" onClick={() => setRoomList(val.category)} >
                                                Choose preferred room

                                            </a>
                                        </div>

                                        <div className="mt-[20px]">
                                            <div className='menu__name'>
                                                <div>
                                                    <x-input-label style={{ fontWeight: "bold", fontSize: "20px" }}>P {val.id == ID ? RATE : val.Day_Rate}<p className='text-xs m-0 inline-flex font-normal'>per room</p></x-input-label><br />
                                                    {/* <x-input-label style={{ fontSize: "12px" }}>P{val.id == ID ? totalRate : val.Day_Rate * fCount} total</x-input-label> */}


                                                </div>
                                                <div>
                                                    <a data-bs-toggle="modal" data-bs-target="#myModalPriceDetails" onClick={() => setIsOpenModalPrice(true)} className='text-sm no-underline cursor-pointer' style={{ color: "#3FA2F6" }}>Price details
                                                    </a>
                                                </div>
                                            </div>
                                            <div style={{ backgroundColor: "transparent", display: "flex", paddingTop: "2rem" }}>
                                                {prefID === 0 ?
                                                    <div className="" style={{ opacity: "0.25", cursor: "not-allowed", background: "transparent", width: "100%" }}>
                                                        <a style={{ padding: "20px 40px 20px 40px", display: "flex", width: "100%", height: "50%", justifyContent: "center", alignItems: "center", borderRadius: "20px", color: "#fff" }} id='reserve' className='no-underline bg-green-500'>
                                                            Proceed &nbsp;
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" className="bi bi-chevron-right" viewBox="0 0 16 16">
                                                                <path fillRule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                                                            </svg>
                                                        </a >
                                                    </div> : (prefCat === val.category ? <div className="" style={{ background: "transparent", width: "100%" }}>
                                                        <a style={{ padding: "20px 40px 20px 40px", display: "flex", width: "100%", height: "50%", justifyContent: "center", alignItems: "center", borderRadius: "20px", color: "#fff" }} id='reserve' href={`./payment/${categoryid}`} onClick={() => getID(val.id, val.product_images, val.category, val.id == ID ? totalRate : val.Day_Rate * fCount)} className='no-underline bg-green-500'>
                                                            <svg id='spin' className="animate-spin hidden border-solid border-[4px] border-green-200 h-6 w-6 mr-3 bg-transparent border-t-[4px] border-t-white rounded-full" viewBox="0 0 24 24"></svg>
                                                            Proceed &nbsp;
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" className="bi bi-chevron-right" viewBox="0 0 16 16">
                                                                <path fillRule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                                                            </svg>
                                                        </a >
                                                    </div> : <div className="" style={{ opacity: "0.25", cursor: "not-allowed", background: "transparent", width: "100%" }}>
                                                        <a style={{ padding: "20px 40px 20px 40px", display: "flex", width: "100%", height: "50%", justifyContent: "center", alignItems: "center", borderRadius: "20px", color: "#fff" }} id='reserve' className='no-underline bg-green-500'>
                                                            Proceed &nbsp;
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" className="bi bi-chevron-right" viewBox="0 0 16 16">
                                                                <path fillRule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                                                            </svg>
                                                        </a >
                                                    </div>)
                                                }
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                : ""


                        ), document.getElementById('Portal')
                    )
                }
                {/* modal price details */}
                {
                    createPortal(

                        <div id='myModalPriceDetails' className="modal" tabIndex="-1" role="dialog">
                            <div className="modal-dialog" role="document">
                                <div className="bg-white rounded-md translate-y-[100%]">
                                    <div className="modal-header">
                                        <h5 className="modal-title">Price Details</h5>
                                        <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div className="modal-body p-[20px]">
                                        <table className='table w-[100%]'>
                                            <tr>
                                                <th className='text-start'>Room:</th>
                                                <td>{RATE}</td>
                                            </tr>
                                            <tr className='border-b border-gray-500'>
                                                <th className='text-start'>Entrance fee:</th>
                                                <td>
                                                    {
                                                        radio === "Day Rate(8:00AM - 6:00PM)" ? "300" + " x " + fCount : "350" + " x " + fCount
                                                    }
                                                </td>
                                            </tr>
                                            <tr className='border-b border-gray-500'>
                                                <th className='text-start'>Total:</th>
                                                <td>
                                                    {
                                                        radio === "Day Rate(8:00AM - 6:00PM)" ? parseInt(300) * parseInt(fCount) + parseInt(RATE) : parseInt(350) * parseInt(fCount) + parseInt(RATE)
                                                    }
                                                </td>
                                            </tr>
                                            <tr>
                                                <th className='text-start'>Downpayment:</th>
                                                <td>
                                                    {
                                                        radio === "Day Rate(8:00AM - 6:00PM)" ? parseInt(RATE) * parseFloat(0.5) : parseInt(RATE) * parseFloat(0.5)
                                                    }
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div className="modal-footer">
                                        <button type="button" className="bg-green-400 p-[10px] rounded-md text-white font-bold" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        , document.getElementById('modalPriceDetails')
                    )
                }
                {/* end modal price details */}

                {
                    createPortal(
                        <div>
                            <div className="modal fade" id="myRoomNumber" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div className="modal-dialog" role="document" style={{ backgroundColor: "green" }}>
                                    <div className="modal-content" style={{ width: "70vh", position: "absolute", top: "50%", left: "50%", transform: "translate(-50%)" }}>
                                        <div className="modal-header" style={{ backgroundColor: "#294B29" }}>
                                            <h5 className="modal-title text-white" id="exampleModalLabel">{list}'s</h5>
                                            <button style={{ marginRight: "20px" }} type="button" className="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span className="flex text-4xl text-white" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div className="modal-header" style={{ borderBottom: "none" }}>
                                            <div style={{ gap: "5px", display: "flex" }}>
                                                <div id="headerRoom"></div>
                                            </div>
                                        </div>
                                        <div id='content-container' className="modal-body menu__content" style={{ padding: "15px", borderRadius: "0%", position: "relative" }}>


                                            {roomrecords && roomrecords.map((a, m) =>
                                            (
                                                a.Category === list &&
                                                (
                                                    a.Status === 'Available' ?

                                                        <div> <div className='card__num mt-2' key={m}>

                                                            <input type="radio" name={`${a.Category}-card`} id={`${a.Category}-con`} className="card-radio" onClick={() => setPrefRoom(a.id, a.Category, a.Room)} />
                                                            {
                                                                records.category === a.Category ?
                                                                    <div className='absolute w-[100%] h-[100%] rounded-lg' style={{}} >dsdssd</div>
                                                                    :
                                                                    ''
                                                            }

                                                            <label className='card-label' htmlFor={`${a.Category}-con`}>
                                                                <h2>{a.Room}</h2>
                                                            </label>

                                                        </div>

                                                        </div> : <div> <div className='card__num mt-2 '>
                                                            <input type="radio" name="" id="" className='card-radio' style={{ cursor: "not-allowed" }} disabled />
                                                            <label className='card-label' htmlFor="">
                                                                <h2 style={{ opacity: "0.25" }}>{a.Room}</h2>

                                                            </label>

                                                        </div>

                                                        </div>
                                                )
                                            )
                                            )}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        , document.getElementById('roommodal')
                    )
                }

                {/* modal category */}
                {createPortal(
                    <div id="myModal" className="modal fade" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                        <div className="modal-dialog">
                            <div className="modal-content">
                                <div className="modal-header" style={{ backgroundColor: " #294B29" }}>
                                    <h5 className="modal-title" id="myModalLabel" style={{ color: "white" }}>Room information</h5>
                                    <button type="button" className="close" data-bs-dismiss="modal" aria-label="Close" style={{ marginRight: "20px" }} >
                                        <span aria-hidden="true" className='text-white text-4xl'>&times;</span>
                                    </button>
                                </div>
                                <div className="modal-body menu__content" style={{ padding: "15px", borderRadius: "0%" }}>
                                    <div className='photo' style={{ backgroundColor: "transparent" }}>
                                        <Slide autoplay={false} {...properties}>
                                            {result.images && result.images.map((a, b) => (
                                                <img src={`${a.image}`} alt="" style={{ height: "300px", width: "100%", borderRadius: "10px" }} key={b} />
                                            ))}
                                        </Slide>
                                    </div>
                                    <div className="content">
                                        <div className='heading' style={{ display: "flex", gap: "10px" }}>
                                            <h1></h1>
                                            <p className='menu__name' style={{ fontSize: "25px", fontWeight: "bold" }}>{result.category}</p>

                                        </div>
                                        <div className='general-amenities'>
                                            <ul style={{ listStyle: "none", marginBottom: "0" }}>
                                                <li className='menu__name' style={{ display: "inline-flex" }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80a80 80 0 1 1 160 0A80 80 0 1 1 480 80zM412.7 281.7l48.2-79C465 196.1 472.2 192 480 192s15 4.1 19.1 10.7l132 216.3c5.8 9.6 8.9 20.6 8.9 31.8c0 33.8-27.4 61.1-61.1 61.1H456.1h0H55.9C25 512 0 487 0 456.1c0-10.5 3-20.8 8.6-29.7L225.2 81c6.6-10.6 18.3-17 30.8-17s24.1 6.4 30.8 17l126 200.7zm28.5 45.4l62.2 99.2c5.6 8.9 8.6 19.2 8.6 29.7c0 2.7-.2 5.3-.6 7.9h67.4c7.2 0 13.1-5.9 13.1-13.1c0-2.4-.7-4.8-1.9-6.8L480 263.6l-38.8 63.6zM456.1 464c4.4 0 7.9-3.5 7.9-7.9c0-1.5-.4-2.9-1.2-4.2L256 122.3 49.2 451.9c-.8 1.3-1.2 2.7-1.2 4.2c0 4.4 3.5 7.9 7.9 7.9H456.1z" /></svg>
                                                    <p style={{ marginLeft: "10px", fontSize: "12px" }}>Nature view</p>
                                                </li>
                                                <li className='menu__name' style={{ display: "flex" }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 576 512"><path d="M377 52c11-13.8 8.8-33.9-5-45s-33.9-8.8-45 5L288 60.8 249 12c-11-13.8-31.2-16-45-5s-16 31.2-5 45l48 60L12.3 405.4C4.3 415.4 0 427.7 0 440.4V464c0 26.5 21.5 48 48 48H288 528c26.5 0 48-21.5 48-48V440.4c0-12.7-4.3-25.1-12.3-35L329 112l48-60zM288 448H168.5L288 291.7 407.5 448H288z" /></svg>
                                                    <p style={{ marginLeft: "10px", fontSize: "12px" }}>Camp site</p>
                                                </li>
                                                <li className='menu__name' style={{ display: "flex" }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-people-fill" viewBox="0 0 16 16">
                                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                                    </svg>
                                                    <p style={{ marginLeft: "10px", fontSize: "12px" }}>Sleeps / Pax&nbsp;{result.pax} </p>
                                                </li>
                                                <li className='menu__name' style={{ display: "flex" }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 448 512"><path d="M210.6 5.9L62 169.4c-3.9 4.2-6 9.8-6 15.5C56 197.7 66.3 208 79.1 208H104L30.6 281.4c-4.2 4.2-6.6 10-6.6 16C24 309.9 34.1 320 46.6 320H80L5.4 409.5C1.9 413.7 0 419 0 424.5c0 13 10.5 23.5 23.5 23.5H192v32c0 17.7 14.3 32 32 32s32-14.3 32-32V448H424.5c13 0 23.5-10.5 23.5-23.5c0-5.5-1.9-10.8-5.4-15L368 320h33.4c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16L344 208h24.9c12.7 0 23.1-10.3 23.1-23.1c0-5.7-2.1-11.3-6-15.5L237.4 5.9C234 2.1 229.1 0 224 0s-10 2.1-13.4 5.9z" /></svg>
                                                    <p style={{ marginLeft: "10px", fontSize: "12px" }}>Farm</p>
                                                </li>
                                            </ul>
                                        </div>

                                        <div className='room-amenities'>
                                            <h1 className='menu__name'>Room amenities</h1>
                                            <div className='room-amenities-con'>
                                                <div className='bathandbed'>
                                                    <div className='bathroom'>
                                                        <h2 className='menu__name'>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="23" height="23" fill="currentColor">
                                                                <path d="M64 131.9C64 112.1 80.1 96 99.9 96c9.5 0 18.6 3.8 25.4 10.5l16.2 16.2c-21 38.9-17.4 87.5 10.9 123L151 247c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0L345 121c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-1.3 1.3c-35.5-28.3-84.2-31.9-123-10.9L170.5 61.3C151.8 42.5 126.4 32 99.9 32C44.7 32 0 76.7 0 131.9V448c0 17.7 14.3 32 32 32s32-14.3 32-32V131.9zM256 352a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm64 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm0-128a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm64 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm0-128a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm64 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm32-32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                                                            </svg>
                                                            Bathroom
                                                        </h2>
                                                        <ul>
                                                            <li className='menu__name'>Towel</li>

                                                        </ul>
                                                    </div>
                                                    <div className='bedroom'>
                                                        <h2 className='menu__name'>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="20" height="20" fill="currentColor">
                                                                <path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" />
                                                            </svg>
                                                            Bedroom
                                                        </h2>
                                                        <ul>
                                                            <li className='menu__name'>Towel</li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div className='internetandfood'>
                                                    <div className='internet'>
                                                        <h2 className='menu__name'>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="20" height="20" fill="currentColor">
                                                                <path d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z" />
                                                            </svg>
                                                            Internet
                                                        </h2>
                                                        <ul>
                                                            <li className='menu__name'>Free Wifi</li>

                                                        </ul>
                                                    </div>
                                                    <div className='food'>
                                                        <h2 className='menu__name'>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="currentColor">
                                                                <path d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                                                            </svg>
                                                            Food and Drink
                                                        </h2>
                                                        <ul>
                                                            <li className='menu__name'>Towel</li>

                                                        </ul>
                                                    </div>

                                                </div>
                                                <div className='entertainmentandmore'>

                                                    <div className='entertainment'>
                                                        <h2 className='menu__name'>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="currentColor">
                                                                <path d="M192 104.8c0-9.2-5.8-17.3-13.2-22.8C167.2 73.3 160 61.3 160 48c0-26.5 28.7-48 64-48s64 21.5 64 48c0 13.3-7.2 25.3-18.8 34c-7.4 5.5-13.2 13.6-13.2 22.8c0 12.8 10.4 23.2 23.2 23.2H336c26.5 0 48 21.5 48 48v56.8c0 12.8 10.4 23.2 23.2 23.2c9.2 0 17.3-5.8 22.8-13.2c8.7-11.6 20.7-18.8 34-18.8c26.5 0 48 28.7 48 64s-21.5 64-48 64c-13.3 0-25.3-7.2-34-18.8c-5.5-7.4-13.6-13.2-22.8-13.2c-12.8 0-23.2 10.4-23.2 23.2V464c0 26.5-21.5 48-48 48H279.2c-12.8 0-23.2-10.4-23.2-23.2c0-9.2 5.8-17.3 13.2-22.8c11.6-8.7 18.8-20.7 18.8-34c0-26.5-28.7-48-64-48s-64 21.5-64 48c0 13.3 7.2 25.3 18.8 34c7.4 5.5 13.2 13.6 13.2 22.8c0 12.8-10.4 23.2-23.2 23.2H48c-26.5 0-48-21.5-48-48V343.2C0 330.4 10.4 320 23.2 320c9.2 0 17.3 5.8 22.8 13.2C54.7 344.8 66.7 352 80 352c26.5 0 48-28.7 48-64s-21.5-64-48-64c-13.3 0-25.3 7.2-34 18.8C40.5 250.2 32.4 256 23.2 256C10.4 256 0 245.6 0 232.8V176c0-26.5 21.5-48 48-48H168.8c12.8 0 23.2-10.4 23.2-23.2z" />
                                                            </svg>
                                                            Entertainment
                                                        </h2>
                                                        <ul>
                                                            <li className='menu__name'>Towel</li>

                                                        </ul>
                                                    </div>
                                                    <div className='more'>
                                                        <h2 className='menu__name'>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-check-lg" viewBox="0 0 16 16">
                                                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                                                            </svg>
                                                            More
                                                        </h2>
                                                        <ul>
                                                            <li className='menu__name'>Towel</li>

                                                        </ul>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                        <div className='option'>
                                            <div className='option-con-list'>
                                                <div className='room-option-list'>
                                                    <div className='room-option'>
                                                        <h3 className='menu__name'>Room Options</h3>
                                                    </div>
                                                    <div className='cancelpolicy'>
                                                        <h3 className='menu__name'>Cancellation policy</h3>
                                                    </div>
                                                    <div className='refundable-option'>
                                                        <div className='refundable menu__content'>
                                                            <input type="Radio" defaultChecked />Non-Refundable
                                                            <p className='menu__name'>Reservation fee</p>
                                                        </div>
                                                        <div className='fee'>
                                                            <h3 className='menu__name'>P 2,000</h3>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div className='container-price'>
                                                <div className='price-sub-con'>
                                                    <div className='price-sub-list'>
                                                        <h1 className='menu__name'>P{result.dayprice}</h1>
                                                        <div className='subtotal'>
                                                            <p className='menu__name'>P{result.dayprice * fCount} total </p>

                                                        </div>
                                                        <p className='menu__name'>{fCount} person</p>
                                                        <p className='menu__name'>1 night</p>

                                                    </div>
                                                    <div className='reserve-btn'>
                                                        <button type="submit" className="btn btn-primary">Reserve</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                {/* <div className="modal-footer">
                         <button type="button" className="btn btn-primary">Reserve</button>
                         <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button>
                     </div>  */}
                            </div>
                        </div>
                    </div>,
                    document.getElementById('modal')



                )}

                {/* end */}

            </div >
        </>
    )
}
const root = ReactDOM.createRoot(document.getElementById('search'));
root.render(<SearchData />);

export default SearchData
