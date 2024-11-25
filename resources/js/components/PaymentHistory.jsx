import React from 'react'
import { useEffect, useRef, useState } from "react";
import ReactDOM from 'react-dom/client';
import { createPortal } from 'react-dom';

function PaymentHistory() {
    const [records, setRecords] = useState([{}]);
    useEffect(() => {
        const getUserdata = async () => {
            const reqdata = await fetch('http://127.0.0.1:8000/payment_json');
            const resdata = await reqdata.json();
            // console.log(resdata);

            setRecords(resdata)
        }
        getUserdata();
    }, []);



    return (
        <div>
            <table className="table">
                <thead className="thead-dark">
                    <tr>
                        <th scope="col">Payment method</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {records.map((a, b) => (
                        <tr key={b}>
                            <td><p className='p-0 m-0 uppercase'>{a.payment_method}</p></td>
                            <td>2000</td>
                            <td><p className='p-0 m-0' style={{ border: "1px solid green", width: "50%", textAlign: "center", textTransform: "capitalize", }}>{a.status}</p></td>
                            <td>{a.created_at}</td>
                            <td style={{ display: "flex", gap: "3px" }}>
                                <span style={{ width: "100%", display: "flex", justifyContent: "center", alignItems: "center", cursor: "pointer" }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                    </svg>
                                </span>
                            </td>
                        </tr>

                    ))}


                </tbody>
            </table>

        </div>
    )
}
const root = ReactDOM.createRoot(document.getElementById('payment-history'));
root.render(<PaymentHistory />);
export default PaymentHistory
