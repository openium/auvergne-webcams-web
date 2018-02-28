import React, {Component} from 'react';
import PropTypes from 'prop-types';
import './Section.css';

class App extends Component {

    static propTypes = {
        section: PropTypes.object
    };

    render() {
        return (
            <div className="section">
                <h2>{this.props.section.title}</h2>
            </div>
        );
    }
}

export default App;
