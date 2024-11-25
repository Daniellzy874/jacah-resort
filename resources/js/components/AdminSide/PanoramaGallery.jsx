import { useState, useEffect } from 'react';
import React from 'react'
import ReactDOM, { createPortal } from 'react-dom';
import { Pannellum } from 'pannellum-react';


function PanoramaGallery() {

    const [records, setRecords] = useState([]);
    useEffect(() => {
        const getUserdata = async () => {
            const reqdata = await fetch("http://127.0.0.1:8000/panorama_json");
            const resdata = await reqdata.json();
            // console.log(resdata);

            setRecords(resdata)
        }
        getUserdata();
    }, []);


    const [search, setSearch] = useState('');

    const [currentPage, setCurentPage] = useState(1);
    const recordsPerPage = 5;
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

    const setFormDataInpu = (name, type, image, ID, e) => {
        document.getElementById('PanID').value = ID;
        document.getElementById('PanName').value = name;
        document.getElementById('PanType').value = type;
        document.getElementById('PanImage').value = image;

        console.log(ID)
    }

    const [pano, setPano] = useState();
    function viewPanorama(image) {
        setPano(image)
    }
    console.log(pano)
    return (
        <div className='panoramaList'>
            {createPortal(
                <div className='formPanorama'>
                    <div className="gap-2">
                        <div className="w-full mt-2 gap-2">
                            <div className="w-full">
                                <label>Name</label>
                                <input id='PanName' name="name" type="text" className="w-full h-8 rounded-md" required />
                                <input id='PanID' name="panID" type="hidden" className="w-full h-8 rounded-md" required />
                            </div>
                            <div className="w-full">
                                <label>Type/Description</label>
                                <input id='PanType' name="type" type="text" className="w-full h-8 rounded-md" required />
                            </div>
                        </div>
                        <div className="w-full mt-2">
                            <label >Photo</label>
                            <input id='PanImage' name="panImage" type="file" className="w-full h-8 rounded-md" accept="image/*" />
                        </div>

                    </div>
                </div>,
                document.getElementById('formPanorama')
            )}
            {createPortal(
                <div style={{ display: "flex", paddingLeft: "50%" }}>
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
                document.getElementById('searchPanorama')
            )}
            <table className="table table-hover">
                <thead className="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope='col'>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    {records.filter((item) => {
                        return search.toLowerCase() === '' ? item : item.name.toLowerCase().includes(search)
                            || item.type.toLowerCase().includes(search);

                    }).sort((a, b) => a.id > b.id ? -1 : 1).slice(firstIndex, lastIndex).map((a, b) => (
                        <tr key={b} onClick={(e) => setFormDataInpu(a.name, a.type, a.image, a.id, e)} className='cursor-pointer bg-green-200 hover:bg-green-200 text-sm' >
                            <td>{a.name}</td>
                            <td>{a.type}</td>
                            <td style={{ gap: "3px" }}>
                                <span style={{ width: "100%", display: "flex", justifyContent: "center", alignItems: "center", cursor: "pointer" }} onClick={() => viewPanorama(a.image)} data-bs-toggle="modal" data-bs-target="#modalPano">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                    </svg>
                                </span>
                            </td>
                        </tr>

                    ))}


                </tbody>
            </table>
            {/* modal confirm delete */}
            {createPortal(
                <div className="modal fade" id="modalConfirmDelPano" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document" style={{ marginTop: "0%" }}>
                        <div className="modal-content">
                            <div className="modal-body">
                                <div className="card" style={{ width: "100%" }}>
                                    <div className="card-body">
                                        <h5 className="card-title font-bold">Are you sure you want to delete this 360 picture ?</h5>
                                        <p className="card-text text-muted">Once you delete this picture, all of it's data will permanently deleted.</p>
                                        <div style={{ paddingTop: "5px", float: "right" }}>
                                            <button type='button' data-bs-dismiss="modal" aria-label="Close" className="inline-flex items-centerm mr-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-gray-500 hover:bg-gray-700 active:bg-gray-700 focus:bg-gray-700" style={{ width: "80px" }}>Cancel</button>
                                            <button formAction={'deletePanorama'} className="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-red-500 hover:bg-red-700 active:bg-red-700 focus:bg-red-700" style={{ width: "80px" }}>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>, document.getElementById('confirmDelPanorama')
            )}
            {/* end modal confirm */}

            {/* modal panorama info */}

            <div className="modal" id="modalPano" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div className="modal-dialog" role="document">
                    <div className="modal-content" style={{ backgroundColor: "transparent", border: "none", marginTop: "100px" }}>
                        <div className="modal-body">
                            <Pannellum
                                mouseZoom={false}
                                autoLoad
                                image={`./assets/image/panorama/${pano}`}
                            />
                        </div>
                    </div>
                </div>
            </div>
            {/* end here */}

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
const root = ReactDOM.createRoot(document.getElementById('panoramaGallery'));
root.render(<PanoramaGallery />);
export default PanoramaGallery
