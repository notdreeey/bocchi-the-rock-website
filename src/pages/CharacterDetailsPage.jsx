import { Link, useParams } from "react-router-dom";

export default function CharacterDetailsPage({ characters }) {
  const { id } = useParams();
  const character = characters.find((item) => item.id === id);

  if (!character) {
    return <section className="character-section">Character not found.</section>;
  }

  return (
    <section id="char-sc" className="character-section">
      <div className="character-details">
        <h2>{character.name}</h2>
        <img src={`/images/${character.image_path}`} alt={character.name} />
        <p>Role: {character.role}</p>
        <p>{character.info}</p>
        <Link to="/characters">Back to character list</Link>
      </div>
    </section>
  );
}
