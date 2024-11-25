import { useState, useEffect } from 'react';
import React from 'react'
import ReactDOM, { createPortal } from 'react-dom';
import Modal from './Modal';
import axios from 'axios';

function SearchCus() {

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


    const [search, setSearch] = useState('');

    const [currentPage, setCurentPage] = useState(1);
    const recordsPerPage = 7;
    const lastIndex = currentPage * recordsPerPage;
    const firstIndex = lastIndex - recordsPerPage;
    // const record = records.slice(firstIndex, lastIndex);
    const npage = Math.ceil(records.length / recordsPerPage);
    const numbers = [...Array(npage + 1).keys()].slice(1);

    function prePage() {
        if (currentPage !== 1) {
            setCurentPage(currentPage - 1)
        }
    }
    function changeCPage(id) {
        setCurentPage(id)
    }
    function nextPage() {
        if (currentPage !== npage) {
            setCurentPage(currentPage + 1)
        }
    }



    const [CustomerData, setCustomerData] = useState({
        'ref': '',
        'name': '',
        'email': '',
        'number': '',
        'room': '',
        'category': '',
        'Time_in': '',
        'date_in': '',
    })

    const [TimeIn, setTimeIn] = useState(null);
    function Monitor() {
        let currentDate = new Date();
        // Get the current time as a string (in local time)
        let timeString = currentDate.toLocaleTimeString(); // e.g. "10:45:22 AM"
        setTimeIn(timeString);
        setCustomerData({
            ...CustomerData,
            'Time_in': timeString,
        });

    }


    const handleChange = (e) => {
        setCustomerData({
            ...CustomerData,
            [e.target.name]: e.target.value,
        });
    };

    function recordData(id, name, email, number, room, category) {
        setCustomerData({ 'ref': id, 'name': name, 'email': email, 'number': number, 'room': room, 'category': category })
    }

    const [isOpenSubmitSuccess, setIsOpenSubmitSuccess] = useState(false);
    const [isOpenFail, setIsOpenFail] = useState(false);

    const handleSubmit = async (e) => {
        document.getElementById('spin').classList.remove('hidden');
        var inputTime = document.getElementById('time_in').value;
        var inputDate = document.getElementById('date_in').value;
        e.preventDefault();
        // Send data via POST request
        try {
            if (inputTime === "" || inputDate === "") {
                setIsOpenFail(true)
                e.preventDefault(); // Prevent form submission
            }
            else {
                const savedata = axios.post('/time_in', CustomerData)
                setIsOpenSubmitSuccess(true)

            }
        } catch (error) {
            setIsOpenFail(true)
            e.preventDefault(); // Prevent form submission
        }

    };




    const closeModalSubmitSuccess = () => {
        setIsOpenSuccess(false);
        document.getElementById('spin').classList.add('hidden');
    };
    const closeModalFail = () => {
        setIsOpenFail(false);
        document.getElementById('spin').classList.add('hidden');
    };
    return (


        <div className='searchbox'>

            {createPortal(
                <div style={{ display: "flex", paddingLeft: "70%" }}>
                    <input type="text"
                        placeholder='Search here...'
                        onChange={(e) => setSearch(e.target.value)}
                        className='searchhere'
                        style={{ padding: "10px", borderBottomLeftRadius: "50px", borderTopLeftRadius: "50px", border: "1px solid #dee2e6", width: "100%" }}
                    />
                    <div style={{ backgroundColor: "green", display: "flex", justifyContent: "center", alignItems: "center", paddingLeft: "10px", paddingRight: "10px", borderBottomRightRadius: "50px", borderTopRightRadius: "50px" }}>
                        <svg xmlns="http://www.w3.org/2000/svg" fill='white' className="w-6 h-6" viewBox="0 0 512 512">
                            <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 .1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" />
                        </svg>
                    </div>
                </div>,
                document.getElementById('searchInputbox')
            )}
            <table className="table table-hover">
                <thead className="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Book for</th>
                        <th scope="col">Time/Rate</th>
                        <th scope="col">Checked-in</th>
                        <th scope="col">Checked-out</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {records.filter((item) => {
                        return search.toLowerCase() === '' ? item : item.name.toLowerCase().includes(search)
                            || item.email.toLowerCase().includes(search);

                    }).sort((a, b) => a.id > b.id ? -1 : 1).slice(firstIndex, lastIndex).map((a, b) => (

                        (a.status === 'Pending' || a.status === 'Verified') &&
                        <tr key={b} className={a.status == "Pending" ? 'cursor-pointer text-sm bg-red-300' : 'cursor-pointer text-sm bg-yellow-700'}>
                            <td>{a.name}</td>
                            <td>{a.email}</td>
                            <td>{a.reserve_for}({a.category})</td>
                            <td>{a.time}</td>
                            <td style={{ color: "Green" }}>{a.check_in}</td>
                            <td style={{ color: "red" }}>{a.check_out}</td>
                            <td style={{ gap: "3px" }}>
                                {
                                    a.status === "Pending" ?
                                        <a href={`/customer-view-verify/${a.id}`} class="btn btn-primary">verify</a> :
                                        <span onClick={() => recordData(a.id, a.name, a.email, a.mobile_number, a.reserve_for, a.category)} data-bs-toggle="modal" data-bs-target="#modalMonitor" style={{ width: "100%", display: "flex", justifyContent: "center", alignItems: "center", cursor: "pointer" }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-three-dots" viewBox="0 0 16 16">
                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                            </svg>
                                        </span>

                                }

                            </td>
                        </tr>



                    ))}
                    {/* monitor customer */}
                    <div className="modal fade" id="modalMonitor" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div className="modal-dialog" role="document" style={{ position: "absolute", top: "50%", left: "50%", transform: "translate(-50%, -50%)" }}>
                            <div className="modal-content">
                                <form onSubmit={handleSubmit}>
                                    <div className="modal-body">
                                        <div className='flex gap-[100px]'>
                                            <div className=''>
                                                <img src={'assets/image/pofile_pic_default/PROF-PIC.png'} className='w-[100px]' alt="" />
                                                <h1 className='font-bold capitalize'>{CustomerData.name}</h1>
                                                <input type="hidden" name='name' value={CustomerData.name} />
                                                <h1 className='text-xs'>{CustomerData.number}</h1>
                                                <input type="hidden" name='number' value={CustomerData.number} />
                                                <h1 className='text-xs'>{CustomerData.email}</h1>
                                                <input type="hidden" name='email' value={CustomerData.email} />
                                                <input type="hidden" name='room' value={CustomerData.room} />
                                                <input type="hidden" name='category' value={CustomerData.category} />
                                            </div>
                                            <div className='text-end'>
                                                <h1 className='font-bold'>JACAH Farm & Resort</h1>
                                                <h1 className='text-xs'>777-7777-77</h1>
                                                <h1 className='text-xs'>jacah@gmail.com</h1>
                                                <h1 className='text-xs'>alfonso,cavite</h1>
                                            </div>
                                        </div>
                                        <div className=''>
                                            <table className="table table-bordered mt-4">
                                                <thead className='thead-dark'>
                                                    <tr>
                                                        <th scope="col">Description</th>
                                                        <th scope="col"></th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td className='text-center' scope="row">Date:</td>
                                                        <td><input id='date_in' type="date" name="date_in" onChange={handleChange} className='w-[100%] border-none' /></td>

                                                    </tr>
                                                    <tr>
                                                        <td className='text-center' scope="row">Time in:</td>
                                                        <td><input id='time_in' type="text" name="time_in" value={TimeIn} placeholder='--:--:--' className='border-none' required readOnly /><button type='button' onClick={Monitor} className='btn btn-primary bg-blue-500 absolute left-[83%]'>set</button></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div className='pt-[5px] flex flex-column gap-2'>
                                            <button type='submit' className="inline-flex items-center px-4 py-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-red-500 hover:bg-red-700 active:bg-red-700 focus:bg-red-700">
                                                <svg id='spin' className="animate-spin hidden border-solid border-[4px] border-black-200 h-6 w-6 mr-3 bg-transparent border-t-[4px] border-t-white rounded-full" viewBox="0 0 24 24"></svg>
                                                Check in
                                            </button>
                                            <button type='button' data-bs-dismiss="modal" aria-label="Close" className="inline-flex items-centerm px-4 py-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-gray-500 hover:bg-gray-700 active:bg-gray-700 focus:bg-gray-700">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {/*confirm Success*/}
                        <Modal isOpen={isOpenSubmitSuccess} onClose={closeModalSubmitSuccess}>
                            <div className='flex flex-column justify-center items-center'>
                                <i class='bx bxs-check-circle text-[70px] text-green-300'></i>
                                <h2 className="font-bold flex justify-center items-center pt-2 text-[30px]">Successful!</h2>
                            </div>
                            <div className='text-center'>
                                <p className="py-2">Check-in successfully, thank you!.</p>
                            </div>
                            <form action='' method='GET'>
                                <div className="flex flex-column justify-center items-center py-4 gap-4">
                                    <button className="btn btn-success bg-green-300 px-12 rounded-full" type="submit">OK</button>
                                    <a className="btn btn-primary bg-blue-300 px-12 rounded-full" href={'./monitoring-item'}>Go to List</a>
                                </div>
                            </form>

                        </Modal>
                        {/* end confirm success*/}
                        {/*confirm fail*/}
                        <Modal isOpen={isOpenFail} >
                            <div className='flex flex-column justify-center items-center'>
                                <i class='bx bxs-x-circle text-[70px] text-red-300'></i>
                                <h2 className="font-bold flex justify-center items-center pt-2 text-[30px]">Error!</h2>
                            </div>
                            <div className='text-center'>
                                <p className="py-2">Failed to check-in, try again.</p>
                            </div>

                            <div className="flex justify-center items-center py-4">
                                <button onClick={closeModalFail} className="btn btn-danger bg-red-300 px-12 rounded-full" type="button">OK</button>
                            </div>
                        </Modal>
                        {/* end confirm fail*/}
                    </div>

                    {/* end monitor customer */}
                </tbody>
            </table>

            {createPortal(

                <div>
                    <nav>
                        <ul className='pagination'>
                            <li className='page-item'>
                                <a href="#" className='page-link' onClick={prePage}>Prev</a>
                            </li>
                            {
                                numbers.map((n, i) => (
                                    <li className={`page-item ${currentPage === n ? 'active' : ''}`} key={i}>
                                        <a href="#" className='page-link' onClick={() => changeCPage(n)}>{n}</a>
                                    </li>
                                ))
                            }
                            <li className='page-item'>
                                <a href="#" className='page-link' onClick={nextPage}>Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>,
                document.getElementById('paginate')


            )}

        </div>
    )

}
const root = ReactDOM.createRoot(document.getElementById('SearchCustomer'));
root.render(<SearchCus />);
export default SearchCus
