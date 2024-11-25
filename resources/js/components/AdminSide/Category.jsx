import { useState, useEffect } from 'react';
import React from 'react'
import ReactDOM, { createPortal } from 'react-dom';
import { Fade, Zoom, Slide } from 'react-slideshow-image'
import 'react-slideshow-image/dist/styles.css';

function Category() {
    // const [records, setRecords] = useState([]);
    // useEffect(() => {
    //     const getCategorydata = async () => {
    //         const reqdata = await fetch("http://127.0.0.1:8000/category_json");
    //         const resdata = await reqdata.json();
    //         // console.log(resdata);
    //         setRecords(resdata)
    //     }
    //     getCategorydata();
    // }, []);
    const [records, setRecords] = useState([{}]);
    useEffect(() => {
        const getCategorydata = async () => {
            const reqdata = await fetch("http://127.0.0.1:8000/category_image");
            const resdata = await reqdata.json();
            // console.log(resdata);
            setRecords(resdata)
        }
        getCategorydata();
    }, []);

    const [search, setCategorySearch] = useState('');

    const [currentPage, setCurentPage] = useState(1);
    const recordsPerPage = 10;
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
    const [confirmDel, setConfirmDelete] = useState({
        id: "",
        name: "",
    });

    const setFormDataInpu = (category, DayPrice, NightPrice, Pax, ID, e) => {
        setConfirmDelete({
            id: ID,
            name: category
        });
        document.getElementById('CategoryID').value = ID;
        document.getElementById('CategoryName').value = category;
        document.getElementById('DayRate').value = DayPrice;
        document.getElementById('NightRate').value = NightPrice;
        document.getElementById('pax').value = Pax;
    }

    const [valCat, setValCat] = useState([{
        id: "",
        category: "",
        day: "",
        night: "",
        pax: "",
    }]);
    const [image, setImage] = useState([{}]);
    function viewCategoryInfo(id, category, day, night, pax, image) {
        setValCat({
            id: id,
            category: category,
            day: day,
            night: night,
            pax: pax,
        })
        setImage(image)
    }

    const properties = {
        prevArrow: <button onClick={() => setIndex(Index - 1)} style={{ width: "50px", marginLeft: "10px", color: "white", borderRadius: "100px", background: ' rgba(0, 0, 0, 0.405)', border: '0px', display: "flex", justifyContent: "center", alignItems: "center", }}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="w-6 h-6"><path strokeLinecap="round" strokeLinejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" /></svg></button>,
        nextArrow: <button onClick={() => setIndex(Index + 1)} style={{ width: "50px", marginRight: "10px", color: "white", borderRadius: "100px", background: 'rgba(0, 0, 0, 0.405)', border: '0px', display: "flex", justifyContent: "center", alignItems: "center", }}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="w-6 h-6"><path strokeLinecap="round" strokeLinejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" /></svg></button>
    }

    return (
        <div className='categoryList'>
            {createPortal(
                <div className='formCategory'>

                    <div className="w-full gap-2">
                        <div className="w-full">
                            <label className='text-sm'>Category Name</label>
                            <input id='CategoryName' name='category' type="text" className="w-full h-8 rounded-md text-sm" required />
                            <input id='CategoryID' name="CategoryID" type="hidden" className="w-full h-10 rounded-md" required />
                        </div>
                        <div className="w-full">
                            <label className='text-sm'>Day Rate</label>
                            <input id='DayRate' name='dayprice' type="number" className="w-full h-8 rounded-md text-sm" required />
                        </div>
                        
                        <div className="w-full">
                            <label className='text-sm'>Night Rate</label>
                            <input id='NightRate' name='nightprice' type="number" className="w-full h-8 rounded-md text-sm" required />
                        </div>
                    </div>
                    <div className="w-full mt-2">
                        <label className='text-sm'>Pax/Headcount</label>
                        <input id='pax' name='pax' type="number" className="w-full h-8 rounded-md text-sm" required />
                    </div>


                </div>,
                document.getElementById('formCategory')
            )}
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
                document.getElementById('searchCategory')
            )}
            <table className="table table-hover">
                <thead className="thead-dark">
                    <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Day Rate</th>
                        <th scope="col">Night Rate</th>
                        <th scope="col">Pax</th>
                        <th scope='col'>Photo</th>

                    </tr>
                </thead>
                <tbody>
                    {records.filter((item) => {
                        return search.toLowerCase() === '' ? item : item.category.toLowerCase().includes(search);

                    }).sort((a, b) => a.id > b.id ? -1 : 1).slice(firstIndex, lastIndex).map((a, b) => (
                        <tr key={b} onClick={(e) => setFormDataInpu(a.category, a.Day_Rate, a.Night_Rate, a.pax, a.id, e)} className='cursor-pointer text-sm'>
                            <td>{a.category}</td>
                            <td>{a.Day_Rate}</td>
                            <td>{a.Night_Rate}</td>
                            <td>{a.pax}</td>
                            <td style={{ gap: "3px" }} onClick={() => viewCategoryInfo(a.id, a.category, a.Day_Rate, a.Night_Rate, a.pax, a.product_images.map(data => data.image))} data-bs-toggle="modal" data-bs-target="#modalPro">
                                <span style={{ width: "100%", display: "flex", justifyContent: "center", alignItems: "center", cursor: "pointer" }} >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                    </svg>
                                </span>
                            </td>
                        </tr>

                    ))}


                </tbody>
            </table>
            {/* modal category info */}

            <div className="modal" id="modalPro" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div className="modal-dialog" role="document">
                    <div className="modal-content" style={{ backgroundColor: "transparent", border: "none", marginTop: "200px" }}>
                        <div className="modal-body">

                            <div className="card bg-dark text-white">
                                <Slide autoplay={false} {...properties}>
                                    {
                                        image.map(data => (
                                            <img src={`${data}`} className='card-img' style={{ height: "100%" }} />
                                        ))
                                    }

                                </Slide>
                                <div className="card-img-overlay">
                                    <h5 className="card-title">{valCat.category}</h5>
                                    <p className="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p className="card-text">Last updated 3 mins ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/* end here */}
            {/* modal confirm delete */}
            {createPortal(
                <div className="modal fade" id="modalConfirm" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document" style={{ marginTop: "0%" }}>
                        <div className="modal-content">
                            <div className="modal-body">
                                <div className="card" style={{ width: "100%" }}>
                                    <div className="card-body">
                                        <h5 className="card-title font-bold">Are you sure you want to delete this room category ?</h5>
                                        <p className="card-text text-muted">Once you delete this category, all of it's data will permanently deleted.</p>
                                        <div style={{ paddingTop: "5px", float: "right" }}>
                                            <button type='button' data-bs-dismiss="modal" aria-label="Close" className="inline-flex items-centerm mr-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-gray-500 hover:bg-gray-700 active:bg-gray-700 focus:bg-gray-700" style={{ width: "80px" }}>Cancel</button>
                                            <button formAction={'deletecategory'} className="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-red-500 hover:bg-red-700 active:bg-red-700 focus:bg-red-700" style={{ width: "80px" }}>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>, document.getElementById('confirmDel')
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
                document.getElementById('paginateCategory')


            )}

        </div>
    )
}
const root = ReactDOM.createRoot(document.getElementById('categoryList'));
root.render(<Category />);
export default Category
