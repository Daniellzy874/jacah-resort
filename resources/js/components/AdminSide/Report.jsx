import { useState, useEffect, useRef } from 'react';
import React from 'react'
import ReactDOM, { createPortal } from 'react-dom';

import * as XLSX from 'xlsx';


function Report() {
    const [records, setRecords] = useState([]);
    useEffect(() => {
        const getUserdata = async () => {
            const reqdata = await fetch("http://127.0.0.1:8000/customer_json");
            const resdata = await reqdata.json();
            // console.log(resdata);

            setRecords(resdata)
        }
        getUserdata();
    }, []);

    const [inventoryrecords, setInventoryRecords] = useState([]);
    useEffect(() => {
        const getUserdata = async () => {
            const reqdata = await fetch("http://127.0.0.1:8000/listproduct");
            const resdata = await reqdata.json();
            // console.log(resdata);

            setInventoryRecords(resdata)
        }
        getUserdata();
    }, []);




    const num = records.map((a, b) => parseInt(a.down_payment));
    const total = num.reduce((acc, curr) => acc + curr, 0);



    // const componentPDF = useRef();
    const [report, setReportValue] = useState();
    const setReservationreport = (event) => {
        let value = event.target.value;
        setReportValue(value)
    }

    // const generatePDF = useReactToPrint({
    //     content: () => componentPDF.current,
    //     documentTitle: "RESERVATION REPORT",

    // });

    const handleOnExport = () => {
        var wb = XLSX.utils.book_new(),
            ws = XLSX.utils.json_to_sheet(records);
        XLSX.utils.book_append_sheet(wb, ws, "Reservation_Sheet1");
        XLSX.writeFile(wb, "ReservationReport.xlsx");
    };
    const [search, setSearch] = useState('');
    return (
        <div className='generateReport'>
            <select name="" id="" className='w-25 p-2 rounded-md mb-2 cursor-pointer' onChange={(event) => setReservationreport(event)}>
                <option value="">select Report</option>
                <option value="Reservation report" >Reservation report</option>
                <option value="Inventory Report">Inventory</option>
                <option value="Monitoring Report">Monitoring</option>
            </select>
            <h1>All Reports</h1>
            {
                report == "Reservation report" && <div>
                    <div className='w-full flex justify-end px-8 mb-2 '>
                        <a onClick={handleOnExport} className='inline-flex cursor-pointer' style={{ display: "inline-flex", width: "10%", height: "100%", padding: "10px", color: "white", textDecoration: "none", backgroundColor: "green" }} >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" className='w-5 h-5' fill='white'><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V288H216c-13.3 0-24 10.7-24 24s10.7 24 24 24H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM384 336V288H494.1l-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39H384zm0-208H256V0L384 128z" /></svg>
                            Export
                        </a>
                    </div>
                    <input type="month" onChange={(e) => setSearch(e.target.value)} className='w-25 p-2 rounded-md mb-2 cursor-pointer' />
                    <div style={{ width: "100%", padding: "30px" }}>
                        <div><h2>Customer Reservation</h2></div>
                        <table className="table table-hover">
                            <thead className="thead-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Book for</th>
                                    <th scope="col">Time/Rate</th>
                                    <th scope="col">Checked-in</th>
                                    <th scope="col">Checked-out</th>
                                    <th scope='col'>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                {records.filter((item) => {
                                    return search.toLowerCase() === '' ? item : item.created_at.toLowerCase().includes(search)
                                }).map((a, b) => (
                                    <tr key={b} className='cursor-pointer'>
                                        <td>{a.name}</td>
                                        <td>{a.email}</td>
                                        <td>{a.reserve_for}</td>
                                        <td>{a.time}</td>
                                        <td style={{ color: "Green" }}>{a.check_in}</td>
                                        <td style={{ color: "red" }}>{a.check_out}</td>
                                        <td>{a.created_at}</td>
                                    </tr>

                                ))}


                            </tbody>
                        </table>
                    </div>
                </div>
            }
            {
                report == "Monitoring Report" && <div>
                    <div className='w-full flex justify-end px-8 mb-2 '>
                        <a className='inline-flex cursor-pointer' style={{ display: "inline-flex", width: "10%", height: "100%", padding: "10px", color: "white", textDecoration: "none", backgroundColor: "green" }} >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" className='w-5 h-5' fill='white'><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V288H216c-13.3 0-24 10.7-24 24s10.7 24 24 24H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM384 336V288H494.1l-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39H384zm0-208H256V0L384 128z" /></svg>
                            Export
                        </a>
                    </div>
                    <input type="month" onChange={(e) => setSearch(e.target.value)} className='w-25 p-2 rounded-md mb-2 cursor-pointer' />
                    <div style={{ width: "100%", padding: "30px" }}>
                        <div><h2>Customer Reservation</h2></div>
                        <table className="table table-bordered">
                            <thead className="thead-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Book for</th>
                                    <th scope="col">Time/Rate</th>
                                    <th scope='col'>Amount</th>

                                </tr>
                            </thead>
                            <tbody>
                                {records.filter((item) => {
                                    return search.toLowerCase() === '' ? item : item.created_at.toLowerCase().includes(search)
                                }).map((a, b) => (
                                    <tr key={b} className='cursor-pointer'>
                                        <td>{a.name}</td>
                                        <td>{a.reserve_for}({a.category})</td>
                                        <td>{a.time}</td>
                                        <td style={{ color: "Green" }}>{a.down_payment}</td>
                                    </tr>

                                ))}

                                <tr>
                                    <th colSpan={3} className='text-end font-bold'>Total revenue:</th>
                                    <td className='text-center'>{total}</td>
                                </tr>




                            </tbody>
                        </table>
                    </div>
                </div>
            }
            {
                report == "Inventory Report" && <div>
                    <div className='w-full flex justify-end px-8 mb-2 '>
                        <a className='inline-flex cursor-pointer' style={{ display: "inline-flex", width: "10%", height: "100%", padding: "10px", color: "white", textDecoration: "none", backgroundColor: "green" }} >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" className='w-5 h-5' fill='white'><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V288H216c-13.3 0-24 10.7-24 24s10.7 24 24 24H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM384 336V288H494.1l-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39H384zm0-208H256V0L384 128z" /></svg>
                            Export
                        </a>
                    </div>
                    <input type="month" onChange={(e) => setSearch(e.target.value)} className='w-25 p-2 rounded-md mb-2 cursor-pointer' />
                    <div style={{ width: "100%", padding: "30px" }}>
                        <div><h2>Customer Reservation</h2></div>
                        <table className="table table-bordered">
                            <thead className="thead-dark">
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Quantity</th>
                                    <th scope='col'>Price</th>
                                    <th>Updated at</th>

                                </tr>
                            </thead>
                            <tbody>
                                {inventoryrecords.filter((item) => {
                                    return search.toLowerCase() === '' ? item : item.created_at.toLowerCase().includes(search)
                                }).map((a, b) => (
                                    <tr key={b} className='cursor-pointer'>
                                        <td>{a.name}</td>
                                        <td>{a.category}</td>
                                        <td>{a.quantity}</td>
                                        <td style={{ color: "Green" }}>{a.price}</td>
                                        <td>{a.updated_at}</td>
                                    </tr>

                                ))}






                            </tbody>
                        </table>
                    </div>
                </div>
            }


        </div>
    )
}
const root = ReactDOM.createRoot(document.getElementById('generateReport'));
root.render(<Report />);
export default Report
