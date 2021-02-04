import React from "react";
import ReactDOM from "react-dom";

class Students extends React.Component {
    //initialize an object's state in a class
    constructor(props) {
        super(props);
        this.state = {
            data: [],
        };
    }
    //ComponentDidMount is use to Connect a React app to external applications, such as web APIs or JavaScript functions
    async componentDidMount() {
        //get request
        const res = await fetch("/api/students")
        const data = await res.json()
        this.setState({ data: data });
    }

    render() {
        return (
            <div className="maincontainer">
                <div className="container mb-5 mt-5 text-left">
                    <table className="table table-hover" style={{textAlign:'center'}}>
                        <thead>
                            <tr>
                                <th>Universiteto pavadinimas</th>
                                <th>Vardas Pavardė</th>
                                <th>Diskrečioji matematika</th>
                                <th>Objektinis programavimas</th>
                                <th>Filosofija</th>
                                <th>Anglų k.</th>
                                <th>Projektų valdymas</th>
                            </tr>
                        </thead>
                        <tbody>
                            {this.state.data.map((result) => {
                                return (
                                    <tr>
                                        <td>{result.name}</td>
                                        <td>
                                            {result.first_name}{" "}
                                            {result.last_name}
                                        </td>
                                        <td>{result.math}</td>
                                        <td>{result.oop}</td>
                                        <td>{result.filosophy}</td>
                                        <td>{result.english}</td>
                                        <td>{result.project_control}</td>
                                    </tr>
                                );
                            })}
                        </tbody>
                    </table>
                </div>
            </div>
        );
    }
}

export default Students;

// DOM element
if (document.getElementById("students")) {
    ReactDOM.render(<Students />, document.getElementById("students")
    );
}
