import React from 'react'
import ReactDOM from 'react-dom/client';
import { createPortal } from 'react-dom';
import { useEffect, useRef, useState } from "react";
import { addDays, getDate } from 'date-fns';
import format from "date-fns/format";

const BookDate = () => {

    const [datePicker, setDatePicker] = useState([{
        startDate: new Date(),
        endDate: addDays(new Date(), 0),
        key: 'selection'
    }]);

    useEffect(() => {
        const savedStartDate = window.sessionStorage.getItem('datestorage');
        setDatePicker(JSON.parse(savedStartDate));
    }, [])

    useEffect(() => {
        window.sessionStorage.setItem('startPetsa', JSON.stringify(`${format(datePicker[0].startDate, "MMMM dd, yyyy")} `));
        window.sessionStorage.setItem('endPetsa', JSON.stringify(`${format(datePicker[0].endDate, "MMMM dd, yyyy")} `));
    });

    const [isCheck, setIsCheck] = useState(false);
    function handleCheckboxChange(event) {
        setIsCheck(event.target.checked);
    }
    function setSpin() {
        document.getElementById('spin').classList.remove('hidden');
    }
    return (

        <div className='daterange' >
            <h1>Time&Date:</h1>
            <div className='datecon' style={{ display: "flex", justifyContent: "space-between" }}>
                <label>Check-in-----</label>
                <h1 style={{ fontWeight: "bold" }}>{`${format(datePicker[0].startDate, "MMMM dd, yyyy")} `}</h1>
                <input type="text"
                    className='startdate hidden'
                    readOnly
                    value={`${format(datePicker[0].startDate, "MMMM dd, yyyy")} `}
                />
            </div>
            <div className='datecon' style={{ display: "flex", justifyContent: "space-between" }}>
                <label>Check-out-----</label>
                <h1 style={{ fontWeight: "bold" }}>{`${format(datePicker[0].endDate, "MMMM dd, yyyy")} `}</h1>
                <input type="text"
                    className='enddate hidden'
                    readOnly
                    value={`${format(datePicker[0].endDate, "MMMM dd, yyyy")} `}
                />

            </div>
            {createPortal(
                <div>
                    <div className="p-6 text-gray-400">
                        <input id="agree" type="checkbox" className="cursor-pointer" onChange={handleCheckboxChange} />
                        <label htmlFor="agree" className="ml-2 cursor-pointer select-none ">I accept the cancellation policies.</label>
                    </div>
                    <div style={{ paddingTop: "10px", paddingLeft: "30px", paddingRight: "30px" }}>
                        <div className="submit-btn float-right">
                            {
                                (isCheck === true) ?
                                    <button type='submit' onClick={setSpin} className="active:bg-green-700 bg-green-500 px-8 py-4 flex gap-4 text-white font-bold text-lg rounded-xl shadow-md">
                                        <svg id='spin' className="animate-spin hidden border-solid border-[4px] border-green-200 h-6 w-6 mr-3 bg-transparent border-t-[4px] border-t-white rounded-full" viewBox="0 0 24 24"></svg>
                                        Reserve
                                    </button>
                                    :
                                    <button type='button' className="bg-green-500 opacity-50 px-8 py-4 flex gap-4 text-white font-bold text-lg rounded-xl shadow-md">
                                        Reserve
                                    </button>
                            }
                        </div>
                    </div>
                </div>, document.getElementById('checkbox__mate')
            )
            }

        </div >
    )
}

const root = ReactDOM.createRoot(document.getElementById('date'));
root.render(<BookDate />);

export default BookDate
