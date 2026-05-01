import { Link } from "react-router-dom";

export default function CharactersPage({ characters, search, setSearch, onDelete }) {
  const filtered = characters.filter((char) =>
    char.name.toLowerCase().includes(search.trim().toLowerCase())
  );

  return (
    <section id="character-list" className="character-list">
      <div className="character-container">
        <h2>Characters</h2>
        <section id="search-character">
          <div className="search-container">
            <input
              type="text"
              className="search-input"
              placeholder="Enter character name"
              value={search}
              onChange={(e) => setSearch(e.target.value)}
            />
          </div>
        </section>
        <h3>{search ? "Search Results:" : "All Characters:"}</h3>
        <div className="character-grid">
          {filtered.map((char) => (
            <div className="character-item" key={char.id}>
              <img
                className="character-image"
                src={`/images/${char.image_path}`}
                alt={char.name}
              />
              <h3>
                <Link to={`/characters/${char.id}`}>{char.name}</Link>
              </h3>
              <div className="character-actions">
                <Link to={`/characters/${char.id}/edit`}>Edit</Link>|
                <button
                  type="button"
                  className="button"
                  style={{ padding: "6px 10px", border: "none", cursor: "pointer" }}
                  onClick={() => {
                    if (window.confirm("Are you sure you want to delete this character?")) {
                      onDelete(char.id);
                    }
                  }}
                >
                  Delete
                </button>
              </div>
            </div>
          ))}
        </div>
        {filtered.length === 0 && <p>No characters found.</p>}
        {search && (
          <div className="back-button">
            <Link className="button" to="/characters">
              Back to Character List
            </Link>
          </div>
        )}
      </div>
    </section>
  );
}
