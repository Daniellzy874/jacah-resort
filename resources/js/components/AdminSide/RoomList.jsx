import { useState, useEffect } from 'react';
import React from 'react'
import ReactDOM, { createPortal } from 'react-dom';

export default function RoomList() {
    const [records, setRecords] = useState([]);
    useEffect(() => {
        const getCategorydata = async () => {
            const reqdata = await fetch("http://127.0.0.1:8000/category_json");
            const resdata = await reqdata.json();
            // console.log(resdata);

            setRecords(resdata)
        }
        getCategorydata();
    }, []);
    const [Roomrecords, setRoomRecords] = useState([]);
    useEffect(() => {
        const getCategorydata = async () => {
            const reqdata = await fetch("http://127.0.0.1:8000/room_json");
            const resdata = await reqdata.json();
            // console.log(resdata);

            setRoomRecords(resdata)
        }
        getCategorydata();
    }, []);
    const [search, setCategorySearch] = useState('');

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

    const category = [...new Set(records.map((data) => data.category))]

    const setFormDataInpu = (name, category, status, ID, e) => {
        document.getElementById('RoomID').value = ID;
        document.getElementById('RoomNum').value = name;
        document.getElementById('RoomCat').value = category;
        document.getElementById('RoomStatus').value = status;


        console.log(ID)
    }
    return (
        <div className='roomList'>
            {createPortal(
                <div className='formRoomList'>
                    <div className="gap-2">
                        <div className="w-full mt-2 gap-2">
                            <div className="w-full">
                                <label className='text-sm'>Name</label>
                                <input id='RoomNum' name='Room_num' type="text" className="w-full h-8 rounded-md text-sm" required />
                                <input id='RoomID' name="RoomID" type="hidden" className="w-full h-8 rounded-md" required />
                            </div>
                            <div className="w-full">
                                <label className='text-sm'>Category</label>
                                <select id="RoomCat" name='Category' className='search w-full h-8 rounded-md text-sm pt-1'>
                                    <option>Select Category</option>
                                    {category.map(data => (<option key={data} value={data}>{data}</option>))}
                                </select>
                            </div>
                        </div>
                        <div className="w-full mt-2">
                            <label className='text-sm'>Status</label>
                            <select name="RoomStatus" id="RoomStatus" className="w-full h-8 rounded-md text-sm pt-1">
                                <option value="">Select Status</option>
                                <option value="Available">Available</option>
                                <option value="Unavailable">Unavailable</option>
                            </select>
                        </div>

                    </div>
                </div>,
                document.getElementById('formRoomList')
            )}
            {/* {
                createPortal(
                    <div>
                        <select name='category' className='search w-full h-10 rounded-md' id='search'>
                            <option>Select Category</option>
                            {category.map(data => (<option key={data} value={data}>{data}</option>))}
                        </select>
                    </div>,
                    document.getElementById('select')

                )
            } */}
            {createPortal(
                <div style={{ display: "flex", paddingLeft: "50%" }}>
                    <input type="text"
                        placeholder='Search here...'
                        onChange={(e) => setCategorySearch(e.target.value)}
                        className='searchhere'
                        style={{ padding: "10px", borderBottomLeftRadius: "50px", borderTopLeftRadius: "50px", border: "1px solid #dee2e6", width: "100%" }}
                    />
                    <div style={{ backgroundColor: "green", display: "flex", justifyContent: "center", alignItems: "center", paddingLeft: "10px", paddingRight: "10px", borderBottomRightRadius: "50px", borderTopRightRadius: "50px" }}>
                        <svg xmlns="http://www.w3.org/2000/svg" fill='white' className="w-6 h-6" viewBox="0 0 512 512">
                            <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 .1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" />
                        </svg>
                    </div>
                </div>,
                document.getElementById('searchRoom')
            )}
            <table className="table table-hover">
                <thead className="thead-dark">
                    <tr>
                        <th scope="col">Room/Cottage#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        {/* <th scope="col">Action</th> */}


                    </tr>
                </thead>
                <tbody>
                    {Roomrecords.filter((item) => {
                        return search.toLowerCase() === '' ? item : item.Room.toLowerCase().includes(search);

                    }).sort((a, b) => a.id > b.id ? -1 : 1).slice(firstIndex, lastIndex).map((a, b) => (
                        <tr key={b} onClick={(e) => setFormDataInpu(a.Room, a.Category, a.Status, a.id, e)} className='cursor-pointer text-sm'>
                            <td>{a.Room}</td>
                            <td>{a.Category}</td>
                            <td>{a.Status}</td>
                            {/* <td style={{ gap: "3px" }}>
                                <span style={{ width: "100%", display: "flex", justifyContent: "center", alignItems: "center", cursor: "pointer" }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                    </svg>
                                </span>
                            </td> */}
                        </tr>

                    ))}


                </tbody>
            </table>
            {/* modal confirm delete */}
            {createPortal(
                <div className="modal fade" id="modalConfirmDelroom" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document" style={{ marginTop: "0%" }}>
                        <div className="modal-content">
                            <div className="modal-body">
                                <div className="card" style={{ width: "100%" }}>
                                    <div className="card-body">
                                        <h5 className="card-title font-bold">Are you sure you want to delete this room number?</h5>
                                        <p className="card-text text-muted">Once you delete this room, all of it's data will permanently deleted.</p>
                                        <div style={{ paddingTop: "5px", float: "right" }}>
                                            <button type='button' data-bs-dismiss="modal" aria-label="Close" className="inline-flex items-centerm mr-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-gray-500 hover:bg-gray-700 active:bg-gray-700 focus:bg-gray-700" style={{ width: "80px" }}>Cancel</button>
                                            <button formAction="{'deleteroom'}" className="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-red-500 hover:bg-red-700 active:bg-red-700 focus:bg-red-700" style={{ width: "80px" }}>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>, document.getElementById('confirmDelroom')
            )}
            {/* end modal confirm */}
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
                document.getElementById('paginateRoom')


            )}

        </div>
    )
}
const root = ReactDOM.createRoot(document.getElementById('roomList'));
root.render(<RoomList />);
