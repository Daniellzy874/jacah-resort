import React from 'react'
import { useEffect, useRef, useState } from "react";
import ReactDOM from 'react-dom/client';
import { createPortal } from 'react-dom';
function BookingHistory() {
    const [records, setRecords] = useState([{}]);
    useEffect(() => {
        const getUserdata = async () => {
            const reqdata = await fetch('http://127.0.0.1:8000/booking_json');
            const resdata = await reqdata.json();
            // console.log(resdata);

            setRecords(resdata)
        }
        getUserdata();
    }, []);
    const [isFilter, setIsFilter] = useState('incoming');
    function Filter(e) {
        setIsFilter(e.target.textContent)
    }
    return (
        <div>
            <div className="container">
                <div className="row">
                    <div className=''>
                        <ul className='flex items-end justify-end'>
                            <li onClick={(e) => Filter(e)} className={isFilter === 'incoming' ? 'px-8 py-4 bg-green-400 rouded-md text-white cursor-pointer' : 'px-8 py-4 cursor-pointer'}>
                                incoming
                            </li>
                            <li onClick={(e) => Filter(e)} className={isFilter === 'history' ? 'px-8 py-4 bg-green-400 rouded-md text-white cursor-pointer' : 'px-8 py-4 cursor-pointer'}>
                                history
                            </li>
                        </ul>
                    </div>
                    <table className="table table-hover min-h-screen bg-transparent">
                        <thead className='bg-green-400 text-white'>
                            <tr>
                                <th scope="col">Room</th>
                                <th scope="col">Category</th>
                                <th scope="col">Time in</th>
                                <th scope="col">Time out</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            {
                                isFilter === 'incoming' &&
                                (Object.keys(records).length === 0 ?

                                    <tr className=''>
                                        <td colSpan='6' className='text-center'>
                                            <img src={'assets/image/empty_icon.png'} alt="" className='absolute w-[300px] h-[300px] top-[50%] left-[50%] translate-y-[-50%] translate-x-[-50%] z-0' />
                                            <p className='mt-[20%] text-red-400 font-bold text-[50px] z-100'>nothing to display!</p>
                                        </td>
                                    </tr>

                                    :
                                    records.map((a, b) => (
                                        <tr key={b} className='h-[100px]'>
                                            <td>{a.reserve_for}</td>
                                            <td>{a.category}</td>
                                            <td style={{ color: "Green" }}>{a.check_in}</td>
                                            <td style={{ color: "red" }}>{a.check_out}</td>
                                            <td>{a.created_at}</td>
                                            <td style={{ display: "flex", gap: "3px" }}>
                                                <span data-bs-toggle="modal" data-bs-target="#modalCustomerIncoming" style={{ width: "100%", display: "flex", justifyContent: "center", alignItems: "center", cursor: "pointer" }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-three-dots" viewBox="0 0 16 16">
                                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                                    </svg>
                                                </span>
                                            </td>
                                        </tr>

                                    ))
                                )

                            }
                            {
                                isFilter === 'history' &&
                                (Object.keys(records).length > 0 ?

                                    <tr className=''>
                                        <td colSpan='6' className='text-center'>
                                            <img src={'assets/image/empty_icon.png'} alt="" className='absolute w-[300px] h-[300px] top-[50%] left-[50%] translate-y-[-50%] translate-x-[-50%] z-0' />
                                            <p className='mt-[20%] text-red-400 font-bold text-[50px] z-100'>nothing to display!</p>
                                        </td>
                                    </tr>

                                    :
                                    records.map((a, b) => (
                                        <tr key={b} className='h-[100px]'>
                                            <td>{a.reserve_for}</td>
                                            <td>{a.category}</td>
                                            <td style={{ color: "Green" }}>{a.check_in}</td>
                                            <td style={{ color: "red" }}>{a.check_out}</td>
                                            <td>{a.created_at}</td>
                                            <td style={{ display: "flex", gap: "3px" }}>
                                                <span data-bs-toggle="modal" data-bs-target="#modalCustomerIncoming" style={{ width: "100%", display: "flex", justifyContent: "center", alignItems: "center", cursor: "pointer" }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-three-dots" viewBox="0 0 16 16">
                                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                                    </svg>
                                                </span>
                                            </td>
                                        </tr>

                                    ))
                                )

                            }



                        </tbody>
                    </table>
                </div>
                <div className="col-md-12 text-center">
                    <ul className="pagination pagination-lg pager" id="myPager"></ul>
                </div>
            </div>
            {/* modal cus */}
            <div className="modal fade" id="modalCustomerIncoming" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div className="modal-dialog" role="document" style={{ position: "absolute", top: "50%", left: "50%", transform: "translate(-50%, -50%)" }}>
                    <div className="modal-content" style={{ width: "100vh" }}>
                        <div className='modal-body'>
                            <div class="flex gap-1">
                                <div className="bg-white overflow-hidden shadow-md sm:rounded-lg w-[50%]">
                                    <div className="text-gray-900">
                                        <div className="flex pb-6 flex-column justify-center items-center relative">

                                            <div className="gap-2 ">
                                                <div className="z-1 mb-2">
                                                    <img src={'assets/image/amenity_pic/pic1.png'} className="h-[100%] w-[100%] z-1 " alt="" />
                                                </div>
                                                <div className="text-center">
                                                    <h1 className="capitalize font-bold text-[20px] text-gray-500">Room 1</h1>
                                                    <h1 className="text-gray-500 text-sm">Single Room</h1>
                                                    <h1 className="text-gray-500 text-sm"></h1>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div className="bg-white overflow-hidden shadow-md sm:rounded-lg mb-[100px] w-[100%]">
                                    <div className="p-6 text-gray-900">
                                        <div className="mb-8">
                                            <h1 className="text-[30px] font-bold">Reservation Details</h1>
                                        </div>
                                        <div className="mb-8">
                                            <h4 className="line" style={{ width: "100%", paddingLeft: "30px", borderBottom: "1px solid #4e4c4c91", lineHeight: "0.1em", margin: "10px 0 20px" }}><span style={{ background: "#fff", padding: "0 10px" }} className="font-bold">Room</span></h4>

                                            <table className="table">
                                                <tr>
                                                    <td>
                                                        <h1 className="text-gray-500">Room #</h1>
                                                    </td>
                                                    <td className="w-[70%]">Room 1</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h1 className="text-gray-500">Category:</h1>
                                                    </td>
                                                    <td>Single Room</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h1 className="text-gray-500">Rate:</h1>
                                                    </td>
                                                    <td>
                                                        <h1>Night Rate</h1>

                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div className="mb-8">
                                            <h4 className="line" style={{ width: "100%", paddingLeft: "30px", borderBottom: "1px solid #4e4c4c91", lineHeight: "0.1em", margin: "10px 0 20px" }}><span style={{ background: "#fff", padding: "0 10px" }} className="font-bold">Reservation</span></h4>
                                            <table className="table">
                                                <tr>
                                                    <td>
                                                        <h1 className="text-gray-500">Head #</h1>
                                                    </td>
                                                    <td className="w-[70%]">10</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h1 className="text-gray-500">Booked Date:</h1>
                                                    </td>
                                                    <td className="w-[70%]">april 03, 2000 - april 05, 2000</td>
                                                </tr>

                                            </table>
                                        </div>
                                        <div className="mb-8">
                                            <h4 className="line" style={{ width: "100%", paddingLeft: "30px", borderBottom: "1px solid #4e4c4c91", lineHeight: "0.1em", margin: "10px 0 20px" }}><span style={{ background: "#fff", padding: "0 10px;" }} className="font-bold">Payment</span></h4>
                                            <table className="table">
                                                <tr>
                                                    <td>
                                                        <h1 className="text-gray-500">DP:</h1>
                                                    </td>
                                                    <td className="w-[70%]">5000</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h1 className="text-gray-500">Remaining balance:</h1>
                                                    </td>
                                                    <td>45000</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h1 className="text-gray-500">in Total:</h1>
                                                    </td>
                                                    <td>50000</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/* modal end */}
        </div>
    )
}

const root = ReactDOM.createRoot(document.getElementById('booking-history'));
root.render(<BookingHistory />);

export default BookingHistory
