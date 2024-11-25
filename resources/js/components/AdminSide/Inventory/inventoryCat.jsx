import { useState, useEffect } from 'react';
import React from 'react'
import ReactDOM, { createPortal } from 'react-dom';

function InventoryCat() {
    const [records, setRecords] = useState([]);
    useEffect(() => {
        const getUserdata = async () => {
            const reqdata = await fetch("http://127.0.0.1:8000/inventCat_json");
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

    const [productlist, setProductList] = useState([]);
    const [cat_label, setCatLabel] = useState('');
    const viewProduct = async (category, id) => {
        document.getElementById('cat-id').value = id;
        document.getElementById('catname').value = category;
        setCatLabel(category)
        try {
            const reqdata = await fetch(`./CategoryProduct/${category}`);
            const resdata = await reqdata.json();
            setProductList(Object.values(resdata));
        } catch (error) {
            console.error("Error saving data:", error);
        }
    };


    return (


        <div className='inventCat'>

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
                document.getElementById('searchInputcat')
            )}
            <table className="table table-hover">
                <thead className="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {records.filter((item) => {
                        return search.toLowerCase() === '' ? item : item.name.toLowerCase().includes(search);
                    }).sort((a, b) => a.id > b.id ? -1 : 1).slice(firstIndex, lastIndex).map((a, b) => (
                        <tr key={b} className='text-sm cursor-pointer' onClick={() => viewProduct(a.name, a.id)}>
                            <td>{a.name}</td>
                            <td style={{ display: "flex", gap: "3px" }}>
                                <x-secondary-button class="border border-green-700 text-green-500 relative float-right">
                                    View Product
                                </x-secondary-button>
                            </td>
                        </tr>

                    ))}

                </tbody>
            </table>
            {/* modal confirm delete */}
            {createPortal(
                <div className="modal fade" id="modalConfirmDelInventCat" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document" style={{ marginTop: "0%" }}>
                        <div className="modal-content">
                            <div className="modal-body">
                                <div className="card" style={{ width: "100%" }}>
                                    <div className="card-body">
                                        <h5 className="card-title font-bold">Are you sure you want to delete this product category ?</h5>
                                        <p className="card-text text-muted">Once you delete this category, all of it's data will permanently deleted.</p>
                                        <div style={{ paddingTop: "5px", float: "right" }}>
                                            <button type='button' data-bs-dismiss="modal" aria-label="Close" className="inline-flex items-centerm mr-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-gray-500 hover:bg-gray-700 active:bg-gray-700 focus:bg-gray-700" style={{ width: "80px" }}>Cancel</button>
                                            <button formAction={'/delete-inventory-Category'} className="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-red-500 hover:bg-red-700 active:bg-red-700 focus:bg-red-700" style={{ width: "80px" }}>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>, document.getElementById('confirmDelInventCat')
            )}
            {/* end modal confirm */}
            {
                createPortal(
                    <div>
                        <h1 className="font-semibold text-xl text-black leading-tight inline-flex ">Products in - {cat_label}</h1>
                        <table className="table">
                            <thead className="thead-dark">
                                <tr>
                                    <th scope='col'>Picture</th>
                                    <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                {
                                    productlist.map((data, index) => (
                                        <tr key={index}>
                                            <td><img src={data.picture} style={{ height: "80px" }} /></td>
                                            <td>{data.name}</td>
                                        </tr>
                                    ))}

                            </tbody>
                        </table>
                    </div>, document.getElementById('prodtbl')
                )
            }
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
const root = ReactDOM.createRoot(document.getElementById('inventCat'));
root.render(<InventoryCat />);
export default InventoryCat
