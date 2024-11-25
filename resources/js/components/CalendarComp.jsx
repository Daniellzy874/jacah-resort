import React from 'react';
import ReactDOM from 'react-dom/client';
import { useEffect, useRef, useState } from "react";
import { DateRange } from "react-date-range";
import format from "date-fns/format";
import { addDays, getDate } from 'date-fns';

import 'react-date-range/dist/styles.css'; // main css file
import 'react-date-range/dist/theme/default.css'; // theme css file
import { createPortal } from 'react-dom';



const DateRangeComp = () => {


    const [datePicker, setDatePicker] = useState([{
        startDate: new Date(),
        endDate: addDays(new Date(), 1),
        key: 'selection'

    }]);


    useEffect(() => {
        const savedStartDate = window.sessionStorage.getItem('datestorage');
        setDatePicker(JSON.parse(savedStartDate));
    }, [])

    useEffect(() => {
        window.sessionStorage.setItem('datestorage', JSON.stringify(datePicker))
    }, datePicker)


    if (!sessionStorage.getItem('reloaded')) {
        // Reload the page
        window.location.reload();
        // Set a flag in sessionStorage to indicate that the page has been reloaded
        sessionStorage.setItem('reloaded', 'true');
    }



    // or date open and close functionw
    const [open, setOpen] = useState(false)
    const [bukas, setBukas] = useState(false)
    const refOne = useRef(null)

    useEffect(() => {
        // setCalendar(format(new Date(), 'MM/dd/yy'))
        document.addEventListener("keydown", hideOnEscape, true)
        document.addEventListener("click", hideOnClickOutside, true)

    }, [])

    const hideOnEscape = (e) => {
        if (e.key === "Enter") {
            setOpen(false)
            setBukas(false)
        }
    }
    const hideOnClickOutside = (e) => {
        if (refOne.current && !refOne.current.contains(e.target)) {
            setOpen(false)
            setBukas(false)
        }

    }
    // end here date




    // const datedate = `${format(range[0].startDate, "MMMM dd")}-${format(range[0].endDate, "MMMM dd")}`;
    // pathEnd(`${format(range[0].endDate, "MMMM dd, yyyy")}`);
    // const max = addDays(new Date(), 0);

    // const datadate = `${format(range[0].startDate, "MMMM dd")} - ${format(range[0].endDate, "MMMM dd")}`;

    const current = `${format(new Date(), "MMMM dd")} - ${format(new Date(), "MMMM dd")}`;

    const pickDate = (e) => {
        console.log(e.target.value)
    }

    return (

        <div className='calendarWrap'>
            {
                createPortal(
                    <div onClick={() => setOpen(open => !open)}>
                        <div className='windate' style={{ display: "flex", height: "100%", cursor: "pointer" }} >
                            <div className='icon' style={{ width: "30%", lineHeight: "100%", display: "flex", justifyContent: "center", alignItems: "center" }}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" className="bi bi-calendar-event" viewBox="0 0 16 16">
                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                </svg>
                            </div>
                            <div style={{ width: "80%", height: "100%", display: "flex", alignItems: "center" }} >
                                <div>
                                    <h1 style={{ fontSize: "15px", color: "white" }} >Check in - Check out</h1>
                                    <input
                                        id='date'
                                        value={`${format(datePicker[0].startDate, "dd MMMM")} - ${format(datePicker[0].endDate, "dd MMMM")}`}
                                        className='date'
                                        readOnly
                                        style={{ border: "none", outline: "none", userSelect: "none", color: "white", fontWeight: "bold", cursor: "pointer", backgroundColor: "transparent" }}
                                    />
                                </div>
                            </div>
                        </div>
                    </div>,
                    document.getElementById('reactmain')
                )
            }
            <div ref={refOne}>
                {open &&
                    <DateRange
                        onChange={item => setDatePicker([item.selection])}
                        ranges={datePicker}
                        months={2}

                        direction='horizon'
                        minDate={addDays(new Date(), 2)}
                        showSelectionPreview={true}
                    />
                }

            </div>


        </div>


    )

}

const root = ReactDOM.createRoot(document.getElementById('react'));
root.render(<DateRangeComp />);

export default DateRangeComp

